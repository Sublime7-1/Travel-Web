<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigate_Second extends Model
{
    //
    protected $table = 'navigate_second';
    public $timestamps = false;
    protected $fillable = ['name','level','click_time','is_host','pic','is_chinese','is_popular_game'];

    public function getIsChineseAttribute($value){
    	$isChinese = array(1=>'国内',2=>'国外',3=>'其他');
    	return $isChinese[$value];
    }

    public function getIsPopularGameAttribute($value){
    	$isPopularGame = array('否','热门玩法');
    	return $isPopularGame[$value];
    }

     // 修改器 修改状态显示为一个按钮
    public function getIsDisplayAttribute($value){
        $is_display = [2=>'<a href="javascript:;" onclick="changeStatus(this)" status-val="2" class="btn btn-warning">隐藏</a>',1=>'<a href="javascript:;" onclick="changeStatus(this)" status-val="1" class="btn btn-success">显示</a>'];
        return $is_display[$value];
    }
}
