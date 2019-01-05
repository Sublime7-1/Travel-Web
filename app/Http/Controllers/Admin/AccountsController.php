<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Accounts;
class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 账户管理列表页
    public function index(Request $request)
    {   
        // 获取关键字(会员名)
        $keyword = $request->input('keyword');
        // 判断
        if(empty($keyword)){
            // 查询全部账户数据
            $data = Accounts::get();
        }else{
            // 模糊查询会员表
            $uinfo = DB::table('user')->where("username","like","%".$keyword."%")->get();
            // 判断模糊查询是否有数据
            if($uinfo->count()){
                // 有数据,则遍历出id
                foreach ($uinfo as $k => $v) {
                    // 通过id查找账户表数据
                    $data[] = Accounts::where('uid',"=",$v->id)->first();
                }     
            }else{
                // 没有数据,则直接返回账户表所有数据
                 $data = Accounts::get();
            }
        }
        // dd($data);
        // 获取总数
        $total = Accounts::count();        
        // dd($data);
        // 将得到的账户表数据遍历
        foreach($data as $k=>$v){
            // dd($v);
            // 通过遍历出的会员id获取会员信息
            $userinfo = DB::table('user')->where('id',$v->uid)->first();
            // dd($userinfo);
            // 判断
            if(count($userinfo)){
                $data[$k]->uname = $userinfo->username;             
            }else{
                $data[$k]->uname = "该账户已被注销";             
            }
        }
        // dd($data);
        // 加载模板
        return view('admin.accounts.index',['data'=>$data,'total'=>$total]);
    }

    // 账户状态
    public function status(Request $request){
        // dd($request->all());
        // 获取修改的id
        $id = $request->input('id');
        // 获取修改的状态
        $data['status'] = $request->input('status');
        // 执行修改
        if(DB::table('accounts')->where('id','=',$id)->update($data)){
            echo 1;
        }else{
            echo 0;
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 获取会员信息
    public function show($id)
    {
        // dd($id);
        // $res=DB::table('user')->join('userinfo',"user.id","=","userinfo.uid")->select('user.id','userinfo.id','nickname','realname','phone','birth','userinfo.sex','userinfo.email','address','marriage','job','degree','userinfo.tel','uid')->where("user.id","=",$id)->first();
        // dd($res);
        // return view('admin.accounts.user_info',['userinfo'=>$res]);
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
}
