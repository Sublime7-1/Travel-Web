<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use DB;
use App\Models\User;
use App\Models\Servicenews;



class CharController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $admin_id = $request->input('admin_id');
        $char = Servicenews::orderby('id','asc')->where('user_id','=',session('userid'))->where('service_id','=',$admin_id)->get();
        $username = session('username'); 
        return view('home.service_chart.index',['char'=>$char,'username'=>$username,'admin_id'=>$admin_id]);
    }
    public function mysql_char(Request $request){
        $admin_id = $request->input('admin_id');
        $char = $request->input('char');
        $arr['user_id'] = session('userid'); 
        $arr['service_id'] =  $admin_id; 
        $arr['content'] = $char;
        $arr['level'] = 1;  
         DB::table('char')->insert($arr);
        if($char == '我想申请为客服!'){
            $arr1['user_id'] = session('userid'); 
            $arr1['service_id'] =  $admin_id; 
            $arr1['content'] = '请等待审核!!';
            $arr1['level'] = 1; 
            DB::table('char')->insert($arr1);
        }
        if(preg_match('/^[0-9]{4}$/',$char)){
             $arr2['user_id'] = session('userid'); 
            $arr2['service_id'] =  $admin_id; 
            $arr2['content'] = '申请成功!!';
            $arr2['level'] = 1; 
            DB::table('char')->insert($arr2);
        }
       
    }
    public function ajax_new(Request $request){
        $admin_id = $request->input('admin_id');
        $char = Servicenews::orderby('id','asc')->where('user_id','=',session('userid'))->where('service_id','=',$admin_id)->get();
        return view('home.service_chart.new',['char'=>$char]);
    }
    public function del(){
        DB::table('char')->where('user_id','=','1')->delete();
    }


}