<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Couponinsert;
use DB;
// 优惠劵添加类
class CouponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 商品分类   
    public function index(Request $request)
    {   
        $pid = $request->input('pid');
        if($pid == null){
            $pid = 0;
        }

        $data = DB::table('goods_label')->where("pid","=",$pid)->where("is_display","=",1)->get();
        return $data;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 添加页面
    public function create()
    {
        // 商品信息
        $info = DB::table('goods')->where("status","=",1)->get();
        // 当前登录的管理员信息 
        $admininfo = DB::table('admin')->where("id","=",session('AdminUserInfo.id'))->first();
        // 分类信息
        $data = DB::table('coupontype')->get();
        return view('admin.coupon.add',['admininfo'=>$admininfo,'data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 执行添加
    public function store(Couponinsert $request)
    {
        // dd($request->all());
        // 获取需要的数据
        $data = $request->except(['_token']);
        // 获取父类id
        $pid = $request->input('pid');
        // 获取路径
        $data['path'] = DB::table('coupontype')->where("id","=",$pid)->first()->path.','.$pid;
        // 判断
        if(DB::table('coupon')->insert($data)){
            return redirect('/admin/coupon/indexs')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 商品
    public function show($id)
    {
        $gids = DB::table('goods_links')->where('cid','=',$id)->get();
        foreach($gids as $k => $v){
            $data[] = DB::table('goods')->where('id','=',$v->gid)->first();
        }
        return $data;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改优惠券
    public function edit($id)
    {
        // 优惠券数据
        $data = DB::table('coupon')->where("id","=",$id)->first();
        // 获取商品名
        $data->gname = DB::table('goods')->where('id','=',$data->gid)->first()->title;
        // dd($data);
        // 分类信息
        $cate = DB::table('coupontype')->get();
        // 当前登录的管理员信息 
        $admininfo = DB::table('admin')->where("id","=",session('AdminUserInfo.id'))->first();
        // 加载
        return view('admin.coupon.edit',['admininfo'=>$admininfo,'data'=>$data,'cate'=>$cate]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Couponinsert $request, $id)
    {
        // dd($request->all());
        // 获取需要的数据
        $data = $request->except(['_token','_method']);
        // 获取父类id
        $pid = $request->input('pid');
        // 获取路径
        $data['path'] = DB::table('coupontype')->where("id","=",$pid)->first()->path.','.$pid;
        // dd($data);
        // 执行
        if(DB::table('coupon')->where('id','=',$id)->update($data)){
            return redirect('/admin/coupon/indexs')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        if(DB::table('coupon')->where('id','=',$id)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    // 显示优惠券首页
    public function indexs(Request $request){
        // 关键字
        $keyword = $request->input('money');
        // 优惠劵信息
        $data = DB::table('coupon')->where('status','=',0)->where('aid','=',session('AdminUserInfo.id'))->where('money','like',"%{$keyword}%")->get();
        // 统计
        $total = DB::table('coupon')->where('status','=',0)->where('aid','=',session('AdminUserInfo.id'))->count();
        // dd($data);
        // 遍历
        foreach($data as $k=>$v){
            // 当前登录的管理员信息 
            $data[$k]->aname = DB::table('admin')->where("id","=",$v->aid)->first()->name;
            // 商品信息
            $data[$k]->gname = DB::table('goods')->where("id","=",$v->gid)->first()->title; 
        }
        // dd($data);
        return view('admin.coupon.index',['data'=>$data,'total'=>$total,'request'=>$request]);
    }
}
