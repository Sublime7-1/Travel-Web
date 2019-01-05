<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Level;
use App\Models\Admin;
use App\Http\Requests\Levelinsert;
class LevelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $level = Level::paginate(5);
        foreach($level as $value){
           $name =  Admin::where('name',$value->userid)->get();
          $admin[] = $name[0]->status;
        }
        return view('admin.level.index',['level'=>$level,'admin'=>$admin]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         $type = \DB::table('level_types')->where('pid',0)->get();
         $type_two = \DB::table('level_types')->get();
         $user = \DB::table('admin')->get();
         return view('admin.level.add',['type'=>$type,'type_two'=>$type_two,'user'=>$user]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Levelinsert $request)
    {
        $arr = $request->except('_token');
        $arr['ids'] = implode($arr['ids'],',');
        $res = \DB::table('admin_level')->insert($arr);
        if($res){
            return redirect('admin/level')->with('success','添加成功');
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
        $levelinfo = DB::table('admin_level')->find($id);
        $ids = explode(',',$levelinfo->ids);
        $type = \DB::table('level_types')->where('pid',0)->get();
        $type_two = \DB::table('level_types')->get();
        $user = \DB::table('admin')->get();

        return view('admin/level/edit',['levelinfo'=>$levelinfo,'type'=>$type,'type_two'=>$type_two,'user'=>$user,'ids'=>$ids]);
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
        $arr = $request->except(['_method','_token']);
        $id = $arr['id'];
        unset($arr['id']);
        $arr['ids'] = implode($arr['ids'],',');
        $res = \DB::table('admin_level')->where('id','=',$id)->update($arr);
        if($res){
            return redirect('admin/level')->with('success','修改成功');
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
        if(\DB::table('admin_level')->delete($id)){
            echo 1;
        }else{
            echo 2;
        }
    }
    // 个人信息
    public function personal(){
       return view('admin.admin.personal');
    }
}
