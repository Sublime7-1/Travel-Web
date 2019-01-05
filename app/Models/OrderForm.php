<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use DB;

class OrderForm extends Model
{
    protected $table = "order_form";
    public function getCardnumAttribute($value){
        
        $p = $value;
        $preg = '/(\d{3})\d{0,4}(\d{4})/'; 
        $phone = preg_replace($preg,'\1****\2',$p);
        return $phone;
    }
    public function getPhoneAttribute($value){
        
        $p = $value;
        $preg = '/(\d{3})\d{0,4}(\d{4})/'; 
        $phone = preg_replace($preg,'\1****\2',$p);
        return $phone;
    }
    
    public function getSexAttribute($value){
        $status = ['女','男'];
        return $status[$value];
    }
}
