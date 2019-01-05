<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
class UsercouponController extends Controller
{
    public function index(){
    	// 获取当前用户可用的优惠劵数量
    	$notuse = DB::table('coupon_receive')->where("status",0)->where("uid",session('userid'))->count();
    	// 优惠劵类型
    	$coupon_type = DB::table('coupontype')->get();
    	// 获取当前用户可用的优惠劵信息
    		// 获取优惠券id
    		$cids = DB::table('coupon_receive')->where("status",0)->where("uid",session('userid'))->pluck('cid');
    		// dd(count($cids));
    		if(count($cids) == 0){
    			$coupon = '';
    		}else{
    			// dd($cids);
	    		// 获取优惠券信息
		    	foreach($cids as $k=>$v){
		    		$coupon[] = DB::table('coupon')->where("id",$v)->first();
		    	}
	    		// 获取优惠劵对应类型
		    	foreach($coupon as $k=>$v){
		    		$coupon[$k]->type = DB::table('coupontype')->where('id',$v->pid)->first()->name;
		    		$coupon[$k]->start_time = date('Y-m-d',$v->start_time);
		    		$coupon[$k]->end_time = date('Y-m-d',$v->end_time);
		    	}
	    	}
	    	// dd($coupon);
	    // 加载模板
    	return view('home.coupon.index',['notuse'=>$notuse,'coupon_type'=>$coupon_type,'coupon'=>$coupon]);
    }

    public function pids($pid){
    	// 获取当前用户可用的优惠劵信息
    		// 获取优惠券id
    		$cids = DB::table('coupon_receive')->where("status",0)->where("uid",session('userid'))->pluck('cid');
    		// dd($cids);
    		// 遍历获取优惠券信息
	    	foreach($cids as $k=>$v){
	    		// 判断是否有pid
	    		if($pid && $pid != 0){
	    			// 有,则获取对应pid的数据
		    		$coupon[$k] = DB::table('coupon')->where("id",$v)->where("pid",$pid)->first();
		    		// 删除为空的键值对
		    		if($coupon[$k] == ''){
		    			unset($coupon[$k]);
		    		}
	    		}else{	
	    			// 没有,或为0,则遍历全部
	    			$coupon[$k] = DB::table('coupon')->where("id",$v)->first();
	    		}
	    	}
	    	// dd($coupon);
    		// 获取优惠劵对应类型
	    	foreach($coupon as $k=>$v){
	    		$coupon[$k]->type = DB::table('coupontype')->where('id',$v->pid)->first()->name;
				$coupon[$k]->start_time = date('Y-m-d',$v->start_time);
	    		$coupon[$k]->end_time = date('Y-m-d',$v->end_time);
	    	}
	    	// dd($coupon);
	    // 加载模板
    	return view('home.coupon.ajax_type',['coupon'=>$coupon]);
    }
}
