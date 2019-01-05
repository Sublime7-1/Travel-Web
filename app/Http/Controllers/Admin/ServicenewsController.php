<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use DB;
use App\Models\Servicenews;

class ServicenewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        

        $chart = DB::select('select user_id as `userid` from `char` group by `user_id`');
        if(count($chart)){
             foreach($chart as $k=>$v ){
                $arr[$k] = $v->userid;
            }

            $list = Servicenews::select('user_id','service_id')->where('service_id',session('AdminUserInfo.id'))->whereIn('user_id',$arr)->distinct('user_id')->get();
            return view('admin.service_chart.list',['list'=>$list]); 
        }else{
            $list = DB::table('char')->get();
             return view('admin.service_chart.list',['list'=>$list]);
        }
       
        

        
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
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        
        $arr = explode(',',$id);
        $service_id = $arr[0];
        $user_id = $arr[1];
        $service_id = DB::table('admin')->where('name',$service_id)->first()->id;
        $user_id = DB::table('user')->where('username',$user_id)->first()->id;
        $res = Servicenews::where('user_id',$user_id)->where('service_id',$service_id)->delete();
        // delete('delete  from `char` where user_id = '.$user_id.' and service_id = '.$service_id.'');
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
    // 消息进行刷新
    public function news($service_name,$user_name){
        $service_id = DB::table('admin')->where('name',$service_name)->first()->id;
        $user_id = DB::table('user')->where('username',$user_name)->first()->id;
        $char = Servicenews::where('user_id','=',$user_id)->where('service_id','=',$service_id)->orderby('id','asc')->get();
        return view('admin.service_chart.index',['char'=>$char,'service_id'=>$service_id,'user_id'=>$user_id,'user_name'=>$user_name,'service_name'=>$service_name]);
    }
    //申请为客服
    public function shenqing($admin_id,$user_id){
            $kefu['user_id'] = $user_id;
            $kefu['type'] = '旅游';
            $kefu['level'] = 1;
            $kefu['content'] = '我想申请为客服!';
            $kefu['status'] = 0;
            $kefu['time'] = time();
            $s_id = DB::table('servicelist')->insertGetId($kefu);

            $name =  DB::table('user')->where('id',$user_id)->first();
            $send['user_id'] = session('userid');
            $res= DB::table('userinfo')->where('uid',$user_id)->first();
            if(isset($res->truename)){
                if($res->truename!=null){
                    $send['truename'] = $res->realname;
                }else{
                  
                    $send['truename'] = $name->username;
                }
            }else{
                 $send['truename'] = $name->username;
            }
            
           
            $send['type'] = '旅游';
            $send['status'] = 0;
            $send['createtime'] = time();
            $send['phone'] = $name->tel;
            $send['g_phone'] = '无';
            $send['s_id'] = $s_id;
            DB::table('servicesend')->insert($send);
    }

    public function mysql_char(Request $request){
        $char = $request->input('char');
        $uid = $request->input('uid');
        $arr['user_id'] = $uid; 
        $arr['service_id'] = session('AdminUserInfo.id'); 
        $arr['content'] = $char;
        $arr['level'] = 2;  

        DB::table('char')->insert($arr);
    }


    public function ajax_new(Request $request){
        $user_id = $request->input('uid');
        $service_id = $request->input('sid');

        $char = Servicenews::where('user_id','=',$user_id)->where('service_id','=',$service_id)->orderby('id','asc')->get();
        return view('admin.service_chart.new',['char'=>$char]);
    } 


    public function status(Request $request){
       
    }
    //删除全部
    public function delAll(Request $request){
       
    }
    // 会员模块关联收货地址
    public function addr($id){
       
    }
}
