<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Admin;
use App\Http\Requests\Admin as Admininsert;
class PersonalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function beforeAction(){
       // 自定义前置方法,有需要的人自用
    }

    public function index(Request $request)
    {
        $id = session('AdminUserInfo.id');
        $userinfo = Admin::find($id);

        $ip = $request->getClientIp();

        return view('admin.personal.index',['admin'=>$userinfo,'ip'=>$ip]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        echo 123;
        dd(input());
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
    // 个人信息
    public function personal(){
       return view('admin.admin.personal');
    }
    // 修改密码
    public function newpass(Request $request){
        
        parse_str($request->input('str'),$arr);
        //修改原密码
        $oldpass = $arr['oldpass'];
        $id = session('AdminUserInfo.id');
        $pass = \DB::table('admin')->find($id);
        if($oldpass != \Crypt::decrypt($pass->pass)){
            return ['data'=>2,'error'=>'原密码不正确'];
        }
        $newpass = $arr['newpass'];
        $renewpass = $arr['renewpass'];
        if($newpass != $renewpass){
            return ['data'=>2,'error'=>'两次密码不一致'];
        }
        $newpass = \Crypt::encrypt($newpass); 
        $res = \DB::table('admin')->where('id',$id)->update(['pass'=>$newpass]);
        if($res){
            return 1;
        }else{
            return ['data'=>2,'error'=>'修改失败'];
        }

    }
    //修改信息
    public function doedit(Request $request){
         parse_str($request->input('str'),$arr);
         $id = session('AdminUserInfo.id');
         $res = \DB::table('admin')->where('id',$id)->update($arr);
         if($res){
            echo 1;
         }else{
            echo 2;
         }

    }
}
