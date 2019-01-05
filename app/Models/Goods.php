<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Goods extends Model
{
    //
    protected $table = 'goods';
    public $timestamps = false;
    protected $fillable = ['title','price','cate_id','admin_id','pic','sales_volume','status','brand','receptionist'];

    public function getBrandAttribute($value){
    	if ($value == 0) {
    		return 0;
    	}
    	$brandName = \DB::table('goods_label')->select('name')->where('id',$value)->where('type',2)->first()->name;
    	return $brandName;
    }


    public function getReceptionistAttribute($value){
        if ($value == 0) {
            return 0;
        }
        $receptionistName = \DB::table('goods_label')->select('name')->where('id',$value)->where('type',1)->first()->name;
        return $receptionistName;
    }
}
