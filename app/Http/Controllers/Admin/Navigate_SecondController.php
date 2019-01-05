<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
// 调用navative_second数据表模型类
use App\Models\Navigate_Second;

class Navigate_SecondController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        if($request->has('keyword')){
            $keyword = $request->input('keyword');
            // 获取所有数据
            $data = Navigate_Second::where('pid','=','0')->where('name','like','%'.$keyword.'%')->orderBy('level','asc')->paginate(10);
            $num = Navigate_Second::where('pid','=','0')->where('name','like','%'.$keyword.'%')->orderBy('level','asc')->count();

        }else{
            $keyword = '';
            $data = Navigate_Second::where('pid','=','0')->orderBy('level','asc')->paginate(10);
            $num = Navigate_Second::where('pid','=','0')->orderBy('level','asc')->count();
        }

      
         // 当前页码
        $currentPage = isset($_GET['page'])?$_GET['page']:1;
        // 偏移量
        $offset = ($currentPage-1)*10;
        // 初始编号
        $i = 1;
        // 返回首页
        return view('admin.navigate_second.index',['data'=>$data,'i'=>$i,'offset'=>$offset,'keyword'=>$keyword,'num'=>$num,'request'=>$request->all()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 返回添加页面
        return view('admin.navigate_second.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        // 获取要添加的表单数据
        $data = $request->except(['ac','_token']);
        // 判断表单是否有pid和path值，有添加的是子分类 否则添加的是顶级分类 pid为0 path为0,
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

        $res = Navigate_Second::insert($data);
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
    public function show($id)
    {

        //
        $data = navigate_second::where('pid','=',$id)->get();
         // 当前页码
        $currentPage = isset($_GET['page'])?$_GET['page']:1;
        // 偏移量
        $offset = ($currentPage-1)*10;
        // 初始编号
        $i = 1;
        return view('admin.navigate_second.childlist',['data'=>$data,'id'=>$id,'offset'=>$offset,'i'=>$i]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $data = Navigate_Second::where('id','=',$id)->first();
        return view('admin.navigate_second.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //// 获取要更新的数据
        $data = $request->except(['ac','_token','_method']);
        // 判断是否有上传新图片
        if ($request->has('pic')) {
            // 判断是否有原图片
            $old = Navigate_Second::where('id','=',$id)->first();
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
        
        // 修改数据
        $res = Navigate_Second::where('id','=',$id)->update($data);
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
    public function destroy($id)
    {

         // 查询是否有子类
        $data = navigate_second::where('pid','=',$id)->get();
        if (count($data) > 0) {
            // 说明有子类,需要删除子类才能删除这个顶级分类
            echo 2;
        }else{
              //ajax删除数据,删除的是子类
            $res = navigate_second::where('id','=',$id)->delete();
            if ($res) {
                echo 1;
            }else{
                echo 0;
            }
        }
    }

     // 更改分类状态
    public function changeStatus(Request $request,$id){
        // 获取当前分类的状态码
        $status = $request->input('status');
        // 获取修改的状态码
        $data['is_display'] = $status==1 ? 2 : 1;
        // 更新数据
        $res = navigate_second::where('id','=',$id)->update($data);
        if ($res) {
            echo 1;
        }
    }

    // 显示添加子分类页面
    public function addChild($id){
        $info = Navigate_Second::where('id','=',$id)->first();
        $path = $info['path'].$id.',';
        $level = $info['level'];

        return view('admin.navigate_second.addchild',['pid'=>$id,'path'=>$path,'level'=>$level]);
    }
}
