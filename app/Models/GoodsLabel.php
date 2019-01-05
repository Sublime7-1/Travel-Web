<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GoodsLabel extends Model
{
    //
    protected $table = 'goods_label';
    public $timestamps = false;
    protected $fillable = ['name','is_display'];

    // 获取显示隐藏按钮
    public function getIsDisplayAttribute($value){
    	$is_display = [1=>'<a href="javascript:;" onclick="changeStatus(this)" status-val="1" class="btn btn-success">显示</a>',2=>'<a href="javascript:;" onclick="changeStatus(this)" status-val="2" class="btn btn-warning">隐藏</a>'];
    	return $is_display[$value];
    }

    // 获取类型
    public function getTypeAttribute($value){
    	$type = ['1'=>'接待商','2'=>'品牌','3'=>'商品标签','4'=>'景点'];
    	return $type[$value];
    }

}
