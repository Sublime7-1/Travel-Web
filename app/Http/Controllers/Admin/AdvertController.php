<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Advert;
use App\Http\Requests\Advert  as Advertinsert;
use Config;
use Validator;
class AdvertController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 广告无限分类
    public function getadverts($pid){
        // sql:SELECT *,concat(path,',',id) as paths FROM `adverts` order by paths;
        // 连贯方法结合原始表达式,放sql注入
        if(empty($pid)){
           $data = Advert::select(DB::raw("*,concat(path,',',id) as paths"))->orderBy('paths')->get(); 
        }else{
            $data = Advert::select(DB::raw("*,concat(path,',',id) as paths"))->where('pid','like',$pid)->orderBy('paths')->get();
        }
        // 遍历数据(以path字段中的逗号个数添加前缀)
        foreach($data as $key=>$value){
            // var_dump($value);
            // 获取当前分类下的子类数量
            $num = DB::table('adverts')->where('pid','=',$value->id)->count();
            // 将path字段转换为数组
            $arr = explode(',',$value->path);
            // var_dump($arr);
            // 获取逗号个数(数组长度-1)
            $len = count($arr)-1;
            // 添加前缀
            $data[$key]->name = str_repeat(' ★', $len).$value->name;
            // 将子类数量添加进数组
            $data[$key]->num = $num;
            // 获取当前类的所有子类的排序数字
            $data[$key]->sorts = DB::table('adverts')->where('pid','=',$value->id)->pluck('sort');
        }
        // 返回数据
        return $data;
    }
    // 广告列表模块
    public function index(Request $request)
    {
        // dd($request->input('id'));
        // 父id搜索
        if($request->input('id')){
            $pid = $request->input('id');
        }else{
            $pid = '';
        }
        // 调用广告无限分类方法
        $info = $this->getadverts($pid);
        // dd($info);
        // 统计所有广告
        $total = DB::table('adverts')->where('img','!=','0')->count();
        // dd($num); 
        $i=1;
        // 加载模板
        return view('admin.advert.index',['info'=>$info,'total'=>$total,'i'=>$i]);
    }
    // 修改广告状态
    public function status(Request $request){
        // 状态值
        $status = $request->input('status');
        // echo $status;
        // 要修改的id
        $id = $request->input('id');
        // 获取该id下面的子类
        $ids = DB::table('adverts')->where('pid','=',$id)->pluck('id');
        // dd($ids);
        // 执行
        if(DB::table('adverts')->where('id','=',$id)->update(['status'=>$status])){
            // 判断是否有子类
            if(count($ids)){
                // 将旗下所有子类改状态
                foreach($ids as $v){
                    $num = DB::table('adverts')->where('id','=',$v)->update(['status'=>$status]);
                }
            }
            echo 1;
        }else{
            echo 2;
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
    // 执行广告添加模块
    public function store(Request $request)
    {
        // dd($request->all());
        // 获取要添加的数据
        $data=$request->except(['_token']);
        $data['addtime']=time();
        $data['uptime']=time();
        // 获取pid
        $pid = $request->input('pid');
        //添加顶级分类信息
        if($pid==0){
            //拼接path
            $data['path']='0';
            $data['img']='0';
            //执行数据库的插入操作
            if(DB::table('adverts')->insert($data)){
                return redirect('/admin/advert')->with('success','添加成功');
            }else{
                return redirect('/admin/advert')->with('error','添加失败');
            }
        }else{
            $info=DB::table("adverts")->where('id','=',$pid)->first();
            //拼接path
            $data['path']=$info->path.",".$info->id;
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
                    return redirect('/admin/advert')->with('success','添加成功');
                }else{
                    return redirect('/admin/advert')->with('error','添加失败');
                }
            }else{
                 return redirect('/admin/advert')->with('error','请选择图片');
            }
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
    // 修改广告信息
    public function edit($id)
    {
        // 获取数据
        $data=DB::table('adverts')->where("id","=",$id)->first();
        // echo 1;
        // 加载模板
        return view('admin.advert.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    //执行修改
    public function update(Request $request, $id)
    {
        // dd($request->all());
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
                return redirect('/admin/advert')->with('success','修改成功');
            }else{
                return redirect('/admin/advert')->with('error','修改失败');
            }
        }else{
            if(DB::table('adverts')->where("id","=",$id)->update($data)){
                return redirect('/admin/advert')->with('success','修改成功');
            }else{
                return redirect('/admin/advert')->with('error','修改失败');
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

    public function del(Request $requesrt)
    {
        // 要删的id
        $id=$requesrt->input('id');
        // 判断是否有子类
        $num=DB::table('adverts')->where("pid","=",$id)->count();
        // 判断
        if($num>0){
            echo 0;
        }else{
            if(DB::table('adverts')->where("id","=",$id)->delete()){
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    public function checkup(Request $request){
        parse_str($request->input('str'),$arr);
        unset($arr['_token']);
        unset($arr['_method']);

         $messages = [
            "name.required"=>"请输入分类名",
            "gid.required"=>"请输入商品id",
            "sort.required"=>"请输入排序",
        ];
        $rults = [
            'name' => 'required',
            'gid' => 'required',
            'sort' => 'required',
        ];   
        $validator = Validator::make($arr,$rults,$messages);

        if ($validator->fails()) {
            // var_dump($validator->errors()->messages());
            $arr1 =  $validator->errors()->messages();
            foreach($arr1 as $v){
                foreach($v as $val){
                    $error[] = $val;
                }
            }
            return $error;
        }else{
            return 1;
        }
    } 
      
}
