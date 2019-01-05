<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class GoodsTravel extends Model
{
    //
    protected $table = 'travel_info_time';
    public $timestamps = false;
  

    // 获取显示隐藏按钮
    public function getGoodsidAttribute($value){
    	$name = DB::table('goods')->where('id',$value)->first()->title;
    	return $name;
    }

    // 获取类型
    public function getStatusAttribute($value){
        $name = ['售卖','不售卖'];
        return $name[$value];
    }

}
