<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advert extends Model
{
    protected $table = "adverts";
    public function getAreaAttribute($value){
        $area=["轮播区域","头部区域","内容区域","尾部区域",'商品区域','友情区域'];
        return $area[$value];
    }
    public function getStatusAttribute($value){
        $status=["显示","隐藏"];
        return $status[$value];
    }
    public function getAddtimeAttribute($value){
        return date('Y-m-d H:i:s',$value);
    }
    public function getUptimeAttribute($value){
        
        return date('Y-m-d H:i:s',$value);
    }

}
