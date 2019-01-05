<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment_type;//意见模型类
use App\Models\Comment;//意见模型类
use DB;

class Comment_typeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 关键字
        $keyword = $request->input('name');
        // 数据
        $data = comment_type::where('name','like',"%{$keyword}%")->get();
        // 总数
        $total = comment_type::count(); 
        return view('admin.comment_type.index',['data'=>$data,'total'=>$total,'request'=>$request]);
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
    public function store(Request $request)
    {
        $data = $request->except(['_token']);
        $data['pid'] = $data['path'] = 0;
        if(DB::table('comment_type')->insert($data)){
             return redirect('/admin/comment_type')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 获取类型下的所有评论
    public function show($id)
    {
        // 获取所有评论
        $data = Comment::where('pid','=',$id)->get();
        // 总条数
        $total = Comment::where('pid','=',$id)->count();

        // 遍历--获取反馈意见的用户,获取反馈类型
        foreach($data as $k=>$v){
            $data[$k]->uname = DB::table('user')->where("id","=",$v->uid)->first()->username;
            $data[$k]->type = DB::table('comment_type')->where("id","=",$v->pid)->first()->name;
        }
        // 加载模板
        return view('admin.comment.index',['data'=>$data,'total'=>$total]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取数据
        $data=Comment_type::where("id","=",$id)->first();
        // echo 1;
        // 加载模板
        return view('admin.comment_type.edit',['data'=>$data]);
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
        $data=$request->except(['_token','_method']);
        if(DB::table('comment_type')->where("id","=",$id)->update($data)){
            return redirect('/admin/comment_type')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
    // 删除评论类型
    public function del(Request $requesrt)
    {
        // 要删的id
        $id=$requesrt->input('id');
        // 判断类形下是否有意见
        $num=DB::table('comment')->where("pid","=",$id)->count();
        // 判断
        if($num>0){
            echo 0;
        }else{
            if(DB::table('comment_type')->where("id","=",$id)->delete()){
                echo 1;
            }else{
                echo 0;
            }
        }
    }
    // 修改评论类型状态
    public function status(Request $request){
        // 状态值
        $status = $request->input('status');
        // 要修改的id
        $id = $request->input('id');
        // 执行
        if(DB::table('comment_type')->where('id','=',$id)->update(['status'=>$status])){
            echo 1;
        }else{
            echo 2;
        }
    }


}
