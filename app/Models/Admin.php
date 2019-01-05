<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    protected $table = "admin";
    public function getDisplayAttribute($value){
        $display=["已开启","已停用"];
        return $display[$value];
    }
    public function getStatusAttribute($value){
        $status=["客服管理员","栏目管理员","普通管理员","超级管理员"];
        return $status[$value];
    }
    public function getTimeAttribute($value){
        
        return date('Y-m-d H:i',$value);
    }
    public function getLasttimeAttribute($value){
        
        return date('Y-m-d H:i:s',$value);
    }
    public function getSexAttribute($value){
        $sex = ['保密','男','女'];
        return $sex[$value];
    }
}
