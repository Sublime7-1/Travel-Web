<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;//验证类
use DB;
// 支付类
class PayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 支付方式页面
    public function index()
    {
        $data = DB::table('pay')->get();
        return view('admin.pay.index',['data'=>$data]);
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
        // dd($request->all());
        // 获取要添加的数据
        $data=$request->except(['_token']);
        // 执行
         // 判断
        if($request->hasFile('img')){
            //初始化文件名字
            $name=time()+rand(1,10000);
            //获取上传图片后缀
            $ext=$request->file("img")->getClientOriginalExtension();
            //把上传图片移动到指定的日期目录下方法
            $request->file("img")->move('./uploads/'.date('Y-m-d').'/',$name.".".$ext);
            //保存图片途径
            $data['img']='/uploads/'.date('Y-m-d')."/".$name.".".$ext;
            // dd($data);
            //执行数据库的插入操作
            if(DB::table('pay')->insert($data)){
                return redirect('/admin/pay')->with('success','添加成功');
            }else{
                return redirect('/admin/pay')->with('error','添加失败');
            }
        }else{
             return redirect('/admin/pay')->with('error','请选择图片');
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
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // 修改状态
    public function update(Request $request, $id)
    {
        // 获取要修改的数据
        $data['status'] = $request->input('status');
        // 执行
        if(DB::table('pay')->where("id","=",$id)->update($data)){
            echo 1;
        }else{
            echo 0;
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

    // 支付方式删除
    public function del(Request $requesrt)
    {
        // 要删的id
        $id=$requesrt->input('id');
        // 执行
        if(DB::table('pay')->where("id","=",$id)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    // 验证添加支付
    public function checkup(Request $request){
        // 将传递来的序列化字符转化成数组
        parse_str($request->input('str'),$arr);
        unset($arr['_token']);
        unset($arr['_method']);
        // 自定义提示信息
        $messages = [
            "name.required"=>"请输入支付名",
            "name.unique"=>"支付名已存在",
            "desc.required"=>"请输入描述",
        ];
        // 自定义规则
        $rules = [
            'name' => 'required|unique:pay',
            'desc' => 'required',
        ];   
        // 执行自定义检验
        $validator = Validator::make($arr,$rules,$messages);
        // 判断是否有错误
        if ($validator->fails()) {
            // var_dump($validator->errors()->messages());
            // 获取错误信息
            $arr1 =  $validator->errors()->messages();
            // 遍历为一维数组
            foreach($arr1 as $v){
                foreach($v as $val){
                    $error[] = $val;
                }
            }
            // 返回错误信息
            return $error;
        }else{
            return 1;
        }
    }
}
