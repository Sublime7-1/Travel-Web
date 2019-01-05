<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Mail;
// 安全设置
class P_SecurityController extends Controller
{
    public function index(){
    	// 获取当前用户信息是否有手机邮箱
    	$phone = DB::table('user')->where("id","=",session('userid'))->first()->tel;
    	$email = DB::table('user')->where("id","=",session('userid'))->first()->email;


    	return view('home.p_security.index',['phone'=>$phone,'email'=>$email]);
    }

    // 修改手机
    public function changephone(){
    	// 获取手机号码
    	$phone = DB::table('user')->where("id","=",session('userid'))->first()->tel;
    	// 加载
    	return view('home.p_security.changephone',['phone'=>$phone]);
    } 
    // 步骤一
    public function phone_one(){
    	// 获取手机号码
    	$phone = DB::table('user')->where("id","=",session('userid'))->first()->tel;
    	// 加载
    	return view('home.p_security.phone_one',['phone'=>$phone]);
    } 
    // 步骤二
    public function phone_two(){
    	// 获取手机号码
    	$phone = DB::table('user')->where("id","=",session('userid'))->first()->tel;
    	// 加载
    	return view('home.p_security.phone_two',['phone'=>$phone]);
    } 
    // 执行修改
    public function do_phone(Request $request){
    	// 获取要修改的信息
    	$tel = $request->input('tel');

    	$data['tel'] = $tel;//用户表
    	$data1['phone'] = $tel;//用户信息表
        $data2['phone'] = $tel;//用户地址表
    	// 执行
    	if(DB::table('user')->where("id","=",session('userid'))->update($data)){
			DB::table('userinfo')->where("uid","=",session('userid'))->update($data1); 
            DB::table('useraddress')->where("uid","=",session('userid'))->update($data2); 

	    	return view('home.p_security.phone_three',['tel'=>$tel]);
    	}else{
    		echo 0;
    	}
    } 

    // 修改邮箱
    public function changeemail(){
        // 获取手机号码
        $email = DB::table('user')->where("id","=",session('userid'))->first()->email;
        // 加载
        return view('home.p_security.changeemail',['email'=>$email]);
    } 
    // 步骤一
    public function email_one(){
        // 获取邮箱
        $email = DB::table('user')->where("id","=",session('userid'))->first()->email;
        // 加载
        return view('home.p_security.email_one',['email'=>$email]);
    } 
    // 步骤二
    public function email_two(){
        // 获取邮箱
        $email = DB::table('user')->where("id","=",session('userid'))->first()->email;
        // 加载
        return view('home.p_security.email_two',['email'=>$email]);
    }
    // 发送重置邮件
    public function sendEmail(Request $request){
        // 获取用户id
        $id = $request->input('id');
        // 获取新邮箱
        $new_email = $request->input('new_email');
        // 获取当前时间戳
        $time = time();
        // 获取原始邮箱
        $email = $request->input('email');
        // dd($id.'---'.$email);
        $res = Mail::send('home.p_security.send',['id'=>$id,'new_email'=>$new_email,'time'=>$time],function($message)use($email){
            $message->to($email);
            $message->subject('修改邮箱-重要邮件');
        });
        if($res){
           echo 1;
        }else{
           echo 0;
        }
    } 

    // 发送成功
    public function send_success(){
        return view('home.p_security.email_three');
    }
    // 执行修改
    public function do_email(Request $request){
        // 获取要修改的用户
        $id = $request->input('id');
        // 要修改的邮箱
        $data['email'] = $request->input('new_email');
        // 获取发送邮件的时间
        $time = $request->input('time');
        // 获取当前时间戳
        $newtime = time();
        // 判断
        if($newtime - $time > 180){
            return view('error.404');
        }else{  
            if(DB::table('user')->where('id','=',$id)->update($data)){
                DB::table('userinfo')->where('uid','=',$id)->update($data);
                return view('home.p_security.success',['email'=>$data['email']]);
            }else{
                return view('error.404');
            }           
        }
    } 

}
