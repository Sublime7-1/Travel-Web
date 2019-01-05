<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class P_Data extends Model
{
	protected $table = 'userinfo';
    public function getSexAttribute($value)
    {
        $sex = ['女','男','保密'];
        return $sex[$value];
    }
    public function getMarriageAttribute($value)
    {
        $marriage = ['未设置','未婚','已婚'];
        return $marriage[$value];
    }

    public function getJobAttribute($value)
    {
        $job = ['未设置','白领/一般职员','公务员/事业单位','工业/服务业人员','自由职业/个体户/私营业主','无业/失业/下岗','退休','学生','其他'];
        return $job[$value];
    }

    public function getDegreeAttribute($value)
    {
        $degree = ['未设置','博士及以上','硕士','本科','大专','大专及以下'];
        return $degree[$value];
    }

    public function getBirthAttribute($value)
    {
        if($value != ''){
            return date('Y-m-d',$value);        
        }else{
            return $value;
        }
    }

}
