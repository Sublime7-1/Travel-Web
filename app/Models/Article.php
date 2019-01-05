<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
	protected $table = 'article';
	public function getStatusAttribute($value){
        $status=["已发布","未发布"];
        return $status[$value];
    }
    public function getAddtimeAttribute($value){
        return date('Y-m-d H:i:s',$value);
    }
    public function getUptimeAttribute($value){
        return date('Y-m-d H:i:s',$value);
    }
}
