<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CollectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 查找当前用户收藏的商品
        $uid = session('userid');
        $collection = \DB::table('goods_collection')->where('uid',$uid)->paginate(5);

        if(count($collection)>0){
            foreach($collection as $v){
                $goods = \DB::table('goods')->where('id',$v->gid)->first();
                // 查询出发地 根据id 升序排序 第一条为出发地
                $begin_city = \DB::table('goods_city')->where('goods_id',$v->gid)->orderBy('id','asc')->pluck('begin_city')[0];
                $goods->begin_city = $begin_city;
                $goods->collect_id = $v->id;
                $goods_arr[] = $goods;
            }
        }else{
            $goods_arr = array();
        }
        // dd($goods_arr);
        return view('home.collect.index',['goods'=>$goods_arr,'collection'=>$collection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        echo 12;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        echo 123;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        echo 1234;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        echo 12345;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        echo 123456;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $id = explode(',', $id);
        foreach($id as $id_v){
            $res = \DB::table('goods_collection')->where('id',$id_v)->delete();      
        }
        if($res){
            echo 1;
        }else{
            echo 0;
        }
    }
}
