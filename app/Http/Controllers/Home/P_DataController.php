<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\P_Data;
use DB;
// 个人资料类
class P_DataController extends Controller
{
	// 个人资料页面
    public function index(){
    	// 获取当前用户的信息
    	$userinfo = P_Data::where('uid','=',session('userid'))->first();
    	// 加载
    	return view('home.p_data.index',['userinfo'=>$userinfo]);
    }

    // 检测昵称
    public function checknick(Request $request){
    	$nickname = $request->input('nickname');
    	if(DB::table('userinfo')->where("nickname","=",$nickname)->first()){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }
    // 检测姓名
	public function checkreal(Request $request){
    	$realname = $request->input('realname');
    	if(DB::table('userinfo')->where("realname","=",$realname)->first()){
    		echo 1;
    	}else{
    		echo 0;
    	}
    }

    // 保存个人信息
    public function save(Request $request){
    	// 获取当前登录用户ID
    	$uid = session('userid');

	    // 获取当前用户的信息
	    $info=DB::table('userinfo')->where("uid","=",$uid)->first();

    	// 获取上传的需要的数据
    	$data = $request->except(['_token']);

    	// 判断是否有选择生日
    	if($data['birth']){   		
	    	$data['birth'] = strtotime($data['birth']);
    	}

        // 获取地址表需要的数据
        $data1['receiver'] = $data['realname'];
        $data1['city'] = $data['address'];

    	// 判断是否上传了头像
    	if($request->hasFile('pic')){
    		// 获取头像文件后缀名
            $suffix = $request->file('pic')->getClientOriginalExtension();
            // 随机头像文件名
            $picName = md5(time().mt_rand(1000,9999));
            // 拼接头像文件名
            $pic = $picName.'.'.$suffix;
            // 上传头像文件到uploads目录
            $request->file('pic')->move('./uploads/'.date('Y-m-d').'/',$pic);
            // 保存头像路径到要添加进数据库的数组中
            $data['pic'] = '/uploads/'.date('Y-m-d').'/'.$pic;
    		// dd($data);
            //执行用户信息表的更新操作
            if(DB::table('userinfo')->where("uid","=",$uid)->update($data)){
                // 执行用户地址表的更新
                DB::table('useraddress')->where('uid','=',$uid)->update($data1);

            	// 判断是否存在头像文件
                if(file_exists('.'.$info->pic)){
                    unlink('.'.$info->pic);                   
                }
                return redirect('/home/personaldata/index')->with('success','修改成功');
            }else{
                return redirect('/home/personaldata/index')->with('error','修改失败');
            }
    	}else{
    		// dd($data);
    		if(DB::table('userinfo')->where("uid","=",$uid)->update($data)){
                // 执行用户地址表的更新
                DB::table('useraddress')->where('uid','=',$uid)->update($data1);

                return redirect('/home/personaldata/index')->with('success','修改成功');
            }else{
                return redirect('/home/personaldata/index')->with('error','修改失败');
            }
    	}
    }
}
