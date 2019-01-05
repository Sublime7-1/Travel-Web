<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class LeveltypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      
       $type = \DB::table('level_types')->orderby('id','asc')->where('pid',0)->paginate(8);
        return view('admin.leveltype.index',['type'=>$type,'pid'=>0]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

        if(empty($request->input('pid'))){
            $pid = 0;
            $path = '0,';
        }else{
            $pid = $request->input('pid');
            //子分类path由 父类的path+父类的id+,
            $typeinfo = \DB::table('level_types')->find('id',$pid);

            $path = $typeinfo['path'].$typeinfo['id'].',';  
        }
        return view('admin.leveltype.add',['pid'=>$pid,'path'=>$path]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $arr = $request->except('_token');
        $path = $arr['path'];
        $path1 = rtrim($path,',');
        $path = explode(',',$path1);
        $level = count($path);
        $arr['level'] = $level;
        $res = \DB::table('level_types')->insert($arr);
        if($res){
            echo "<script>window.parent.location.reload();</script>";
        }else{
            echo "添加失败";
        }
        //刷新页面
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
        $type = \DB::table('level_types')->find($id);
        return view('admin.leveltype.edit',['type'=>$type]);
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
        $arr= $request->except(['_method','_token']);
        $id = $arr['id'];
        unset($arr['id']);
        $res = \DB::table('level_types')->where('id',$id)->update($arr);
        if($res){
            echo "<script>window.parent.location.reload();</script>";
        }else{
            echo "<h1>修改失败</h1>";
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
        $result = \DB::table('level_types')->where('pid',$id)->get();
        // 有子分类不能删除
        if($result->count()){
            return [2,'error'=>'含有子标签'];
        }
        if(\DB::table('level_types')->delete($id)){
            echo 1;
        }else{
            return [2,'error'=>'删除失败'];
        }
    }
    // 个人信息
    public function mem_add(Request $request){
       
        $pid = $request->route('pid');
        // 子分类path由 父类的path+父类的id+,
        $typeinfo = \DB::table('level_types')->find($pid);
        $path = $typeinfo->path.$typeinfo->id.',';  
        
        return view('admin.leveltype.mem_add',['pid'=>$pid,'path'=>$path]);
    }
    public function check(Request $request){
        $pid = $request->route('pid');
       $type = \DB::table('level_types')->orderby('id','asc')->where('pid',$pid)->paginate(8);
       if($pid !=0){
            $pid = \DB::table('level_types')->where('id',$pid)->first()->pid;
       }
        return view('admin.leveltype.index',['type'=>$type,'pid'=>$pid]);
    }
    
}
