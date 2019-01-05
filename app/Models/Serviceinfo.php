<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Serviceinfo extends Model
{
    protected $table = "servicesend";
    public function getStatusAttribute($value){
        $status=["未审核","已通过"];
        return $status[$value];
    }
    public function getLevelAttribute($value){
        $status=["普通客服","区域客服"];
        return $status[$value];
    }
    
    public function getCreatetimeAttribute($value){
        
        return date('Y-m-d H:i',$value);
    }
    public function getUser_idAttribute($value){
        $res =  DB::table('user')->where('id','=',$value)->first();
        return $res->username;

    }
}
