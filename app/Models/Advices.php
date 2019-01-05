<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Advices extends Model
{
    protected $table = "advices";
    public function getStatusAttribute($value){
        $status=["未读","已读","已回复"];
        return $status[$value];
    }
}
