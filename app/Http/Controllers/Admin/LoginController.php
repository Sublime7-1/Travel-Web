<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Gregwar\Captcha\CaptchaBuilder;
use Session;

class LoginController extends Controller
{   
    //后台首页
    public function index(Request $request){
        return view('admin.login.index');
    }
    // 处理后台登录
    public function dologin(Request $request){
        
        $request->flash();
        $name=$request->input('name');
        $pass=$request->input('pass');

        $data=\DB::table('admin')->where([['name','=',$name],['display','=',0]])->first();
       
        if ($data) {
            if($pass == \Crypt::decrypt($data->pass)){
                // 声明数组
                $arr = [];
                $arr['lasttime']=time();
                $arr['count']=++$data->count;
                // 更新登录信息

                \DB::table('admin')->where('id',$data->id)->update($arr);
                // 存session
            
               

                //添加到系统日志
                $system = ['admin_id'=>$data->id,'admin_level'=>$data->status,'content'=>'登录成功','time'=>date('Y-m-d H:i',time())];
                \DB::table('system_log')->insert($system);
                
                //验证码验证
                $yanzhengma = Session::get('phrase');
                $code = $request->input('code');

                if( $code != $yanzhengma){
                    return back()->withErrors(['验证码错误']);
                }

               //设置权限
                $arr = \DB::table('admin_level')->where('userid',$data->id)->first();
                if($arr==null){
                    $ids = ['Admi'];
                    session(['AdminUserInfo.ids'=>$ids]);
                }else{
                    $ids = explode(',',$arr->ids);
                    session(['AdminUserInfo.ids'=>$ids]);

                }
                 // 跳转到首页
                session(['AdminUserInfo.name'=>$data->name]);
                session(['AdminUserInfo.id'=>$data->id]);
                return redirect('/admin');
            }else{
                return back()->withErrors(['密码错误']);
            }
        }else{
            return back()->withErrors(['用户名不存在']);
        }
    }
    // 注销退出
    public function loginout(Request $request){
        $request->session()->flush();
        return redirect('admin/login');
    }

    // 验证码
    public function captch(){
        $builder = new CaptchaBuilder;
        $builder->build(150,32);
        // 储存验证码
        session(['phrase'=>$builder->getPhrase()]);
        return response($builder->output())->header("Content-type","image/jpeg");
        
    }
    public function code(Request $request){
        $yanzhengma = Session::get('phrase');
        $code = $request->input('param');

        if( $code != $yanzhengma){
            return ['success'=>'true'];
        }else{
            return 1;
        }
    }
   
}
