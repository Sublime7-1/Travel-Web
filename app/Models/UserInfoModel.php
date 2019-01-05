<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserInfoModel extends Model
{
    protected $table = "userinfo";
    public $timestamps=false;
    protected $fillable=['id','nickname','realname','phone','birth','sex','email','address','marriage','job','degree','pic','team','tel','uid'];
    protected $primaryKey='id';
    public function getDegreeAttribute($value){
        $degree = [0=>'未选择',1=>'博士及以上',2=>'硕士',3=>'本科',4=>'大专',5=>'大专及以下'];
        return $degree[$value];
    }
    public function getJobAttribute($value){
        $job = ['未选择','白领/一般职员','公务员/事业单位','工业服务业人员','自由职业/个体户/私营业主','无业/失业/下岗','退休','学生'];
        return $job[$value];
    }
    public function getMarriageAttribute($value){
        $marriage = ['未选择','未婚','已婚'];
        return $marriage[$value];
    }
    public function getSexAttribute($value){
        $sex = ['女','男','保密'];
        return $sex[$value];
    }
}
