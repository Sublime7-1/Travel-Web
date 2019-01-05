<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// 优惠劵类
class CoupontypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keyword = $request->input('name');
        // dd($keyword);
        $data = DB::table('coupontype')->select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like',"%{$keyword}%")->orderBy('paths')->get();
        $num = $data->count();
        return view('admin.coupontype.index',['data'=>$data,'num'=>$num,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.coupontype.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // 获取数据
        $data = $request->except('_token');
        $data['pid'] = $data['path'] = 0;
        // dd($data);
        if(DB::table('coupontype')->insert($data)){
             // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','添加成功');
          // layer提示成功的样式码
          $request->session()->flash('tips_code','6');
          // 刷新父窗口页面
          echo '<script>window.parent.location.reload();</script>';
        }else{
            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','添加失败');
          // layer提示失败的样式码
          $request->session()->flash('tips_code','5');
          echo '<script>window.parent.location.reload();</script>';
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
        $data = DB::table('coupontype')->where('id','=',$id)->first();
        return view('admin.coupontype.edit',['data'=>$data]);
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
        $data = $request->except('_token','_method');
        $res = DB::table('coupontype')->where('id','=',$id)->update($data);
        if ($res) {
            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','修改成功');
          // layer提示成功的样式码
          $request->session()->flash('tips_code','6');
          // 刷新父窗口页面
          echo '<script>window.parent.location.reload();</script>';
        }else{
            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','修改失败');
          // layer提示失败的样式码
          $request->session()->flash('tips_code','5');
          echo '<script>window.parent.location.reload();</script>';
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
        // 查询是否有子类
        $data = DB::table('coupon')->where('pid','=',$id)->first();
        if (count($data)>0) {
            // 有子类不能删除
            echo 2;
        }else{
            $res = DB::table('coupontype')->where('id','=',$id)->delete();
            if ($res) {
                echo 1;
            }else{
                echo 0;
            }
        }
    }
}
