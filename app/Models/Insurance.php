<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Insurance extends Model
{
    //
    protected $table = 'insurance';
    public $timestamps = false;
    protected $fillable = ['name','money','type'];


    public function getTypeAttribute($value){
    	$type = [1=>'意外险',2=>'取消险'];
    	return $type[$value];
    }

}
