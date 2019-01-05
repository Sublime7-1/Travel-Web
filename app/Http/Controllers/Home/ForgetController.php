<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Mail;
// 忘记密码
class ForgetController extends Controller
{
	// 页面1--选择手机或邮箱修改
    public function index(){
    	return view('home.forget.index');
    }
    // 使用手机修改...
    // 使用邮箱修改
    public function sendEmail($email){
        // dd($id.'---'.$email);
        // 获取当前时间戳
        $time = time();
        $res = Mail::send('home.forget.send',['email'=>$email,'time',$time],function($message)use($email){
            $message->to($email);
            $message->subject('密码修改-重要邮件');
        });
        if($res){
           echo 1;
        }else{
           echo 0;
        }
    }

    // 修改密码页面2
    public function forget_two(Request $request){
    	// 获取条件
        $condition = $request->input('condition');
        // 判断条件是手机还是邮箱
        if(!preg_match('/^1[34578]\d{9}$/',$condition)){ 
        // 邮箱
            // 获取发送邮件的时间戳
            $time = $request->input('time');
            // 获取当前时间戳
            $newtime = time();
            // 判断
            if($newtime - $time > 180){
                return view('error.404');
            }else{               
                return view('home.forget.forget_two',['condition'=>$condition]);
            }
        }else{
            // 手机
            return view('home.forget.forget_two',['condition'=>$condition]);
        }
    }

    // 执行修改密码
    public function reset(Request $request){
    	// 获取修改条件
    	$condition = $request->input('condition');   	
    	// 获取密码,加密
    	$data['pass'] = \Crypt::encrypt($request->input('password'));
    	// 执行
    	// 判断条件是手机还是邮箱
    	if(!preg_match('/^1[34578]\d{9}$/',$condition)){ 
    		// 邮箱
          	if(DB::table('user')->where("email","=",$condition)->update($data)){
	    		echo 1;
	    	}else{
	    		echo 0;
	    	}
      	}else{
      		// 手机
	    	if(DB::table('user')->where("tel","=",$condition)->update($data)){
	    		echo 1;
	    	}else{
	    		echo 0;
	    	}
	    }
    }
}
