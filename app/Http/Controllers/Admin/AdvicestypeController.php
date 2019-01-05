<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Advicestypeinsert;//意见分类规则
use App\Models\Advices;//意见模型类
use App\Models\Advicestype;//分类模型类
use DB;
// 意见反馈类型类
class AdvicestypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 类型页
    public function index()
    {
        $data = Advicestype::get();
        return view('admin.advicestype.index',['data'=>$data]);
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
    public function store(Advicestypeinsert $request)
    {
        $data = $request->except(['_token']);
        if(DB::table('advicestype')->insert($data)){
             return redirect('/admin/advicestype')->with('success','添加成功');
        }else{
            return back()->with('error','添加失败');
        }
}

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 获取类型下的所有意见
    public function show($id)
    {
        // 获取所有意见
        $data = Advices::where('pid','=',$id)->get();
        // 总条数
        $total = Advices::where('pid','=',$id)->count();
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
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 获取数据
        $data=Advicestype::where("id","=",$id)->first();
        // echo 1;
        // 加载模板
        return view('admin.advicestype.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Advicestypeinsert $request, $id)
    {
        $data=$request->except(['_token','_method']);
        if(DB::table('advicestype')->where("id","=",$id)->update($data)){
            return redirect('/admin/advicestype')->with('success','修改成功');
        }else{
            return back()->with('error','修改失败');
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
        //
    }
    // 删除类型
    public function del(Request $requesrt)
    {
        // 要删的id
        $id=$requesrt->input('id');
        // 判断类形下是否有意见
        $num=DB::table('advices')->where("pid","=",$id)->count();
        // 判断
        if($num>0){
            echo 0;
        }else{
            if(DB::table('advicestype')->where("id","=",$id)->delete()){
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    // 修改意见类型状态
    public function status(Request $request){
        // 状态值
        $status = $request->input('status');
        // 要修改的id
        $id = $request->input('id');
        // 执行
        if(DB::table('advicestype')->where('id','=',$id)->update(['status'=>$status])){
            echo 1;
        }else{
            echo 2;
        }
    }
}
