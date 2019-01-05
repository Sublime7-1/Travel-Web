<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use DB;
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 获取关键字
        $keyword = $request->input('uname');
        if($keyword != ''){
            $user = DB::table('user')->where("username","like","%{$keyword}%")->get();
            foreach($user as $k=>$v){
                $data[] = Comment::where("uid","=",$v->id)->first();
            }
            // dd($data);
        }else{
            // 获取所有评论
            $data = Comment::get();
        }
        // 总条数
        $total = Comment::count();
        // 遍历--获取评论的用户,获取评论类型,获取评论的商品名
        foreach($data as $k=>$v){
            $data[$k]->uname = DB::table('user')->where("id","=",$v->uid)->first()->username;
            $data[$k]->type = DB::table('comment_type')->where("id","=",$v->pid)->first()->name;
            // 获取商品信息
            $goodinfo = DB::table('goods')->where("id","=",$v->gid)->first();
            if(count($goodinfo)){
                $data[$k]->gname = $goodinfo->title;       
            }else{
                $data[$k]->gname = '商品已下架';
            }
        }
        // dd($data);
        // 加载
        return view('admin.comment.index',['data'=>$data,'total'=>$total,'request'=>$request]);
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
    // 执行回复
    public function store(Request $request)
    {
        // 获取评论表ID
        $comment_id = $request->input('comment_id');
        // dd($request->all());
        // 获取需要插入意见回复表的数据
        $data = $request->except(['_token']);
        $data['reply_time'] = time();
        // 执行
        if(DB::table('comment_reply')->insert($data)){
            // 改变意见表的状态
            DB::table('comment')->where("id","=",$comment_id)->update(['status'=>2]);
            return redirect('/admin/comment')->with('success','回复评论成功');
        }else{
            // 否则,显示找不到数据
            return back()->with('error','回复意见失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 查看评论
    public function show($id)
    {
        // 获取评论
        $datas = DB::table('comment')->where("id","=",$id)->first();
        // 如果评论未回复,则变为已查看
        if($datas->status == '0'){
            DB::table('comment')->where("id","=",$id)->update(['status'=>1]);
        }

        // 获取评论
        $data = Comment::where("id","=",$id)->first();
        // 评论者
        $data->uname = DB::table('user')->where("id","=",$data->uid)->first()->username;
        // 评论类型
        $data->type = DB::table('comment_type')->where("id","=",$data->pid)->first()->name;
        // 评论商品
        $data->gname = DB::table('goods')->where("id","=",$data->gid)->first()->title;
        // dd($data);
        // 加载
        return view('admin.comment.see',['data'=>$data]);
    
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
        //
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

    // 删除意见
    public function del(Request $requesrt)
    {
        // 要删的id
        $id=$requesrt->input('id');
        // 判断
        if(DB::table('comment')->where("id","=",$id)->delete()){
            // 删除回复
            DB::table('comment_reply')->where("comment_id","=",$id)->delete();
            echo 1;
        }else{
            echo 0;
        }
    }

    // 回复评论
    public function reply($uid,$comment_id){
        // 获取需要的数据
        $data['uname'] = DB::table('user')->where("id","=",$uid)->first()->username;
        $data['uid'] = $uid;
        $data['comment_id'] = $comment_id;
        // dd($data);
        // 加载模板
        return view('admin.comment.reply',['data'=>$data]);
    }

    // 查看回复
    public function seereply($id){
        // 获取当前ID的回复数据
        $data = DB::table('comment_reply')->where('comment_id',"=",$id)->first();
        // 获取回复者名称
        $data->admin_name = DB::table('admin')->where("id","=",$data->admin_id)->first()->name;
        // 接收者名称
        $data->user_name = DB::table('user')->where("id","=",$data->uid)->first()->username;
        $data->reply_time = date('Y-m-d H:i:s',$data->reply_time);
        // 加载
        return view('admin.comment.see_reply',['data'=>$data]);
    }
}
