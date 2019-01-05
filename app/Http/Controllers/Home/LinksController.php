<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Config;
use DB;
class LinksController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // 加载友情链接页面
    public function index()
    {   
        // 友情链接轮播图
        $pid = DB::table('adverts')->where('pid',0)->where('area',5)->first()->id;
        $linksimg = DB::table('adverts')->where('pid',$pid)->where('area',0)->get();
        // dd($linksimg);
        
        // 经典攻略
        $article = DB::table('article')->where("status","=",0)->orderBy("id","desc")->take(10)->get();
        // dd($article);
        
        // 国内
        $domestic = DB::table('links')->where("area","=",0)->where('status',"=",1)->get();
        $domestic_total = DB::table('links')->where("area","=",0)->where('status',"=",1)->count();
        // 境外
        $abroad = DB::table('links')->where("area","=",1)->where('status',"=",1)->get();
        $abroad_total = DB::table('links')->where("area","=",1)->where('status',"=",1)->count();
        // 友情链接负责人
        $info = DB::table('links_contacts')->get();

        // 尾部广告(获取尾部广告的id)
        $fid = DB::table('adverts')->where('pid','=',0)->where('area','=',3)->first()->id;
            // 尾部头
            $fhead = DB::table('adverts')->where('pid','=',$fid)->where('area','=',1)->where('status','=',0)->orderBy('sort','desc')->get();
            // 尾部中
            $fcontent = DB::table('adverts')->where('pid','=',$fid)->where('area','=',2)->where('status','=',0)->first();
            // 尾部尾
            $ffloat = DB::table('adverts')->where('pid','=',$fid)->where('area','=',3)->where('status','=',0)->orderBy('sort','desc')->get();


        return view('home.link.index',['linksimg'=>$linksimg,'article'=>$article,'abroad'=>$abroad,'abroad_total'=>$abroad_total,'domestic'=>$domestic,'domestic_total'=>$domestic_total,'info'=>$info,'fhead'=>$fhead,'fcontent'=>$fcontent,'ffloat'=>$ffloat]);
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
    // 添加友情链接
    public function store(Request $request)
    {
        // echo 1;
        // exit;
        // 获取数据
        $data = $request->except(['_token']);
        $data['apply_time'] = time();
        // 判断
        if($request->hasFile('brand_img') && $request->hasFile('show_img')){
             //初始化品牌文件名字
            $name=md5(time().mt_rand(1,10000));
            //获取上传品牌的图片后缀
            $ext=$request->file("brand_img")->getClientOriginalExtension();
            //把品牌图片移动到指定的日期目录下方法
            $request->file("brand_img")->move(Config::get('app.links'),$name.".".$ext);
            //保存品牌图片途径
            $data['brand_img']=trim(Config::get('app.links')."/".$name.".".$ext,'.');

             //初始化展示图片名字
            $name1=md5(time().mt_rand(1,10000));
            //获取上传展示图片的后缀
            $ext1=$request->file("show_img")->getClientOriginalExtension();
            //把展示图片移动到指定的日期目录下方法
            $request->file("show_img")->move(Config::get('app.links'),$name1.".".$ext1);
            //保存展示图片途径
            $data['show_img']=trim(Config::get('app.links')."/".$name1.".".$ext1,'.');

            // dd($data);
            //执行数据库的插入操作
            if(DB::table('links')->insert($data)){
                return redirect('/home/links')->withErrors(["请求成功,等待审核"]);
            }else{
                return back()->with('error','请求失败,非法提交数据');
            }
        }else{
                return back()->with('error','请求失败,非法提交数据');
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
