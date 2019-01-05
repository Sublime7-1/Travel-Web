<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Crypt;
// 个人中心--密码
class P_PassController extends Controller
{
	// 密码页面
   	public function index(){

   		return view('home.P_pass.index');
   	}

   	// 检查密码
   	public function checkpass(Request $request){
   		// 获取传过来的密码
   		$old_pwd = $request->input('old_pwd');
   		// 获取当前登录的用户id
   		$id = $request->input('id');
   		// 获取当前用户的密码 --> 解密
 		$pwd = Crypt::decrypt(DB::table('user')->where('id','=',$id)->first()->pass);
 		// 判断-->原始密码和传过来的密码做对比
 		if($old_pwd == $pwd){
 			echo 1;
 		}else{
 			echo 0;
 		}
   	}


   	// 执行密码修改
   	public function dopass(Request $request){
   		// 获取用户ID
   		$id = $request->input('id');
   			// 获取当前用户的密码 --> 解密
   			$pwd = Crypt::decrypt(DB::table('user')->where('id','=',$id)->first()->pass);
   		// 获取新密码并加密
   		$data['pass'] = Crypt::encrypt($request->input('new'));
   		// 获取旧密码
   		$old_pwd = $request->input('old');
   		// 执行判断-->判断当前用户的密码和获取来的旧密码是否一致
   		if($old_pwd == $pwd){
   			// 一致,则更新密码-->判断更新是否成功
   			if(DB::table('user')->where("id","=",$id)->update($data)){
   				// 更新成功,返回1
   				echo 1; 
   			}else{
   				// 更新失败,返回2
   				echo 2; 
   			}		
   		}else{
   			// 不一致,返回3
   			echo 3; 
   		}
   	}
}
