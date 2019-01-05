<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use DB;
use App\Models\Servicelist;

class ServicelistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        if($request->input('level')){
            $level = $request->input('level');
        }else{
            $level = '';
        };

        $list = Servicelist::where('level','like',"%$level%")->paginate(5);
        $num = Servicelist::count();
        $count = DB::select('select type,count(*) as `num` from `servicelist` group by `type`');

        return view('admin.servicelist.index',['list'=>$list,'count'=>$count,'num'=>$num]);

        
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Userinsert $request)
    {
         echo 123;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Userinsert $request)
    {
        $arr = $request->except('_token');
        unset($arr['_token']);
        unset($arr['repass']);
        $arr['time'] = time();
        $arr['status'] = 0;

        $arr['pass']=\Crypt::encrypt($arr['pass']);
        // 插入数据库
        if (\DB::table("user")->insert($arr)) {
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
        $res=User::find($id)->userinfo;
        // var_dump($res);
        return view('admin.user.user_info',['userinfo'=>$res]);
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
        if(\DB::table('servicelist')->delete($id)){
            \DB::table('servicesend')->where('s_id',$id)->delete();
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
        // var_dump($res);
        // $m=count($res);
        $count=User::count();
        return view('admin.user.user_address',['useraddress'=>$res])->with('count',$count);
    }
}
