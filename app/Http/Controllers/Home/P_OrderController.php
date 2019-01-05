<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Comment;
use Session;
use App\Models\OrderModel;
use App\Models\OrderForm;

class P_OrderController extends Controller
{
    
    
    public function index(){
        $order =OrderModel::where('user_id',session('userid'))->orderby('order_change_time','desc')->paginate(4);
        if($order->count()){
            foreach($order as $v){
                $begin_time = strtotime($v->begin_time);
                $end_time = strtotime($v->end_time);
                if($end_time < time() && ($v->order_status == '支付成功' || $v->order_status == '正在游玩' )){
                    DB::table('home_order')->where('id',$v->id)->update(['order_status'=>7,'order_change_time'=>time()]);
                }elseif($begin_time < time() && ($v->order_status == '支付成功' || $v->order_status == '正在游玩' )){
                    DB::table('home_order')->where('id',$v->id)->update(['order_status'=>6,'order_change_time'=>time()]);
                }
            }
        }
        return view('home.p_order.index',['order'=>$order]);
    }

    public function order_info($id){

        $orderinfo = OrderModel::where('id',$id)->first();
        if($orderinfo->count()){
            $begin_time = strtotime($orderinfo->begin_time);
            $end_time = strtotime($orderinfo->end_time);
            if($end_time < time()  && ($orderinfo->order_status == '支付成功' || $orderinfo->order_status == '正在游玩' )){
                DB::table('home_order')->where('id',$orderinfo->id)->update(['order_status'=>7,'order_change_time'=>time()]);
            }elseif($begin_time < time()  && ($orderinfo->order_status == '支付成功' || $orderinfo->order_status == '正在游玩' )){
                DB::table('home_order')->where('id',$orderinfo->id)->update(['order_status'=>6,'order_change_time'=>time()]);
            }
        }
        $goods_id = DB::table('home_order')->where('id',$id)->select('goods_id')->first();
        $insurance_id = DB::table('home_order')->where('id',$id)->select('insurance')->first();
        // 获取出发地点
        $city = DB::table('goods_city')->where('goods_id',$goods_id->goods_id)->first()->begin_city;
        // 查找form表单信息
        $form = OrderForm::where('order_id',$id)->orderby('id','asc')->get();
       
        // 查找保险信息
        
        $insurance = DB::table('insurance')->where('id',$insurance_id->insurance)->first();
       
        return view('home.p_order.info',['orderinfo'=>$orderinfo,'goods_id'=>$goods_id,'city'=>$city,'form'=>$form,'insurance'=>$insurance]);
    }
    public function order_del($id){
        $res = DB::table('home_order')->where('id',$id)->delete();
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

    // 去支付页面
    public function go_pay($id){
        $pay_zfb = DB::table('pay')->where('status',0)->where('flag',1)->get();
        $pay_quickly = DB::table('pay')->where('status',0)->where('flag',2)->get();
        $pay_interwork = DB::table('pay')->where('status',0)->where('flag',3)->get();

        $order_id = $id;
        return view('home.p_order.pay',['pay_zfb'=>$pay_zfb,'pay_quickly'=>$pay_quickly,'$pay_interwork'=>$pay_interwork,'order_id'=>$order_id]);
    }

    // 进行支付
    public function doing_pay($id){
        $p = DB::table('home_order')->where('id',$id)->first();
        $money = $p->money;
        $order_num = $p->order_num;
        $goods_name = OrderModel::where('id',$id)->select('goods_id')->first()->goods_id;
        pay($order_num,$goods_name,0.01,'途牛旅游',$id);
    }

    // 支付完成,改变状态
    public function success_pay($id){
        $res = DB::table('home_order')->where('id',$id)->update(['order_status'=>'2','order_change_time'=>time()]);
        if($res){
            return view('home.order.order_three');
        }else{
            echo 1;
        }
    }
    // 申请退款
     public function return_pay($id){
        $res = DB::table('home_order')->where('id',$id)->update(['order_status'=>4]);
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

}
