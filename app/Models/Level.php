<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;
class Level extends Model
{
    protected $table = "admin_level";

    public function getUseridAttribute($value){
       $name = \DB::table('admin')->find($value);
       return $name->name;
    }
    
}
