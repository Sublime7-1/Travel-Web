<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advicestype extends Model
{
    protected $table = "advicestype";
    public function getStatusAttribute($value){
        $status=["启用","停用"];
        return $status[$value];
    }

}
