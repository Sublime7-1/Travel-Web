<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use DB;
use App\Models\System_log;


class System_logController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if(!empty($request ->input('keywords'))){
            $keywords = $request ->input('keywords');
            $user = DB::table('admin')->select('id')->where('name','=',$keywords)->first();
            if($user){
                $keywords = $user->id;
            }else{
                $keywords = '';
            } 
        }else{
            $keywords = '';
        }
        
        $system = System_log::where('admin_id','like',"%{$keywords}%")->paginate(5);
        return view('admin.system_log.index',['system'=>$system,'request'=>$request->all()]);   

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Userinsert $request)
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Userinsert $request)
    {
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \DB::table('user')->find($id);
        return view('admin.user.edit')->with('user',$user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Userinsert $request, $id)
    {   
        $arr = $request->except(['_token','_method']);
        
        if(!empty($arr['pass']) && !empty($arr['repass'])){
            $arr['pass']=\Crypt::encrypt($arr['pass']);
            unset($arr['repass']);
        }else{
            unset($arr['pass']);
            unset($arr['repass']);
        }
        $id = $arr['id'];
        unset($arr['id']);
    
        if(\DB::table('user')->where('id',$id)->update($arr)){
            return redirect('admin/user')->withErrors(['修改成功']);
        }else{
            return back()->withErrors(['修改失败']);
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
        if(\DB::table('user')->delete($id)){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function status(Request $request){
        $display = $request->input('status');
        $id = $request->input('id');
        if(\DB::table('user')->where('id','=',$id)->update(['display'=>$display])){
            echo 1;
        }else{
            echo 2;
        }
    }
    //删除全部
    public function delAll(Request $request){
        $str = $request->input('str');
        $res = \DB::table('admin')->whereIn('id',[$str])->delete();
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
}
