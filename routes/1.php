<?php

class abc{
    public function Arr(){
        $data = $this->zilei(0);
    }

    public function zilei($pid){
        $arr = DB::table('type')->where('pid','=',$pid)->get();

        foreach($arr as $v){
            $v['son']=zilei($v->pid);
        }

        return $arr;
    }
}