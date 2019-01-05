<?php

namespace App\Models;
use DB;
use Illuminate\Database\Eloquent\Model;

class Servicenews extends Model
{
    protected $table = "char";
   
    public function getUseridAttribute($value){
        return DB::table('user')->where('id','=',$value)->first()->username;

    }
    public function getServiceidAttribute($value){
        return DB::table('admin')->where('id','=',$value)->first()->name;

    }
}
