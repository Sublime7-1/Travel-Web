<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
// 账户管理类
class Accounts extends Model
{
    protected $table = "accounts";
    public function getStatusAttribute($value){
        $status=["启用","停用"];
        return $status[$value];
    }
    public function getPaytimeAttribute($value){
        return date('Y-m-d H:i:s',$value);
    }
    public function getPaytotalAttribute($value){
        return number_format($value,2,'.',',');
    }
    public function getPaymoneyAttribute($value){
        return number_format($value,2,'.',',');
    }

    // 关联用户表
    public function relation()
    {
        return $this->hasOne('App\Models\User','id','uid');
    }

}
