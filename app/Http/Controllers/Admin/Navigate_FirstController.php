<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Navigate_First;
use App\Http\Requests\Navigate;

class Navigate_FirstController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    { 
        //显示一级分类

        if($request->has('keyword')){
            $keyword = $request->input('keyword');
            $data = Navigate_First::where('pid','=','0')->where('level','!=','0')->where('name','like','%'.$keyword.'%')->orderBy('level','asc')->paginate(10);
            // 分类数
            $num = Navigate_First::where('pid','=','0')->where('level','!=','0')->where('name','like','%'.$keyword.'%')->orderBy('level','asc')->count();
        }else{
            $keyword = '';
            $data = Navigate_First::where('pid','=','0')->where('level','!=','0')->orderBy('level','asc')->paginate(10);
            // 分类数
            $num =  Navigate_First::where('pid','=','0')->where('level','!=','0')->orderBy('level','asc')->count();
        }

       
        
        
        

         // 当前页码
        $currentPage = isset($_GET['page'])?$_GET['page']:1;
        // 偏移量
        $offset = ($currentPage-1)*10;
        // 初始编号
        $i = 1;


        return view('admin.navigate_first.index',['data'=>$data,'i'=>$i,'offset'=>$offset,'num'=>$num,'keyword'=>$keyword,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 添加一级导航分类
        $path = '0,';
        return view('admin.navigate_first.add',['path'=>$path]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(navigate $request)
    {
        // 获取除了ac和_token的数据
        $data = $request->except(['ac','_token']);
        // 默认显示
        $data['is_display'] = 1;

        // 如果有pid和path 则说明是添加子类
        $data['pid'] = $request->has('pid')?$request->input('pid'):0;
        $data['path'] = $request->has('path')?$request->input('path'):'0,';

        // 上传图片
        // 判断是否有上传图片
        if ($request->has('pic')) {
            // 获取后缀名
            $suffix = $request->file('pic')->getClientOriginalExtension();
            // 随机文件名
            $picName = md5(time().mt_rand(1000,9999));
            // 拼接文件
            $pic = $picName.'.'.$suffix;
            // 上传文件到uploads目录
            $request->file('pic')->move('./uploads/'.date('Y-m-d').'/',$pic);
            // 保存到要添加进数据库的数组中
            $data['pic'] = '/uploads/'.date('Y-m-d').'/'.$pic;
        }else{
            // 如果没有上传图片,用0保存表示没有上传图片
            $data['pic'] = '0';
        }
        
        $res = Navigate_First::insert($data);
        if ($res) {
            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','添加成功');
          // layer提示成功的样式码
          $request->session()->flash('tips_code','6');
          // 刷新父窗口页面
          echo '<script>window.parent.location.reload();</script>';
        }else{
            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','添加失败');
          // layer提示失败的样式码
          $request->session()->flash('tips_code','5');
          echo '<script>window.parent.location.reload();</script>';
        }


        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        if($request->has('keyword')){
            $keyword = $request->input('keyword');
            // 查看子分类
            $data = Navigate_First::where('pid','=',$id)->where('name','like','%'.$keyword.'%')->paginate(10);
            // 子分类数量
            $num = Navigate_First::where('pid','=',$id)->where('name','like','%'.$keyword.'%')->count();
        }else{
            $keyword = '';
           // 查看子分类
            $data = Navigate_First::where('pid','=',$id)->paginate(10);
            // 子分类数量
            $num = Navigate_First::where('pid','=',$id)->count();
        }


         // 当前页码
        $currentPage = isset($_GET['page'])?$_GET['page']:1;
        // 偏移量
        $offset = ($currentPage-1)*10;
        // 初始编号
        $i = 1;
        return view('admin.navigate_first.childlist',['data'=>$data,'pid'=>$id,'num'=>$num,'i'=>$i,'offset'=>$offset,'keyword'=>$keyword,'request'=>$request->all()]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //获取要修改的数据
        $data = Navigate_First::where('id','=',$id)->first();
        // 展示模版分配数据
        return view('admin.navigate_first.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(navigate $request, $id)
    {
        // 获取要更新的数据
        $data = $request->except(['ac','_token','_method']);
        // 判断是否有上传新图片
        if ($request->has('pic')) {

            // 判断是否有原图片
            $old = Navigate_First::where('id','=',$id)->first();
            if ('.'.is_file($old->pic)) {
                 unlink('.'.$old->pic);
            }
            // 获取上传文件的后缀名
            $suffix = $request->file('pic')->getClientOriginalExtension();
            // 随机文件名
            $picName = md5(time().mt_rand(1000,9999));
            $pic = $picName.'.'.$suffix;
            // 将文件移动到上传目录
            $request->file('pic')->move('./uploads/'.date('Y-m-d').'/',$pic);
            // 保存到要添加进数据库的数组中
            $data['pic'] = '/uploads/'.date('Y-m-d').'/'.$pic;
        }
        // dd($id);
        // 修改数据
        $res = Navigate_First::where('id','=',$id)->update($data);
        if ($res) {
            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','修改成功');
          // layer提示成功的样式码
          $request->session()->flash('tips_code','6');
          // 刷新父窗口页面
          echo '<script>window.parent.location.reload();</script>';
        }else{
            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','修改失败');
          // layer提示失败的样式码
          $request->session()->flash('tips_code','5');
          echo '<script>window.parent.location.reload();</script>';
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request,$id)
    {  
        // 查询是否有子类
        $data = Navigate_First::where('pid','=',$id)->get();
        if (count($data) > 0) {
            // 说明有子类,需要删除子类才能删除这个顶级分类
            echo 2;
        }else{
              //ajax删除数据,删除的是子类
            $res = Navigate_First::where('id','=',$id)->delete();
            if ($res) {
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    // 显示添加子分类页面
    public function addChild($id){
        $info = Navigate_First::where('id','=',$id)->first();
        $path = $info['path'].$id.',';
        $level = $info['level'];
        return view('admin.navigate_first.addchild',['pid'=>$id,'path'=>$path,'level'=>$level]);
    }

    // 更改分类状态
    public function changeStatus(Request $request,$id){
        // 获取当前分类的状态码
        $status = $request->input('status');
        // 获取修改的状态码
        $data['is_display'] = $status==1 ? 2 : 1;
        // 更新数据
        $res = Navigate_First::where('id','=',$id)->update($data);
        if ($res) {
            echo 1;
        }
    }

    public function getAllNavigate(Request $request){
        //显示所有顶级分类
        $data = Navigate_First::where('pid','=','0')->paginate(10);
        // 分类数
        $num = count($data);
          // 当前页码
        $currentPage = isset($_GET['page'])?$_GET['page']:1;
        // 偏移量
        $offset = ($currentPage-1)*10;
        // 初始编号
        $i = 1;
        return view('admin.navigate_first.index',['data'=>$data,'num'=>$num,'i'=>$i,'offset'=>$offset,'request'=>$request->all()]);
    }

}
