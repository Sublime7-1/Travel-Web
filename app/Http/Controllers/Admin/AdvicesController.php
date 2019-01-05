<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Advicesinsert;
use App\Models\Advices;
use DB;
class AdvicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 获取所有意见
        $data = Advices::get();
        // 总条数
        $total = Advices::count();
        // 获取登录的管理员的等级status
        $astatus = DB::table('admin')->where("id","=",session('AdminUserInfo.id'))->first()->status;
        if($astatus == 3){ 
            // 遍历--获取反馈意见的用户,获取反馈类型
            foreach($data as $k=>$v){
                $data[$k]->uname = DB::table('user')->where("id","=",$v->uid)->first()->username;
                $data[$k]->type = DB::table('advicestype')->where("id","=",$v->pid)->first()->type;
            }
            // 如果等级是3,则显示意见列表
            return view('admin.advices.index',['data'=>$data,'total'=>$total]);
        }else{
            // 否则,显示找不到数据
            return view('admin.advices.index');
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

    // 回复意见
    public function reply($uid,$advices_id){
        // 获取需要的数据
        $data['uname'] = DB::table('user')->where("id","=",$uid)->first()->username;
        $data['uid'] = $uid;
        $data['advices_id'] = $advices_id;
        // dd($data);
        // 加载模板
        return view('admin.advices.reply',['data'=>$data]);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    // 执行回复
    public function store(Advicesinsert $request)
    {
        // 获取意见表ID
        $advices_id = $request->input('advices_id');
        // dd($request->all());
        // 获取需要插入意见回复表的数据
        $data = $request->except(['_token']);
        // 执行
        if(DB::table('advicesreply')->insert($data)){
            // 改变意见表的状态
            DB::table('advices')->where("id","=",$advices_id)->update(['status'=>2]);
            return redirect('/admin/advices')->with('success','回复意见成功');
        }else{
            // 否则,显示找不到数据
            return back()->with('error','回复意见失败');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 查看意见
    public function show($id)
    {
        // 获取意见
        $data = DB::table('advices')->where("id","=",$id)->first();
        // var_dump($data);
        // echo $data->status;
        // 如果意见未读,则变为已读
        if($data){
            if($data->status == '0'){
                $status['status'] = 1;
                DB::table('advices')->where("id","=",$id)->update($status);
            }
            // // 用户名
            $data->uname = DB::table('user')->where("id","=",$data->uid)->first()->username;
            // 意见类型
            $data->type = DB::table('advicestype')->where("id","=",$data->pid)->first()->type;
            // dd($data);
            // 加载
            return view('admin.advices.see',['data'=>$data]);
        }else{
            echo $id;
        }
       
    }

    // 查看回复
    public function seereply($id){
        // 获取当前ID的回复数据
        $data = DB::table('advicesreply')->where('advices_id',"=",$id)->first();
        // 获取回复者名称
        $data->admin_name = DB::table('admin')->where("id","=",$data->admin_id)->first()->name;
        // 接收者名称
        $userinfo = DB::table('user')->where("id","=",$data->uid)->first();
        if(count($userinfo)){
            $data->user_name = $userinfo->username;    
        }else{
            $data->user_name = '该用户已被注销';    
        }
        return view('admin.advices.see_reply',['data'=>$data]);
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

    // 删除意见
    public function del(Request $requesrt)
    {
        // 要删的id
        $id=$requesrt->input('id');
        // 判断
        if(DB::table('advices')->where("id","=",$id)->delete()){
            // 删除回复
            DB::table('advicesreply')->where("advices_id","=",$id)->delete();
            echo 1;
        }else{
            echo 0;
        }
    }


}
