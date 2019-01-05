<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class OrderFormController extends Controller
{
    public function index($id){
        $form = DB::table('order_form')->where('order_id',$id)->get();
        return view('admin.order.form',['form'=>$form]);
    }
    //加载修改详细信息
    public function edit($id){
        $user = DB::table('order_form')->where('id',$id)->first();
        return view('admin.order.edit',['id'=>$id,'user'=>$user]);
    }

    //修改详细信息
    public function doedit($id,Request $request){
        $arr = $request->except(['id','_token']);
        $id = $request->input('id');
        $order_id = $request->input('order_id');
        $res = DB::table('order_form')->where('id',$id)->update($arr);
        if($res){
            return redirect('/admin/order/form/'.$order_id.'')->withErrors(['修改成功']);
        }else{
            return back()->withErrors(['修改失败']);
        }
    }


    // 订单图信息
    public function chartinfo(){
        // 获取所有正常交易的交易金额
        $trade_info = DB::table('home_order')->where('order_status','!=',5)->pluck('money');
        // 累加金额
        $money_trade = '';
        foreach($trade_info as $k => $v){
           $money_trade += $v;
        }
        $money_trade = round($money_trade,2);

        // 获取交易的总数量
        $order_num = DB::table('home_order')->count();
            // 交易成功的数量
            $success_num = DB::table('home_order')->where('order_status','!=',5)->count();
            // 交易失败的数量
            $error_num = DB::table('home_order')->where('order_status','=',5)->count();

        // 获取所有退款的交易金额
        $refund_info = DB::table('home_order')->where('order_status','=',5)->pluck('money');
        // 累加金额
        $money_refund = '';
        foreach($refund_info as $k => $v){
           $money_refund += $v;
        }
        $money_refund = round($money_refund,2);


        // 上半年开始的时间戳
        $last_half_first = strtotime(date('Y-06-01', strtotime('-6 month')));
        // 上半年结束的时间戳
        $last_half_last =  strtotime(date('Y-m-d',$last_half_first)."+6 month -1 day");


        // 初始值
        $up = 0;//上半年订单数
        $up_success = 0;//上半年成功订单数
        $up_error = 0;//上半年成功订单数
        
        $down = 0;//下半年订单数
        $down_success = 0;//下半年成功订单数
        $down_error = 0;//下半年成功订单数

        // 获取所有订单数据
        $order_total = DB::table('home_order')->get();
        // 遍历
        foreach($order_total as $k=>$v){
            // 获取订单的时间戳
            $order_time = strtotime($v->begin_time);
            // 判断
            if($last_half_last - $order_time >= 0){
                $up++;
            }else{
                $down++;
            }
        }

        // 获取成功交易订单数据
        $order_success = DB::table('home_order')->where("order_status","!=",5)->get();
        // 遍历
        foreach($order_success as $k=>$v){
            // 获取订单的时间戳
            $order_time = strtotime($v->begin_time);
            // 判断
            if($last_half_last - $order_time >= 0){
                $up_success++;
            }else{
                $down_success++;
            }
        }

        // 获取失败交易订单数据
        $order_error = DB::table('home_order')->where("order_status","=",5)->get();
        // 遍历
        foreach($order_error as $k=>$v){
            // 获取订单的时间戳
            $order_time = strtotime($v->begin_time);
            // 判断
            if($last_half_last - $order_time >= 0){
                $up_error++;
            }else{
                $down_error++;
            }
        }

        // dd($up.'------'.$down);
        // 加载
        return view('admin.order.chartinfo',[
                'money_trade'=>$money_trade,
                'order_num'=>$order_num,
                'success_num'=>$success_num,
                'error_num'=>$error_num,
                'money_refund'=>$money_refund,
                'up'=>$up,'down'=>$down,
                'up_success'=>$up_success,'down_success'=>$down_success,
                'up_error'=>$up_error,'down_error'=>$down_error
        ]);
    }
}
