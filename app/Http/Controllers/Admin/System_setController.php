<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use DB;
use App\Http\Requests\Systemset;

class System_setController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $info = DB::table('system_set')->where('id','=','1')->first();

        return view('admin.system_set.index',['info'=>$info]);   
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
    public function store(Systemset $request)
    {

        $arr = $request->all();
        unset($arr['_token']);

        if($request->hasFile('pic')){
            $pic =  mt_rand(1,1000).'icon.jpg';
            $request->file('pic')->move('./uploads/'.date('Y-m-d',time()),$pic);

            $res = $request->file('pic')->getClientOriginalExtension();
            $arr['pic'] = date('Y-m-d').'/'.$pic;
            $old = DB::table('system_set')->where('id','=','1')->first();
            $oldpic = $old->pic;
        }else{
            unset($arr['pic']);
            $oldpic = '123.pcfdsafdsadfasfsfwhds'.rand(1000,10000);
        }
        

        

        $result = \DB::table('system_set')->where('id','=','1')->update($arr);
        if($result){
            //删除旧头像
            if(is_file('./uploads/'.$oldpic)){
                unlink('./uploads/'.$oldpic);
            }
            return redirect('/admin/system_set')->withErrors(['tip'=>'修改成功']);
        }else{
            return back()->withErrors(['tip'=>'修改失败']);
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
    public function destroy($id)
    {
        if(\DB::table('user')->delete($id)){
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
        $res = \DB::table('admin')->whereIn('id',[$str])->delete();
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }
}
