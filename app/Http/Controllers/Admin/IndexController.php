<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\OrderModel;
use App\Models\Admin as AdminModel;

class IndexController extends Controller
{   
    //后台首页
    public function index(Request $request){
        // 客服
        $service_num = DB::table('servicelist')->where('status','=','0')->count();
        // 友情链接请求消息
        $sb = DB::table('admin')->where("id",session('AdminUserInfo.id'))->first();
        if($sb->status > 2){
            $links_num = DB::table('links')->where('status','=',0)->count();
        }else{
            $links_num = 0;
        }
        // 站内信
        $message_num = DB::table('message')->where('aid','=',session('AdminUserInfo.id'))->count();
        // 意见数量
        if($sb->status > 2){
            $advices_num = DB::table('advices')->where('status','=',0)->count();
        }else{
            $advices_num = 0;
        }
        // 统计退款的信息
        $return_num = OrderModel::where('order_status',4)->where('admin_id',session('AdminUserInfo.id'))->count();
        // 统计等待确认的信息
        $real_num = OrderModel::where('order_status',0)->where('admin_id',session('AdminUserInfo.id'))->count();
        
        $sum = $return_num + $real_num ;

        $icon = DB::table('system_set')->where('id','=','1')->first();
        $chart = DB::select('select user_id as `userid` from `char` where service_id = '.session('AdminUserInfo.id').' group by `user_id`');
        $num1 = count($chart);

        // 查找用户权限
        $level = AdminModel::where('id',session('AdminUserInfo.id'))->first()->status;
        return view('admin.index',['info'=>$icon,'service_num'=>$service_num,'links_num'=>$links_num,'num1'=>$num1,'message_num'=>$message_num,'advices_num'=>$advices_num,'return_num'=>$return_num,'real_num'=>$real_num,'sum'=>$sum,'level'=>$level]);
    }
    // 系统首页
    public function admin_index(){
        $user_num = DB::table('user')->get()->count();
        $order = DB::table('home_order')->where('admin_id',session('AdminUserInfo.id'))->get();
        $order_num = $order->count();
        $order_no = DB::table('home_order')->where('admin_id',session('AdminUserInfo.id'))->where('order_status','>','3')->get()->count();
        $money = 0;

        $order1 = DB::table('home_order')->where('admin_id',session('AdminUserInfo.id'))->where('order_status','>','2')->get()->count();
        $order2 = DB::table('home_order')->where('admin_id',session('AdminUserInfo.id'))->where('order_status','=','7')->get()->count();
        $order3 = DB::table('home_order')->where('admin_id',session('AdminUserInfo.id'))->where('order_status','>','2')->where('order_status','<','6')->get()->count();
        $goods1 = DB::table('goods')->where('admin_id',session('AdminUserInfo.id'))->get()->count();
        $goods2 = DB::table('goods')->where('status','1')->where('admin_id',session('AdminUserInfo.id'))->get()->count();
        $goods3 = DB::table('goods')->where('admin_id',session('AdminUserInfo.id'))->where('status','2')->get()->count();
        $goodspin = DB::table('comment')->get()->count();

        $m = DB::table('message')->where('aid',session('AdminUserInfo.id'))->take(5)->get();
        if($order_num){
            foreach($order as $k=>$v){
                if($v->order_status > 5){}
                    $money += DB::table('home_order')->where('admin_id',session('AdminUserInfo.id'))->where('id',$v->id)->first()->money;
            }
        }
        return view('admin.index.index',['user_num'=>$user_num,'order_num'=>$order_num,'order_no'=>$order_no,'money'=>$money,'order1'=>$order1,'order2'=>$order2,'order3'=>$order3,'goods1'=>$goods1,'goods2'=>$goods2,'goods3'=>$goods3,'goodspin'=>$goodspin,'m'=>$m]);
    }

    // 无刷新消息提醒
    public function index_service(){
        $service_num = DB::table('servicelist')->where('status','=','0')->count();
        return $service_num;
    }
        // 友情链接数量
    public function index_links(){
        $sb = DB::table('admin')->where("id",session('AdminUserInfo.id'))->first();
        if($sb->status > 2){
            $links_num = DB::table('links')->where('status','=',0)->where('id','=',session('AdminUserInfo.id'))->count();     
        }else{
            $links_num = 0;
        }
        return $links_num;
    }
    public function servicenew(){
        $chart = DB::select('select user_id as `userid` from `char` where service_id = '.session('AdminUserInfo.id').' group by `user_id`');
        $num = count($chart);
        return $num;
    }
        // 站内信数量
    public function index_message(){
        $message_num = DB::table('message')->where('aid','=',session('AdminUserInfo.id'))->count();
        return $message_num;
    }
        // 意见数量
    public function index_advices(){
        $sb = DB::table('admin')->where("id",session('AdminUserInfo.id'))->first();
        if($sb->status > 2){
            $advices_num = DB::table('advices')->where('status','=',0)->count();
        }else{
            $advices_num = 0;
        }
        return $advices_num;
    }
        //订单总
    public function index_order(){
        $return_num = OrderModel::where('order_status',4)->where('admin_id',session('AdminUserInfo.id'))->count();
        // 统计等待确认的信息
        $real_num = OrderModel::where('order_status',0)->where('admin_id',session('AdminUserInfo.id'))->count();
        
        $sum = $return_num + $real_num ;
        return ['return_num'=>$return_num,'real_num'=>$real_num,'sum'=>$sum];
    }
}
