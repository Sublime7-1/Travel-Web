<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Servicelist extends Model
{
    protected $table = "servicelist";
    public function getStatusAttribute($value){
        $status=["未审核","已通过"];
        return $status[$value];
    }
    public function getLevelAttribute($value){
        $status=["普通客服","区域客服"];
        return $status[$value];
    }
    
    public function getTimeAttribute($value){
        
        return date('Y-m-d H:i:s',$value);
    }
    public function getUseridAttribute($value){
        $res =  DB::table('user')->where('id','=',$value)->first();
        if($res != null){
            return $res->username;
        }
        return $value;

    }
}
