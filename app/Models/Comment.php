<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $table = "comment";
    public function getColligategradeAttribute($value){
        $status=["不满意","一般","满意"];
        return $status[$value];
    }
    public function getDiscountgradeAttribute($value){
        $status=["不满意","一般","满意"];
        return $status[$value];
    }
    public function getServicegradeAttribute($value){
        $status=["不满意","一般","满意"];
        return $status[$value];
    }
    public function getExperiencegradeAttribute($value){
        $status=["不满意","一般","满意"];
        return $status[$value];
    }
    public function getStatusAttribute($value){
        $status=["未回复","已查看","已回复"];
        return $status[$value];
    }
    public function getAnonymousAttribute($value){
        $status=["是","否"];
        return $status[$value];
    }
    public function getTimeAttribute($value){
        return date('Y-m-d H:i:s',$value);
    }

}
