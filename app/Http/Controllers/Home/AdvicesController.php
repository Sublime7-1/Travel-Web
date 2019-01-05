<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// 反馈建议类
class AdvicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 反馈建议页面
    public function index()
    {
        // 获取反馈类型
        $type = DB::table('advicestype')->get();
        return view('home.advices.index',['type'=>$type]);
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
        // dd($request->all());
        $data = $request->except(['_token']);
        // 判断是否有图片
        if($request->hasFile('img')){
             // 获取后缀名
            $suffix = $request->file('img')->getClientOriginalExtension();
            // 随机文件名
            $imgName = md5(time().mt_rand(1000,9999));
            // 拼接文件
            $img = $imgName.'.'.$suffix;
            // 上传文件到uploads目录
            $request->file('img')->move('./uploads/'.date('Y-m-d').'/',$img);
            // 保存到要添加进数据库的数组中
            $data['img'] = '/uploads/'.date('Y-m-d').'/'.$img;
        }else{
            $data['img'] = '';
        }
        // 执行
        if(DB::table('advices')->insert($data)){
            return redirect('/home/advices')->with('success','反馈成功');
        }else{
            return redirect('/home/advices')->with('error','反馈失败');
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
