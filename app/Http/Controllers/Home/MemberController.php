<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// 会员中心首页
class MemberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取当前用户优惠券可用数量
        $coupon_total = DB::table('coupon_receive')->where('uid',"=",session('userid'))->where("status","=",0)->count();
        // 获取当前用户的信息
        $userinfo = DB::table('user')->join("userinfo","user.id","=","userinfo.uid")->select('username','nickname','realname','pic')->where("user.id","=",session('userid'))->first();
        // 获取用户所有的代办订单信息(order_status in (0,1,4))
        $agentorder = DB::table('home_order')->where("user_id","=",session('userid'))->whereIn("order_status",['0','1','4','7'])->get();
        // dd($agentorder);
        if(count($agentorder)){
            foreach($agentorder as $k=>$v){
                $agentorder[$k]->gname = DB::table('goods')->where("id","=",$v->goods_id)->first()->title;
                $agentorder[$k]->pic = DB::table('goods')->where("id","=",$v->goods_id)->first()->pic;                
                $agentorder[$k]->order_change_time = date('Y-m-d',$v->order_change_time);
            }
        }
        // 获取该用户收藏的商品
        $collection = DB::table('goods_collection')->where("uid","=",session('userid'))->get();
            // 判断是否收藏了
            if(count($collection)){
                // 遍历
                foreach($collection as $k=>$v){
                    // 获得商品信息
                    $goodsinfo = DB::table('goods')->where("id","=",$v->gid)->first();
                    // 获取商品名
                    $collection[$k]->gname = $goodsinfo->title;
                    // 商品图
                    $collection[$k]->pic = $goodsinfo->pic;
                    // 商品价格
                    $collection[$k]->price = $goodsinfo->price;
                }
            }
        // dd($collection);
        return view('home.member.index',['coupon_total'=>$coupon_total,'userinfo'=>$userinfo,'agentorder'=>$agentorder,'collection'=>$collection]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
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
}
