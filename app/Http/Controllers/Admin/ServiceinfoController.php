<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use DB;
use App\Models\Serviceinfo;

use App\Http\Requests\Userinsert;
class ServiceinfoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $id = $request->input('id');
        $info = Serviceinfo::where('s_id','=',$id)->first();
        $uid = $info->user_id;
        $user = DB::table('user')->where('id','=',$uid)->first();

       
        return view('admin.serviceinfo.index',['info'=>$info,'user'=>$user]);    
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
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
    // 申请成功,修改该状态
    // 会员成为管理员
    public function success($id){

        DB::table('servicesend')->where('id','=',$id)->update(['status'=>1]);
        $service = DB::table('servicesend')->where('id','=',$id)->first();
        DB::table('servicelist')->where('id','=',$service->s_id)->update(['status'=>1]);

        
        $uid = $service->user_id;
        $user = DB::table('user')->where('id','=',$uid)->first();
        $arr['name'] = $user->username;
        $arr['pass'] = $user->pass;
        
        $arr['time'] = time();
        $arr['lasttime'] = time();
        $arr['count'] = 1;
        $arr['status'] = 0;
        $arr['sex'] = $user->sex;
        $arr['phone'] = $user->tel;
        $arr['email'] = $user->email;
        $arr['top'] = '我是客服管理员';
        $arr['display'] = 0 ;

        // 管理员重复验证
        $admin = DB::table('admin')->select('name')->get();
        foreach($admin as $v){
           
            if($v->name == $arr['name']){
                return back()->withErrors(['用户名已经存在']);
            }
        }
     
        if (\DB::table("admin")->insert($arr)) {
            $sid = $service->s_id;
            DB::table('servicelist')->where('id','=',$id)->update(['status'=>'1']);
            return redirect('/admin/servicelist')->withErrors(['客服开通成功']);
        }else{
            return back();
        }

        

    }
    // 申请失败 客服发送消息给客服进行连接跳转
    public function error($id){
        return redirect('/admin/servicesend')->with('error','被拒绝');
    }
    public function status(Request $request){
        
    }
   
}
