<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\GoodsTravel;

class GoodsTravelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $begin_time = GoodsTravel::orderby('goods_id','asc')->paginate(10);
        $begin_id = GoodsTravel::select('goods_id')->orderby('goods_id','asc')->get();

        if($begin_id->count()){
            $begin_id = $begin_id->toArray();
        }

        $content = DB::table('travel_info_content')->get();
        $count = DB::table('travel_info_content')->count();

        if($content->count()){
            $content = $content->toArray();

        }
        return view('admin.goodstravel.index',['begin_time'=>$begin_time,'content'=>$content,'count'=>$count,'begin_id'=>$begin_id]);
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
        $arr = $request->except(['_token']);
        foreach($arr['begin_time'] as $k=>$v){
            $end_time = $arr['end_time'][$k];
            $percent = $arr['percent'][$k];
            $num = $arr['num'][$k];
            $status = $arr['status'][$k];
            DB::table('travel_info_time')->insert(['goods_id'=>$arr['goods_id'],'begin_time'=>$v,'end_time'=>$end_time,'percent'=>$percent,'num'=>$num,'status'=>$status]);
        }
        foreach($arr['content'] as $k=>$v){
            
            DB::table('travel_info_content')->insert(['goods_id'=>$arr['goods_id'],'content'=>$v]);
        }
        $res = DB::table('travel_info')->insert(['goods_id'=>$arr['goods_id']]);
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
        $arr = $request->except(['_token','_method']);

        //删除原来的内容
        DB::table('travel_info_time')->where('goods_id',$id)->delete();
        DB::table('travel_info_content')->where('goods_id',$id)->delete();
        DB::table('travel_info')->where('goods_id',$id)->delete();

        foreach($arr['begin_time'] as $k=>$v){
            $end_time = $arr['end_time'][$k];
            $percent = $arr['percent'][$k];
            $num = $arr['num'][$k];
            $status = $arr['status'][$k];
            DB::table('travel_info_time')->insert(['goods_id'=>$arr['goods_id'],'begin_time'=>$v,'end_time'=>$end_time,'percent'=>$percent,'num'=>$num,'status'=>$status]);
        }
        foreach($arr['content'] as $k=>$v){
            
            DB::table('travel_info_content')->insert(['goods_id'=>$arr['goods_id'],'content'=>$v]);
        }
        $res = DB::table('travel_info')->insert(['goods_id'=>$arr['goods_id']]);
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
        $res = DB::table('travel_info_time')->where('goods_id',$id)->get()->count();
        $res1 = DB::table('travel_info_content')->where('goods_id',$id)->get()->count();
        $num = [ '一', '二', '三', '四', '五', '六', '七', '八', '九','十'];
        // 加载修改页面
        if($res && $res1){
            $goods_name = DB::table('goods')->where('id','=',$id)->first()->title;
            $goods_time = DB::table('travel_info_time')->where('goods_id','=',$id)->get();
            $goods_content = DB::table('travel_info_content')->where('goods_id','=',$id)->get();
            foreach($goods_content as $v){
                $goods_content1[] = $v->content;
            }
            return view('admin.goodstravel.edit',['goods_id'=>$id,'goods_name'=>$goods_name,'goods_time'=>$goods_time,'goods_content'=>$goods_content1,'num'=>$num]);

        }else{
        // 加载添加页面
            
            $goods_name = DB::table('goods')->where('id','=',$id)->first()->title;
            return view('admin.goodstravel.add',['goods_id'=>$id,'goods_name'=>$goods_name]);
        }
        
    }
}
