<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;
use DB;
// 会员中心评论
class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 评论
    public function index(Request $request)
    {
        // 获取订单ID
        $oid = $request->input('id');
        // 获取订单数据
        $orderinfo = DB::table('home_order')->where('id',$oid)->first();
        // 获取商品信息
        $goodsinfo = DB::table('goods')->where("id",$orderinfo->goods_id)->first();
        // 获取该商品的评论数量
        $comment_total = DB::table('comment')->where('gid',$orderinfo->goods_id)->count();
            // 获取该商品好评数量
            $colligate_total = DB::table('comment')->where('gid',$orderinfo->goods_id)->where("colligate_grade",2)->count();
            // 满意度
            if($colligate_total != 0){
                $satisfied = round(($colligate_total/$comment_total)*100);
            }else{
                $satisfied = 0;
            }

        // 获取评论类型
        $commenttype = DB::table('comment_type')->get();
        // 加载模板
        return view('home.comment.index',['commenttype'=>$commenttype,'orderinfo'=>$orderinfo,'goodsinfo'=>$goodsinfo,'comment_total'=>$comment_total,'satisfied'=>$satisfied]);
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
    public function ajax_upload(Request $request){
        if(session('pic')){
            if(is_file('.'.session('pic'))){
                unlink('.'.session('pic'));              
            }
        }
        if($request->file('file')){
             // 获取后缀名
            $suffix = $request->file('file')->getClientOriginalExtension();
            // 随机文件名
            $imgName = md5(time().mt_rand(1000,9999));
            // 拼接文件
            $img = $imgName.'.'.$suffix;

            // 上传文件到uploads目录
            $request->file('file')->move('./uploads/'.date('Y-m-d').'/',$img);
            // 返回文件名
            $filepath = '/uploads/'.date('Y-m-d').'/'.$img;
            session(['pic'=>$filepath]);
            echo $filepath;
        }
       
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 执行插入评论,修改订单状态
    public function store(Request $request)
    {
        // 获取数据,将json对象转为数组
        $data = json_decode($request->input('data'),true);
        // 转化数据类型
        $data['uid'] = intval($data['uid']);
        $data['oid'] = intval($data['oid']);        
        $data['gid'] = intval($data['gid']);
        $data['pid'] = intval($data['pid']);
        $data['time'] = time();
        $data['colligate_grade'] = intval($data['colligate_grade']);
        $data['discount_grade'] = intval($data['discount_grade']);
        $data['service_grade'] = intval($data['service_grade']);
        $data['experience_grade'] = intval($data['experience_grade']);
        $data['anonymous'] = intval($data['anonymous']);
        // var_dump($data);
        // 执行
        if(DB::table('comment')->insert($data)){
            // 点评后改变订单状态
            DB::table('home_order')->where('id',"=",$data['oid'])->update(['order_status'=>8]);
            echo 1;
        }else{
            echo 0;
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

    // 全部评论
    public function total(Request $request){
        $id = $request->input('goodsid');
        // 获取评论信息
        $comment_info = Comment::where("gid","=",$id)->get();   
        // 判断是否有评论    
        if(count($comment_info)){
            // 遍历
            foreach ($comment_info as $k => $v) {
                // 判断是否有回复
                $commentreply = DB::table('comment_reply')->where('comment_id',"=",$v->id)->first();
                if(count($commentreply)){
                    $comment_info[$k]->reply = $commentreply->reply;
                    $comment_info[$k]->reply_time = date('Y-m-d H:i:s',$commentreply->reply_time);                
                }else{
                    $comment_info[$k]->reply = '';
                }
                // dd($v['anonymous']);
                // 判断是否是匿名
                if($v['anonymous'] == '是'){
                    $comment_info[$k]->uname = '匿名评论';
                }else{
                    // 不是匿名则做处理
                    $comment_info[$k]->uname = DB::table('user')->where('id','=',$v->uid)->first()->username;    
                    // 获取用户名长度
                    $strlen = mb_strlen($comment_info[$k]->uname, 'utf-8');
                    // 提取第一个字符
                    $firstStr = mb_substr($comment_info[$k]->uname, 0, 1, 'utf-8');
                    // 提取最后一个字符
                    $lastStr = mb_substr($comment_info[$k]->uname, -1, 1, 'utf-8');
                    // 判断如果用户名长度为2
                    if($strlen == 2){
                        // 则处理为中间加*
                        $comment_info[$k]->uname = $firstStr . str_repeat('*', mb_strlen($comment_info[$k]->uname, 'utf-8') - 1);
                    }else{
                        // 不为2，则中间替换为*
                        $comment_info[$k]->uname = $firstStr . str_repeat("*", $strlen - 2) . $lastStr;
                    }              
                }
                // 获取评论类型
                $comment_info[$k]->type = DB::table('comment_type')->where('id','=',$v->pid)->first()->name;
            }
        }
        // 加载
        return view('home.comment.ajax',['comment_info'=>$comment_info]);
    }
    // 总评分值评论
    public function colligate($colligate_grade,Request $request){
        $id = $request->input('goodsid');
        // 获取评论信息
        $comment_info = Comment::where("gid","=",$id)->where('colligate_grade',$colligate_grade)->get();   
        // 判断是否有评论    
        if(count($comment_info)){
            // 遍历
            foreach ($comment_info as $k => $v) {
                // 判断是否有回复
                $commentreply = DB::table('comment_reply')->where('comment_id',"=",$v->id)->first();
                if(count($commentreply)){
                    $comment_info[$k]->reply = $commentreply->reply;
                    $comment_info[$k]->reply_time = date('Y-m-d H:i:s',$commentreply->reply_time);                
                }else{
                    $comment_info[$k]->reply = '';
                }
                // dd($v['anonymous']);
                // 判断是否是匿名
                if($v['anonymous'] == '是'){
                    $comment_info[$k]->uname = '匿名评论';
                }else{
                    // 不是匿名则做处理
                    $comment_info[$k]->uname = DB::table('user')->where('id','=',$v->uid)->first()->username;    
                    // 获取用户名长度
                    $strlen = mb_strlen($comment_info[$k]->uname, 'utf-8');
                    // 提取第一个字符
                    $firstStr = mb_substr($comment_info[$k]->uname, 0, 1, 'utf-8');
                    // 提取最后一个字符
                    $lastStr = mb_substr($comment_info[$k]->uname, -1, 1, 'utf-8');
                    // 判断如果用户名长度为2
                    if($strlen == 2){
                        // 则处理为中间加*
                        $comment_info[$k]->uname = $firstStr . str_repeat('*', mb_strlen($comment_info[$k]->uname, 'utf-8') - 1);
                    }else{
                        // 不为2，则中间替换为*
                        $comment_info[$k]->uname = $firstStr . str_repeat("*", $strlen - 2) . $lastStr;
                    }              
                }
                // 获取评论类型
                $comment_info[$k]->type = DB::table('comment_type')->where('id','=',$v->pid)->first()->name;
            }
        }
        // 加载
        return view('home.comment.ajax',['comment_info'=>$comment_info]);
    }
    // 类型评论
    public function pids($pids,Request $request){
        $id = $request->input('goodsid');
        // 获取评论信息
        $comment_info = Comment::where("gid","=",$id)->where('pid',$pids)->get();   
        // 判断是否有评论    
        if(count($comment_info)){
            // 遍历
            foreach ($comment_info as $k => $v) {
                // 判断是否有回复
                $commentreply = DB::table('comment_reply')->where('comment_id',"=",$v->id)->first();
                if(count($commentreply)){
                    $comment_info[$k]->reply = $commentreply->reply;
                    $comment_info[$k]->reply_time = date('Y-m-d H:i:s',$commentreply->reply_time);                
                }else{
                    $comment_info[$k]->reply = '';
                }
                // dd($v['anonymous']);
                // 判断是否是匿名
                if($v['anonymous'] == '是'){
                    $comment_info[$k]->uname = '匿名评论';
                }else{
                    // 不是匿名则做处理
                    $comment_info[$k]->uname = DB::table('user')->where('id','=',$v->uid)->first()->username;    
                    // 获取用户名长度
                    $strlen = mb_strlen($comment_info[$k]->uname, 'utf-8');
                    // 提取第一个字符
                    $firstStr = mb_substr($comment_info[$k]->uname, 0, 1, 'utf-8');
                    // 提取最后一个字符
                    $lastStr = mb_substr($comment_info[$k]->uname, -1, 1, 'utf-8');
                    // 判断如果用户名长度为2
                    if($strlen == 2){
                        // 则处理为中间加*
                        $comment_info[$k]->uname = $firstStr . str_repeat('*', mb_strlen($comment_info[$k]->uname, 'utf-8') - 1);
                    }else{
                        // 不为2，则中间替换为*
                        $comment_info[$k]->uname = $firstStr . str_repeat("*", $strlen - 2) . $lastStr;
                    }              
                }
                // 获取评论类型
                $comment_info[$k]->type = DB::table('comment_type')->where('id','=',$v->pid)->first()->name;
            }
        }
        // 加载
        return view('home.comment.ajax',['comment_info'=>$comment_info]);
    }
    // 有图评论
    public function imgs(Request $request){
        $id = $request->input('goodsid');
        // 获取评论信息
        $comment_info = Comment::where("gid","=",$id)->where('img',"!=",'')->get();   
        // 判断是否有评论    
        if(count($comment_info)){
            // 遍历
            foreach ($comment_info as $k => $v) {
                // 判断是否有回复
                $commentreply = DB::table('comment_reply')->where('comment_id',"=",$v->id)->first();
                if(count($commentreply)){
                    $comment_info[$k]->reply = $commentreply->reply;
                    $comment_info[$k]->reply_time = date('Y-m-d H:i:s',$commentreply->reply_time);                
                }else{
                    $comment_info[$k]->reply = '';
                }
                // dd($v['anonymous']);
                // 判断是否是匿名
                if($v['anonymous'] == '是'){
                    $comment_info[$k]->uname = '匿名评论';
                }else{
                    // 不是匿名则做处理
                    $comment_info[$k]->uname = DB::table('user')->where('id','=',$v->uid)->first()->username;    
                    // 获取用户名长度
                    $strlen = mb_strlen($comment_info[$k]->uname, 'utf-8');
                    // 提取第一个字符
                    $firstStr = mb_substr($comment_info[$k]->uname, 0, 1, 'utf-8');
                    // 提取最后一个字符
                    $lastStr = mb_substr($comment_info[$k]->uname, -1, 1, 'utf-8');
                    // 判断如果用户名长度为2
                    if($strlen == 2){
                        // 则处理为中间加*
                        $comment_info[$k]->uname = $firstStr . str_repeat('*', mb_strlen($comment_info[$k]->uname, 'utf-8') - 1);
                    }else{
                        // 不为2，则中间替换为*
                        $comment_info[$k]->uname = $firstStr . str_repeat("*", $strlen - 2) . $lastStr;
                    }              
                }
                // 获取评论类型
                $comment_info[$k]->type = DB::table('comment_type')->where('id','=',$v->pid)->first()->name;
            }
        }
        // 加载
        return view('home.comment.ajax',['comment_info'=>$comment_info]);
    }
   
    // 我的点评
    public function commenton(){
        // 获取当前用户点评
        $comment = Comment::where('uid','=',session('userid'))->paginate(2);

        // 判断
        if(count($comment)){
            // 遍历
            foreach($comment as $k=>$v){
                // 获取订单信息
                $orderinfo = DB::table('home_order')->where('id','=',$v->oid)->first();
                // 获取商品信息
                $goodsinfo = DB::table('goods')->where('id','=',$v->gid)->first();
                // 判断
                if(count($goodsinfo)){
                    $comment[$k]->gname = $goodsinfo->title;
                    $comment[$k]->pic = $goodsinfo->pic;
                }else{
                    $comment[$k]->gname = '该商品已下架或不存在';
                }    
                // 订单编号
                $comment[$k]->order_num = $orderinfo->order_num;
                // 出游时间
                $comment[$k]->begin_time =$orderinfo->begin_time;
                $comment[$k]->end_time =$orderinfo->end_time;
            }
        }else{
            $comment = '';
        }
        // dd($comment);
        // 加载
        return view('home.comment.on',['comment'=>$comment]);
    }

    // 点评详情
    public function check($id){
        // 评论信息
        $commentinfo = Comment::where('id','=',$id)->first();
            // 判断是否有回复
            $commentreply = DB::table('comment_reply')->where('comment_id',"=",$commentinfo->id)->first();
            if(count($commentreply)){
                $commentinfo->reply = $commentreply->reply;
                $commentinfo->reply_time = date('Y-m-d H:i:s',$commentreply->reply_time);                
            }else{
                $commentinfo->reply = '';
            }
        // 获取订单信息
        $orderinfo = DB::table('home_order')->where('id','=',$commentinfo->oid)->first();
        // 获取商品信息
        $goodsinfo = DB::table('goods')->where('id','=',$commentinfo->gid)->first();
            // 总评论
            $commenttotal = DB::table('comment')->where("gid","=",$commentinfo->gid)->count();
            // 综合满意评论数
            $colligate_satisfied = DB::table('comment')->where("gid","=",$commentinfo->gid)->where("colligate_grade","2")->count();
            if($colligate_satisfied != 0){
                $satisfied = round(($colligate_satisfied/$commenttotal)*100);
            }else{
                $satisfied = 0;
            }
        // 评论类型
        $typename = DB::table('comment_type')->where('id','=',$commentinfo->pid)->first()->name;

        return view('home.comment.check',['commentinfo'=>$commentinfo,'orderinfo'=>$orderinfo,'goodsinfo'=>$goodsinfo,'commenttotal'=>$commenttotal,'satisfied'=>$satisfied,'typename'=>$typename]);
    }

}
