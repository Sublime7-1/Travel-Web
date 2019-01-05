<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    protected $table = "links";
    public function getAreaAttribute($value){
        $area=["境内","境外"];
        return $area[$value];
    }
    public function getStatusAttribute($value){
        $status=["未通过","通过"];
        return $status[$value];
    }
    public function getApplytimeAttribute($value){
        return date('Y-m-d H:i:s',$value);
    }

}
