<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
 	protected $table = 'message';
 	public function getSendtimeAttribute($value){
 		return date('Y-m-d H:i:s',$value);
 	}
 	public function getUptimeAttribute($value){
 		return date('Y-m-d H:i:s',$value);
 	}     
}
