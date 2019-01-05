<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\OrderModel;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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

    public function loading_order(){
        $order = OrderModel:: where('admin_id',session('AdminUserInfo.id'))->where('order_status','<',6)->orderby('begin_time','asc')->get();
        if($order->count()){
            foreach($order as $v){
                $begin_time = strtotime($v->begin_time);
                $end_time = strtotime($v->end_time);
                if($end_time < time()  && ($v->order_status == '支付成功' || $v->order_status == '正在游玩' )){
                    DB::table('home_order')->where('id',$v->id)->update(['order_status'=>7,'order_change_time'=>time()]);
                }elseif($begin_time < time()  && ($v->order_status == '支付成功' || $v->order_status == '正在游玩' )){
                    DB::table('home_order')->where('id',$v->id)->update(['order_status'=>6,'order_change_time'=>time()]);
                }
            }
        }
        $id =  DB::table('home_order')->where('admin_id',session('AdminUserInfo.id'))->select('goods_id')->orderby('order_change_time','desc')->get();
      
        if($id->count()){
            foreach($id as $v){
                $pic[] = DB::table('goods')->select('pic')->where('id',$v->goods_id)->first()->pic;
            }
        }else{
            $pic = [];
        }
        return view('admin.order.loading_order',['order'=>$order,'pic'=>$pic]);
    }
    // 完成的订单
    public function success_order(){
        $order = OrderModel:: where('admin_id',session('AdminUserInfo.id'))->where('order_status','>',5)->orderby('begin_time','asc')->get();
        if($order->count()){
            foreach($order as $v){
                $begin_time = strtotime($v->begin_time);
                $end_time = strtotime($v->end_time);
                if($end_time < time()  && ($v->order_status == '支付成功' || $v->order_status == '正在游玩' )){
                    DB::table('home_order')->where('id',$v->id)->update(['order_status'=>7,'order_change_time'=>time()]);
                }elseif($begin_time < time()  && ($v->order_status == '支付成功' || $v->order_status == '正在游玩' )){
                    DB::table('home_order')->where('id',$v->id)->update(['order_status'=>6,'order_change_time'=>time()]);
                }
            }
        }
        $id =  DB::table('home_order')->where('admin_id',session('AdminUserInfo.id'))->select('goods_id')->orderby('order_change_time','desc')->get();
      
        if($id->count()){
            foreach($id as $v){
                $pic[] = DB::table('goods')->select('pic')->where('id',$v->goods_id)->first()->pic;
            }
        }else{
            $pic = [];
        }
        return view('admin.order.loading_order',['order'=>$order,'pic'=>$pic]);
    }

    public function status(Request $request){
        $id = $request->input('id');
        $i = $request->input('i');
        $res = DB::table('home_order')->where('id',$id)->update(['order_status'=>$i,'order_change_time'=>time()]);

        if($i == 5){
            // 获取当前订单的支付数据
            $accountinfo = DB::table('accounts')->where('oid','=',$id)->first();
                // 获取用户id
                $uid = $accountinfo->uid;
                // 获取订单消费的金额-->退款金额
                $money = $accountinfo->pay_money;

            // 通过用户id获取用户最新消费的数据
            $accountinfo_new = DB::table('accounts')->where('uid','=',$uid)->orderBy('id','desc')->first();
                // 获取对应的ID
                $new_id = $accountinfo_new->id;
                // 最新总金额 - 退款的金额 = 退款后最新消费总金额
                $data['pay_total'] = $accountinfo_new->pay_total - $money;

            // 更新退款后最新消费总金额
            DB::table('accounts')->where('id','=',$new_id)->update($data);      
            // 把当前订单的支付数据删除
            DB::table('accounts')->where('oid','=',$id)->delete();
        }

        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function return(Request $request){
        $turn = OrderModel::where('order_status',4)->get();
        $id =  DB::table('home_order')->where('admin_id',session('AdminUserInfo.id'))->select('goods_id')->orderby('begin_time','asc')->get();
      
        if($id->count()){
            foreach($id as $v){
                $pic[] = DB::table('goods')->select('pic')->where('id',$v->goods_id)->first()->pic;
            }
        }else{
            $pic = [];
        }
        return view('admin.order.return',['turn'=>$turn,'pic'=>$pic]);
    }
    public function del($id){
        $res = DB::table('home_order')->where('id',$id)->delete();
        DB::table('order_form')->where('order_id',$id)->delete();
        if($res){
            echo 1;
        }else{
            echo 2;
        }

    }


}
