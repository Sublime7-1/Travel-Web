<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Message;
use Validator;
class MessageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 站内信列表页
    public function index(Request $request)
    {
        $title = $request->input('title');
        $data = Message::where('title','like',"%{$title}%")->where('aid','=',session('AdminUserInfo.id'))->get();
        $total = Message::count();  
        foreach($data as $k => $v){
            $userinfo = DB::table('user')->where("id","=",$v->uid)->first();
            if(count($userinfo)){
                $data[$k]->u_name = $userinfo->username;
            }else{
                $data[$k]->u_name = '该用户已注销';                
            }
            $data[$k]->a_name = DB::table('admin')->where("id","=",session('AdminUserInfo.id'))->first()->name;
        }      
        return view('admin.message.index',['total'=>$total,'data'=>$data,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data = DB::table('user')->get();
        return view('admin.message.add_single',['data'=>$data]);
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
        $data['send_time'] = $data['up_time'] = time();
        $data['aid'] = session('AdminUserInfo.id');
        // dd($data);
        if(DB::table('message')->insert($data)){
            return redirect('/admin/message')->with('success','添加成功');
        }else{
            return back()->with('error','添加成功');
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
        $data = DB::table('message')->where("id","=",$id)->first();
        return view('admin.message.edit',['data'=>$data]);
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
        $data = $request->except(['_token','_method']);
        $data['up_time'] = time();
        if(DB::table('message')->where("id","=",$id)->update($data)){
            return redirect('/admin/message')->with('success','修改成功');
        }else{
            return redirect('/admin/message')->with('error','修改失败');
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
        if(DB::table('message')->where("id","=",$id)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    // 群发站内信
    public function add(){
        return view('admin.message.add_group');
    }
    // 执行群发
    public function doadd(Request $request){
        // 获取插入的数据
        $data = $request->except(['_token']);
        $data['send_time'] = $data['up_time'] = time(); 
        $data['aid'] = session('AdminUserInfo.id');   
        // 获取会员信息
        $userinfo = DB::table('user')->get();
        // dd($data);
        // 遍历
        foreach($userinfo as $k=>$v){
            // 获取用户id
            $data['uid'] = $v->id;
            // 插入
            $bool = DB::table('message')->insert($data);
        }
        // 判断跳转
        if($bool){
            return redirect('/admin/message')->with('success','信息发送成功');
        }
    }


    public function checkup(Request $request){
        parse_str($request->input('str'),$arr);
        unset($arr['_token']);
        unset($arr['_method']);

         $messages = [
            "title.required"=>"标题不能为空",
            "content.required"=>"内容不能为空",
        ];
        $rults = [
            'title' => 'required',
            'content' => 'required',
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

    public function checkups(Request $request){
        parse_str($request->input('str'),$arr);
        unset($arr['_token']);
        unset($arr['_method']);

        $messages = [
            "title.required"=>"标题不能为空",
            "content.required"=>"内容不能为空",
            "uid.required"=>"请选择消息接收者",            
        ];
        $rults = [
            'title' => 'required',
            'content' => 'required',
            'uid' => 'required',
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
