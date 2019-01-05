<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Links_contacts extends Model
{
    protected $table = "links_contacts";
    public function getBusinessAttribute($value){
        $area=["国内业务","境外业务"];
        return $area[$value];
    }
}
