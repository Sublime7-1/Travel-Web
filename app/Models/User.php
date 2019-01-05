<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $table = "user";
    public function getDisplayAttribute($value){
        $display=["已开启","已停用"];
        return $display[$value];
    }
    public function getStatusAttribute($value){
        $status=["银牌用户","金牌用户","vip用户","超级vip"];
        return $status[$value];
    }
    public function getTimeAttribute($value){
        
        return date('Y-m-d H:i',$value);
    }
    
    public function getSexAttribute($value){
        $sex = ['女','男','保密'];
        return $sex[$value];
    }
    public function userinfo(){
        return $this->hasOne('App\Models\UserInfoModel','uid');
    }
    public function useraddress(){
        return $this->hasMany('App\Models\UserAddressModel','uid');
    }
    
    
   


}
