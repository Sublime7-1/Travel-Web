<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class GoodsCity extends Model
{
    //
    protected $table = 'goods_city';
    public $timestamps = false;
  

    // 获取显示隐藏按钮
    public function getGoodsidAttribute($value){
    	$name = DB::table('goods')->where('id',$value)->first()->title;
    	return $name;
    }

    // 获取类型
    public function getTypeAttribute($value){
        $name = ['头等舱','商务舱','经济舱'];
        return $name[$value];
    }

}
