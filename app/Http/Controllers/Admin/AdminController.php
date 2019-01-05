<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use DB;
use App\Models\Admin;
use App\Http\Requests\Admin as Admininsert;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $keywords = $request->input('keywords');
        $status = $request->input('status');
        //设置缓存
        if(Cache::has('user')){
            $user = Cache::get('user');
        }else{
            $user = Admin::where('name','like',"%{$keywords}%")->where('status','like',"%{$status}%")->paginate(5);
            Cache::put('user', $user,0.05);
        }
        
        
        $count = Admin::count();
        $a_count = Admin::where('status','=',"0")->count();
        $b_count = Admin::where('status','=',"1")->count();
        $c_count = Admin::where('status','=',"2")->count();
        $d_count = Admin::where('status','=',"3")->count();
        
        //无刷新分页
        //分页变量
        //判断ajax请求，渲染到不同模板
        if(request()->ajax()){
            //return $articles;
            //如果是ajax请求，则渲染到该页面
            return view('admin.admin.ajax_page',['user'=>$user,'b_count'=>$b_count,'c_count'=>$c_count,'d_count'=>$d_count])->with('count',$count)->with('a_count',$a_count);
        }
        else {
            //否则到该页面
            return view('admin.admin.index',['user'=>$user,'b_count'=>$b_count,'c_count'=>$c_count,'d_count'=>$d_count])->with('count',$count)->with('a_count',$a_count);
        }

        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
         
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Admininsert $request)
    {
         $arr = $request->except(['_token']); 
        // 验证通过添加数据库
        unset($arr['repass']);
        $arr['pass']=\Crypt::encrypt($arr['pass']);
        $arr['count'] = 1;
        $arr['time']=time();
        $arr['lasttime']=time();
        // 插入数据库
        if (\DB::table("admin")->insert($arr)) {
            return redirect('admin/admin');
        }else{
            return back();
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
        $admin = \DB::table('admin')->find($id);
        
        return view('admin.admin.edit')->with('admin',$admin);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Admininsert $request, $id)
    {   
        $arr = $request->except(['_token','_method']);
        
        if(!empty($arr['pass']) && !empty($arr['repass'])){
            $arr['pass']=\Crypt::encrypt($arr['pass']);
            unset($arr['repass']);
        }else{
            unset($arr['pass']);
            unset($arr['repass']);
        }
         
         $arr['lasttime'] = time();
        
        if(\DB::table('admin')->where('id','=',$id)->update($arr)){
            return redirect('admin/admin');
        }else{
            return back();
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
        if(\DB::table('admin')->delete($id)){
            echo 1;
        }else{
            echo 2;
        }
    }
    public function status(Request $request){
        $display = $request->input('status');
        $id = $request->input('id');
        if(\DB::table('admin')->where('id','=',$id)->update(['display'=>$display])){
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
