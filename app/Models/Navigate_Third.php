<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Navigate_Third extends Model
{
    //
    protected $table = 'navigate_third';
    public $timestamp = false;
    protected $fillable = ['name','pid','path'];


    public function getPidAttribute($value){
    	$name = self::where('id',$value)->first()->name;
    	return $name;
    }
}
