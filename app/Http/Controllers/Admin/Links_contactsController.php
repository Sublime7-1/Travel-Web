<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Links_contacts;
use Validator;
class Links_contactsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Links_contacts::get();
        $total = Links_contacts::count();
        return view('admin.links_contacts.index',['data'=>$data,'total'=>$total]);
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
        $data = $request->except(['_token']);
        if(DB::table('links_contacts')->insert($data)){
            return redirect('/admin/links_contacts')->with('success','添加成功');
        }else{
            return redirect('/admin/links_contacts')->with('error','添加失败');
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
        // 获取数据
        $data=DB::table('links_contacts')->where("id","=",$id)->first();
        // echo 1;
        // 加载模板
        return view('admin.links_contacts.edit',['data'=>$data]);
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
        $data = $request->except(['_token','_method']);
        if(DB::table('links_contacts')->where("id","=",$id)->update($data)){
            return redirect('/admin/links_contacts')->with('success','修改成功');
        }else{
            return redirect('/admin/links_contacts')->with('error','修改失败');
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
        if(DB::table('links_contacts')->where("id","=",$id)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }

    public function checkup(Request $request){
        parse_str($request->input('str'),$arr);
        unset($arr['_token']);
        
        // 判断是否存在,存在则是修改的验证,不存在则是添加的验证
        if(isset($arr['_method'])){
             $messages = [
                "phone.required"=>"请输入手机号码",
                "phone.regex"=>"异常的手机号码",
                "email.email"=>"异常的邮箱地址",
                "email.required"=>"请输入邮箱地址",
            ];
            $rules = [
                'phone' => 'required|regex:/^1[34578]\d{9}$/',
                'email' => 'required|email',
            ];
            unset($arr['_method']);
        }else{
            $messages = [
                "name.required"=>"请输入负责人名字",
                "name.unique"=>"负责人名字已存在",            
                "phone.required"=>"请输入手机号码",
                "phone.regex"=>"异常的手机号码",
                "email.email"=>"异常的邮箱地址",
                "email.required"=>"请输入邮箱地址",
            ];
            $rules = [
                'name' => 'required|unique:links_contacts',
                'phone' => 'required|regex:/^1[34578]\d{9}$/',
                'email' => 'required|email',
            ];


        }
        // 验证
        $validator = Validator::make($arr,$rules,$messages);

        if ($validator->fails()) {
            // var_dump($validator->errors()->messages());
            $arr1 =  $validator->errors()->messages();
            foreach($arr1 as $v){
                foreach($v as $val){
                    $error[] = $val;
                }
            }
            return $error;
        }else{
            return 1;
        }
    }
}
