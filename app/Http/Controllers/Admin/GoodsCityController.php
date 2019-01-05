<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\GoodsCity;

class GoodsCityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $goods_city = GoodsCity::orderby('goods_id','asc')->paginate(10);
       
        $city_id = GoodsCity::select('goods_id')->orderby('goods_id','asc')->get();
         $count = $city_id->count();
        if($city_id->count()){
            $city_id = $city_id->toArray();
        }

        return view('admin.goodscity.index',['goods_city'=>$goods_city,'city_id'=>$city_id,'count'=>$count]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.goodstravel.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = $request->except(['_token','goods_id']);
        $goods_id = $request->input('goods_id');
        
      
       foreach($arr['city_name'] as $k=>$v){
            $city_name = $arr['city_name'][$k];
            $englishname  = $arr['englishname'][$k];
            $begin_fei  = $arr['begin_fei'][$k];
            $end_fei  = $arr['end_fei'][$k];
            $begin_fei_time   = $arr['begin_fei_time'][$k];
            $begin_city  = $arr['begin_city'][$k];
            $end_city  = $arr['end_city'][$k];  
            $end_city_time  = $arr['end_city_time'][$k];
            $begin_city_time  = $arr['begin_city_time'][$k];
            $type  = $arr['type'][$k];
            
            $res = DB::table('goods_city')->insert(['goods_id'=>$goods_id,'city_name'=>$city_name,'englishname'=>$englishname,'begin_fei'=>$begin_fei,'end_fei'=>$end_fei,'begin_fei_time'=>$begin_fei_time,'begin_city_time'=>$begin_city_time,'begin_city'=>$begin_city,'end_city_time'=>$end_city_time,'type'=>$type,'end_city'=>$end_city]);
       }
        
        if($res){
            $request->session()->flash('goods_msg','添加成功');
            return redirect('/admin/Goods')->with('tips_code','6');
        }else{
            return back()->withErrors(['添加失败']);
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        echo 1;
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
        $arr = $request->except(['_token','goods_id','_method']);
        $goods_id = $request->input('goods_id');
        //删除原来的内容
        DB::table('goods_city')->where('goods_id',$id)->delete();
      
       foreach($arr['city_name'] as $k=>$v){
            $city_name = $arr['city_name'][$k];
            $englishname  = $arr['englishname'][$k];
            $begin_fei  = $arr['begin_fei'][$k];
            $end_fei  = $arr['end_fei'][$k];
            $begin_fei_time   = $arr['begin_fei_time'][$k];
            $begin_city  = $arr['begin_city'][$k];
            $end_city  = $arr['end_city'][$k];  
            $end_city_time  = $arr['end_city_time'][$k];
            $begin_city_time  = $arr['begin_city_time'][$k];
            $type  = $arr['type'][$k];
            
            $res = DB::table('goods_city')->insert(['goods_id'=>$goods_id,'city_name'=>$city_name,'englishname'=>$englishname,'begin_fei'=>$begin_fei,'end_fei'=>$end_fei,'begin_fei_time'=>$begin_fei_time,'begin_city_time'=>$begin_city_time,'begin_city'=>$begin_city,'end_city_time'=>$end_city_time,'type'=>$type,'end_city'=>$end_city]);
       }
        
      
        if($res){
            $request->session()->flash('goods_msg','修改成功');
            return redirect('/admin/Goods')->with('tips_code','6');
        }else{
            return back()->withErrors(['添加失败']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    //传输id
    public function index_id($id){
        $res = DB::table('goods_city')->where('goods_id',$id)->get()->count();
        
        // 加载修改页面
        if($res){
            $goods_name = DB::table('goods')->where('id','=',$id)->first()->title;
            $goods_city = DB::table('goods_city')->orderby('id','asc')->where('goods_id','=',$id)->get();
            return view('admin.goodscity.edit',['goods_id'=>$id,'goods_name'=>$goods_name,'goods_city'=>$goods_city]);

        }else{
        // 加载添加页面
            
            $goods_name = DB::table('goods')->where('id','=',$id)->first()->title;
            return view('admin.goodscity.add',['goods_id'=>$id,'goods_name'=>$goods_name]);
        }
        
    }
}
