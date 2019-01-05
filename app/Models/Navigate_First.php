<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigate_First extends Model
{
    //
    protected $table = "navigate_first";
    public $timestamps = false;
    protected $fillable = ['name','path','is_display','level','pid'];

    // 修改器 修改状态显示为一个按钮
    public function getIsDisplayAttribute($value){
    	$is_display = [1=>'<a href="javascript:;" onclick="changeStatus(this)" status-val="1" class="btn btn-success">显示</a>',2=>'<a href="javascript:;" onclick="changeStatus(this)" status-val="2" class="btn btn-warning">隐藏</a>'];
    	return $is_display[$value];
    }

    

}
