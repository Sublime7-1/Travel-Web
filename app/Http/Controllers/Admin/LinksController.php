<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Links; 
class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // 获取关键字
        $name = $request->input('name');
        // 获取数据
        $data = Links::where('name','like',"%{$name}%")->get();
        // 统计
        $total = Links::count();
        // 加载模板
        return view('admin.links.index',['data'=>$data,'total'=>$total,'request'=>$request]);
    }
    // 友情链接状态
    public function status(Request $request){
        // 获取修改的id
        $id = $request->input('id');
        // 获取要修改的值
        $data['status'] = $request->input('status');
        // 执行
        if(DB::table('links')->where("id","=",$id)->update($data)){
            return 1;
        }else{
            return 0;
        }
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
        $info = DB::table('links')->where("id","=",$id)->first();
        if(DB::table('links')->where("id","=",$id)->delete()){
            if(file_exists('.'.$info->show_img)){
                unlink('.'.$info->show_img);                   
            }
            if(file_exists('.'.$info->brand_img)){
                unlink('.'.$info->brand_img);                   
            }           
            echo 1;
        }else{
            echo 0;
        }
    }
}
