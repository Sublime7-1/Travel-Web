<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use DB;
use App\Models\User;
use App\Models\UserRankModel;
use App\Http\Requests\Userinsert1;

class UserController extends Controller
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
            $user = User::where('username','like',"%{$keywords}%")->get();
            Cache::put('user', $user,0.05);
        }
        
        
        $count = User::count();
        
        //无刷新分页
        //分页变量
        //判断ajax请求，渲染到不同模板
        if(request()->ajax()){
            //return $articles;
            //如果是ajax请求，则渲染到该页面
            return view('admin.user.ajax_page',['user'=>$user])->with('count',$count);
        }
        else {
            //否则到该页面
            
            return view('admin.user.index',['user'=>$user])->with('count',$count);
        }

        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
         echo 123;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Userinsert1 $request)
    {
        $arr['username'] = $request->input('username');
        $arr['pass'] = $request->input('pass');
        $arr['sex'] = $request->input('sex');
        $arr['tel'] = $request->input('tel');
        $arr['email'] = $request->input('email');
        $arr['display'] = $request->input('display');
      
        $arr['time'] = time();
        $arr['status'] = 0;
        $arr['aid'] = 0;
        $arr['pass']=\Crypt::encrypt($arr['pass']);

        $num = DB::table("user")->insertGetId($arr);
        // 插入数据库
        if ($num) {
            $userinfo['uid'] = $num;
            $userinfo['sex'] = $arr['sex'];
            $userinfo['phone'] = $arr['tel']; 
            $userinfo['email'] = $arr['email']; 
            DB::table('userinfo')->insert($userinfo);//插入用户信息表
            $add['uid'] = $num;
            $add['phone'] = $arr['tel'];
            DB::table('useraddress')->insert($add);//插入用户地址表

            return redirect('admin/user')->withErrors(['添加成功！']);
        }else{
            return back()->withErrors(['添加成功！']);
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
        // 模型关联查询会员个人信息
        $res=User::find($id)->userinfo;
        // 判断是否能查询到结结果，如果返回非null，则显示个人信息，否则跳回首页
        if ($res==null) {
            return redirect('admin/user')->withErrors(['该会员暂无个人信息']);
        }else{
            return view('admin.user.user_info',['userinfo'=>$res]);
        }
        
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
    public function update(Userinsert1 $request, $id)
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
        $res = \DB::table('user')->whereIn('id',[$str])->delete();
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    // 会员模块关联收货地址
    public function addr($id){
        $res=User::find($id)->useraddress;
        // var_dump($res);exit;
        $m=count($res);
        // 判断是否有收货地址，如果有，则遍历展示，如果没有，则跳回首页
        if ($m!=0) {
            $count=User::count();
            return view('admin.user.user_address',['useraddress'=>$res])->with('count',$count);
        }else{
            return redirect('admin/user')->withErrors(['该会员暂无收货地址']);
        }
    }
    // 会员等级管理
    public function rank(){
        // 联合userinfo表和userrank表进行数据查询，userinfo为基表
        $res=DB::table('userinfo')->join('userrank','userinfo.uid','=','userrank.uid')->get();
        $sex=['保密','男','女'];
        $status=['注册会员','一星会员','二星会员','三星会员','四星会员','五星会员','六星会员','七星会员'];
        // 将数据库查询到的等级信息遍历到前台展示
        return view('admin.user.user_rank',['rank'=>$res,'sex'=>$sex,'status'=>$status]);
    }
    // 会员记录信息管理
    public function document(){
        $res=DB::table('userinfo')->join('userrank','userinfo.uid','=','userrank.uid')->join('userdocument','userinfo.uid','=','userdocument.uid')->get();
        $count=count($res);
        $status=['注册会员','一星会员','二星会员','三星会员','四星会员','五星会员','六星会员','七星会员'];
        // echo "<pre>";
        // var_dump($res);exit;

        return view('admin.user.user_docunment',['userdocument'=>$res,'count'=>$count,'status'=>$status]);
    }
}
