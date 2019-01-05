<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Advert;
use DB;
use Config;
use Validator;
class AdverttypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 分类管理模块
    public function index()
    {
        $type = Advert::where("pid","=",0)->get();
        foreach($type as $k=>$v){
            $type[$k]->total = Advert::where("pid","=",$v->id)->count();
        }
        // dd($type);
        // 加载模板
        return view('admin.adverttype.index',['type'=>$type]);
    }
    // 查看子分类
    public function check($pid){
        $type = Advert::where("pid","=",$pid)->get();
        foreach($type as $k=>$v){
            $type[$k]->total = Advert::where("pid","=",$v->id)->count();
        }
        return view('admin.adverttype.index',['type'=>$type]);
    }

    // 添加子分类
    public function add1($id){
        $data = DB::table('adverts')->where("id","=",$id)->first();
        return view('admin.adverttype.add',['data'=>$data]);
    }
    // 执行添加
    public function doadd(Request $request){
        // dd($request->all());
        $data = $request->except(['_token']);
        $data['addtime'] = $data['uptime'] = time();
        // 判断
        if($request->hasFile('img')){
            //初始化文件名字
            $name=time()+rand(1,10000);
            //获取上传图片后缀
            $ext=$request->file("img")->getClientOriginalExtension();
            //把上传图片移动到指定的日期目录下方法
            $request->file("img")->move(Config::get('app.adverts'),$name.".".$ext);
            //保存图片途径
            $data['img']=trim(Config::get('app.adverts')."/".$name.".".$ext,'.');
            // dd($data);
            //执行数据库的插入操作
            if(DB::table('adverts')->insert($data)){
                return redirect('/admin/adverttype')->with('success','数据添加成功');
            }else{
                return redirect('/admin/adverttype')->with('error','数据添加失败');
            }
        }else{
            return back()->with('error','请添加图片');
        }
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 执行添加
    public function store(Request $request)
    {
        // dd($request->all());
        $data = $request->except('_token');
        $data['sort']=$data['img']=$data['pid']=$data['path']=$data['gid']=0;
        $data['addtime']=$data['uptime']=time();
        // dd($data);
        if(DB::table('adverts')->insert($data)){
            return redirect('/admin/adverttype')->with('success',"顶级分类添加成功");
        }else{
            return redirect('/admin/adverttype')->with('success',"顶级分类添加失败");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改分类
    public function edit($id)
    {
        // echo $id;
        $info = DB::table('adverts')->where("id","=",$id)->first();
        // 统计子类数量
        $count = Advert::where("pid","=",$info->id)->count();

        return view('admin.adverttype.mem_edit',['info'=>$info,'count'=>$count]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 执行修改
    public function update(Request $request, $id)
    {
        // dd($request->input('pid'));
        // 判断是否是修改顶级分类
        if($request->input('pid') == 0){
            $data = $request->except(['_token','_method']);
            $data['uptime'] = time();
            if(DB::table('adverts')->where("id","=",$id)->update($data)){
                return redirect('/admin/adverttype')->with('success',"修改成功");
            }else{
                return redirect('/admin/adverttype/{$id}/edit')->with('error',"修改失败");
            }
        }else{
            // dd($request->hasFile('img'));
            $data=$request->except(['_token','_method']);
            $data['uptime']=time();
            // 获取当前数据的图片
            $info=DB::table('adverts')->where("id","=",$id)->first();
            if($request->hasFile('img')){
                //初始化文件名字
                $name=time()+rand(1,10000);
                //获取上传图片后缀
                $ext=$request->file("img")->getClientOriginalExtension();
                //把上传图片移动到指定的日期目录下方法
                $request->file("img")->move(Config::get('app.adverts'),$name.".".$ext);
                //保存图片途径
                $data['img']=trim(Config::get('app.adverts')."/".$name.".".$ext,'.');
                // dd($data);
                //执行数据库的插入操作
                if(DB::table('adverts')->where("id","=",$id)->update($data)){
                    if(file_exists('.'.$info->img)){
                        unlink('.'.$info->img);                   
                    }
                    return redirect('/admin/adverttype')->with('success','修改成功');
                }else{
                    return redirect('/admin/adverttype/{$id}/edit')->with('error','修改失败');
                }
            }else{
                if(DB::table('adverts')->where("id","=",$id)->update($data)){
                    return redirect('/admin/adverttype')->with('success','修改成功');
                }else{
                    return redirect('/admin/adverttype/{$id}/edit')->with('error','修改失败');
                }
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    // 验证子类
    public function checkup(Request $request){
        // 将传递来的序列化字符转化成数组
        parse_str($request->input('str'),$arr);
        unset($arr['_token']);
        unset($arr['_method']);
        // 自定义提示信息
        $messages = [
            "name.required"=>"请输入分类名",
            "gid.required"=>"请输入商品id",
            "sort.required"=>"请输入排序",
            // "img.required"=>"请选择图片",
        ];
        // 自定义规则
        $rults = [
            'name' => 'required',
            'gid' => 'required',
            'sort' => 'required',
            // 'img' => 'required',
        ];   
        // 执行自定义检验
        $validator = Validator::make($arr,$rults,$messages);
        // 判断是否有错误
        if ($validator->fails()) {
            // var_dump($validator->errors()->messages());
            // 获取错误信息
            $arr1 =  $validator->errors()->messages();
            // 遍历为一维数组
            foreach($arr1 as $v){
                foreach($v as $val){
                    $error[] = $val;
                }
            }
            // 返回错误信息
            return $error;
        }else{
            return 1;
        }
    } 
}
