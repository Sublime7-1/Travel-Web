<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\DiscountActiveRequest;
use App\Models\DiscountActive;

class DiscountActiveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if ($request->has('title')) {
            // 商品表查询商品获取id集合
            $ids = DB::table('goods')->select('id')->where('title','like','%'.$request->input('title').'%')->get();
            if (count($ids) > 0) {
                foreach($ids as $v){
                    $idss[] = $v->id;
                }
            }else{
                $idss = array();
            }

            // 到优惠活动表查询
            $data = DiscountActive::where('admin_id',session('AdminUserInfo.id'))->whereIn('goods_id',$idss)->paginate(2);
            // 查询数据数
            $num = DiscountActive::where('admin_id',session('AdminUserInfo.id'))->whereIn('goods_id',$idss)->get()->count();
        }else{
            // 查询当前管理员添加的所有优惠活动
            $data = DiscountActive::where('admin_id',session('AdminUserInfo.id'))->paginate(2);
            $num = DB::table('discount_active')->where('admin_id',session('AdminUserInfo.id'))->get()->count();        
        }
       
        return view('admin.discount_active.index',['data'=>$data,'request'=>$request,'num'=>$num]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取当前登录管理员添加的商品
        $goods = DB::table('goods')->select('id','title')->where('admin_id',session('AdminUserInfo.id'))->get();
        return view('admin.discount_active.add',['goods'=>$goods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DiscountActiveRequest $request)
    {
        //
        $data = $request->except('_token');
        // 将日期转换成时间戳
        $data['begin_time'] = strtotime($data['begin_time']);
        $data['end_time'] = strtotime($data['end_time']);
        
        $res = DB::table('discount_active')->insert($data);
        if ($res) {
            return redirect('/admin/discountActive')->with('success','添加成功');
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
        $data = DB::table('discount_active')->where('id',$id)->first();
        $goods = DB::table('goods')->select('id','title')->where('admin_id',session('AdminUserInfo.id'))->get();

        return view('admin.discount_active.edit',['data'=>$data,'goods'=>$goods]);
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
        $data = $request->except('_token','_method');
        $data['begin_time'] = strtotime($data['begin_time']);
        $data['end_time'] = strtotime($data['end_time']);
         $res = DB::table('discount_active')->where('id',$id)->update($data);
        if ($res) {
            return redirect('/admin/discountActive')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
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
        $res = DB::table('discount_active')->where('id',$id)->delete();
        if ($res) {
            echo 1;
        }else{
            echo 0;
        }
    }
}
