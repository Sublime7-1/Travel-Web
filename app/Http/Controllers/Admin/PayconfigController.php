<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// 支付配置类
class PayconfigController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    
    public function index()
    {

        // $data = DB::select('select * from pay');
        $data = DB::select('select flag,count(*) as num from pay group by flag');
        // dd($data);

        foreach($data as $k=>$v){
            $info = DB::table('pay')->where('flag','=',$v->flag)->where('status','=',0)->get();
            if($info->first()){
                $data[$k]->status = 0;
            }else{
                $data[$k]->status = 1;
            }
        }
        // dd($data);
        return view('admin.pay.payconfig',['data'=>$data]);
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
     * @param  int  $flag
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $flag)
    {
        // 获取要修改的数据
        $data['status'] = $request->input('status');
        // 执行
        if(DB::table('pay')->where("flag","=",$flag)->update($data)){
            echo 1;
        }else{
            echo 0;
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

    // 支付配置删除
    public function del(Request $requesrt)
    {
        // 要删的id
        $flag=$requesrt->input('flag');
        // 执行
        if(DB::table('pay')->where("flag","=",$flag)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }
}
