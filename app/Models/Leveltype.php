<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class Leveltype extends Model
{
    protected $table = "level_type";
    public function getPidAttribute($value){
        $type = \DB::table('level_types')->get();
        if($type->id == $value){}
        return $type->typename;
    }
}
