<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class System_log extends Model
{
    protected $table = "system_log";
 
    public function getAdminidAttribute($value){
        $user = \DB::table('admin')->where('id','=',$value)->get();
        
        return $user[0]->name;
    }
   
    public function getAdminlevelAttribute($value){
        $status=["栏目管理员","栏目编辑","普通管理员","超级管理员"];
        return $status[$value];
    }
}
