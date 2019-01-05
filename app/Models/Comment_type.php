<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment_type extends Model
{
    protected $table = "comment_type";
    public function getStatusAttribute($value){
        $status=["启用","停用"];
        return $status[$value];
    }
}
