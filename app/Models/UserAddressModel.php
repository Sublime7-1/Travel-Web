<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserAddressModel extends Model
{
    protected $table = "useraddress";
    public $timestamps=false;
    protected $fillable=['id','receiver','phone','city','uid'];
   
}
