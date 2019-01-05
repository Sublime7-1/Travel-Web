<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class OrderModel extends Model
{
    protected $table = "home_order";
    public function getGoodsidAttribute($value){
        return DB::table('goods')->where('id',$value)->first()->title;
    }
    public function getCouponidAttribute($value){
       if($value != 0){
            return '-'.DB::table('coupon')->where('id',$value)->first()->money;
       }else{
            return '无';
       }
    }
    public function getDiscountAttribute($value){
       if($value != 0){
            return '-'.DB::table('discount_active')->where('id',$value)->first()->discount_amount;
       }else{
            return '无';
       }
    }
    public function getInsuranceAttribute($value){
       if($value != 0){
            return '-'.DB::table('insurance')->where('id',$value)->first()->money;
       }else{
            return '无';
       }
    }
    public function getOrderchangetimeAttribute($value){
        
        return date('Y-m-d H:i',$value);
    }
    
    public function getOrderstatusAttribute($value){
        $status = ['待处理','支付中','支付成功','支付取消','申请退款','已退款','正在游玩','出游归来','出游归来!'];
        return $status[$value];
    }
}
