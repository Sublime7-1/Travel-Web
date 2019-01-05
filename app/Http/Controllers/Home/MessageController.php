<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// 个人中心站内信类
class MessageController extends Controller
{
	// 个人中心站内信
    public function index(){
    	// 获取数据
    	$sinfo = DB::table('message')->where("uid",session('userid'))->paginate(10);
    	foreach($sinfo as $k=>$v){
    		$sinfo[$k]->aname = DB::table('admin')->where("id",$v->aid)->first()->name;
    		$sinfo[$k]->time = date('Y-m-d H:i:s',$v->send_time);
    	}
    	return view('home.message.index',['sinfo'=>$sinfo]);
    }
    // 个人中心站内信删除
    public function del(Request $request){
    	// 获取要删除的ID
    	$id = $request->input('id');
    	// 执行
    	if(DB::table('message')->where("id",$id)->delete()){
    		echo 1;
    	}else{
    		echo 0;
    	}

    }
}
