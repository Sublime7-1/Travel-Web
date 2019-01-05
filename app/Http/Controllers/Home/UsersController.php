<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Http\Requests\HomeUserInsect;
use Gregwar\Captcha\CaptchaBuilder;
use Session;
use Hash;
use Mail;
class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 注册页面:第一步
    public function index()
    {
        return view('home.register.index');
    }
    // 检测手机号码
    public function checkphone(Request $request){
        // 获取手机号
        $p = $request->input('p');
        // 执行查找
        if(DB::table('user')->where("tel","=",$p)->first()){
            echo 1;
        }else{
            echo 0;
        }
    }
    // 手机发送校验码
    public function sendsphone(Request $request){
        $p=$request->input('p');
        // echo $pp;
        //调用短信接口
        sendsphone($p);
    }
    // 检测用户名是否存在
    public function checkuser(Request $request){
        // 获取手机号
        $username = $request->input('user');
        // 执行查找
        if(DB::table('user')->where("username","=",$username)->first()){
            echo 1;
        }else{
            echo 0;
        }
    }
    // 检验邮箱是否存在
    public function checkemail(Request $request){
        // 获取手机号
        $email = $request->input('email');
        // 执行查找
        if(DB::table('user')->where("email","=",$email)->first()){
            echo 1;
        }else{
            echo 0;
        }
    }
    // 检验校验码
    public function checkcode(Request $request){
        // 获取输入的校验码
        $code=$request->input('code');
        // 判断
        if(isset($_COOKIE['sms']) && !empty($code)){
            // 获取手机号接收到的验证码
            $sms=$request->cookie('sms');
            if($sms==$code){
                echo 1;// 校验码一致
            }else{
                echo 2;// 校验码不一致
            }
        }elseif(empty($code)){
            echo 3;// 输入的校验码为空
        }else{
            echo 4;// 校验码过期
        }

    }

    // 保存注册的信息
    public function save($k,$v){
        // echo $k.$v;
        // 将传递来的数据变成数组
        // $kk = explode(',', $k);
        // $vv = explode(',', $v);
        // foreach ($kk as $key => $value) {
        //     // 定义数组
        //     $arr[$value] = $vv[$key]; 
        //     // 存入session
        //     session($arr);
        // }
        session([$k=>$v]);
        // echo session($k);

        echo 1;
       
    }

    // 注册第二步，
    public function reg_two(Request $request){
        $tel = $request->input('tel');
        // dd($tel);
        return view('home.register.reg_two',['tel'=>$tel]);
    }
    // 注册第三步，
    public function do_reg_two(Request $request){
        // dd($request->all());
        // 获取数据
        $data = $request->except(['_token','repassword']);
        // 密码使用AES加密
        $data['pass'] = \Crypt::encrypt($data['password']);
        unset($data['password']);
        $data['time'] = time();
        // 获取插入的ID
        $num = DB::table('user')->insertGetId($data);
        // 执行
        if($num){
            $userinfo['uid'] = $num;
            $userinfo['sex'] = $data['sex'];
            $userinfo['phone'] = $data['tel']; 
            $userinfo['email'] = $data['email']; 
            DB::table('userinfo')->insert($userinfo);//插入用户信息表
            $add['uid'] = $num;
            $add['phone'] = $data['tel'];
            DB::table('useraddress')->insert($add);//插入用户地址表

            return redirect('/reg_three/'.$num.'-'.$data['email']);
        }else{
            return redirect('/register')->error('注册失败,请稍后再试');
        }
    }
    // 显示注册成功页面
    public function reg_three($id,$email){
        // 加载
        return view('home.register.reg_three',['id'=>$id,'email'=>$email]);
    }

    // 发送激活邮件
    public function sendEmail($id,$email){
        // dd($id.'---'.$email);
        $res = Mail::send('home.register.send',['id'=>$id],function($message)use($email){
            $message->to($email);
            $message->subject('用户激活-重要邮件');
        });
        if($res){
            $message = '邮件发送成功,请前往邮箱激活';
            return view('home.register.show',['message'=>$message]);
        }else{
            $message = '服务器异常,请留意邮箱或重新点击发送';
            return view('home.register.show',['message'=>$message]);
        }
    }  
    // 执行邮件激活
    public function do_sendEmail(Request $request){
        // 用户ID
        $id = $request->input('id');
        // 修改状态
        $data['status'] = 1;
        // 判断
        if(DB::table('user')->where('id','=',$id)->update($data)){
            return view('home.register.show',['message'=>'激活成功']);
        }else{
            return view('home.register.show',['message'=>'激活链接已失效']);
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
    public function store(HomeUserInsect $request)
    {
        echo "<pre>";
        var_dump($request->all());
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
        //
    }
    public function login(Request $request){
        // session()->pull('username');//清除session
        // var_dump(session()->has('username'));
        if (session()->has('username')==false) {
            return view('home.login.index');
        }else{
            return redirect('/');
        }
        
    }

    public function dologin(Request $request){

        // 获取登录的用户名以及密码信息
        $logininfo=$request->except('_token','login_type','isWeak');
        // 给密码加密
        // $logininfo['password']=\Crypt::encrypt($logininfo['password']);
       //  echo "<pro>";
       // var_dump($logininfo);exit;
        // 查询数据库，判断登录用户名或邮箱或手机号码是否合法
        $res=DB::table('user')->where('username','=',$logininfo['username'])->orWhere('email','=',$logininfo['username'])->orWhere('tel','=',$logininfo['username'])->get();
        //根据数据库返回的结果做跳转 
        if ($res->count() == 0) {
            return redirect('/login')->withErrors(['该用户不存在']);
        }else{
            // 取出数据库的原始密码，解密后与传递过来的密码进行对比
            $ori_code=\Crypt::decrypt($res[0]->pass);

            if ($logininfo['password']==$ori_code) {
                    if($res[0]->status == 1){
                        // 登录成功后跳转至首页，同时将用户名信息存入到session
                        session()->put('username',$res[0]->username);
                        session()->put('userid',$res[0]->id);
                    }else{
                         return redirect('/login')->withErrors(['<a href="https://mail.qq.com/cgi-bin/loginpage">邮箱未激活,点击跳转激活</a>']);
                    }
                

                return redirect('/');

            }else{
                return redirect('/login')->withErrors(['账号或密码不正确']);
            }
        }
    }
    //注销
    public function outlogin(Request $request){
        $request->session()->forget('username');
        $request->session()->forget('userid');


        return view('home.outlogin.index');
    }

}
