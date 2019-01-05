<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;


class DiscountActive extends Model
{
    //
    protected $table = 'discount_active';
    public $timestamps = false;
    protected $fillable = ['name','admin_id','goods_id','content','discount_amount','begin_time','end_time'];


    public function getGoodsIdAttribute($value){
        $goods_title = \DB::table('goods')->select('title')->where('id',$value)->first()->title;
        return $goods_title;
    }

    public function getBeginTimeAttribute($value){
    	return date('Y-m-d',$value);
    }

    public function getEndTimeAttribute($value){
    	return date('Y-m-d',$value);
    }
}
