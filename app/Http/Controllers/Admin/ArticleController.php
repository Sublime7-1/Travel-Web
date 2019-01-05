<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Articleinsert;
use App\Models\Article;
use DB;
class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // 文章类别
        $type = DB::table('goods_label')->where("pid","111")->get();
        // 获取每类下的文章数量
        foreach($type as $k=>$v){
            $type[$k]->total = DB::table('article')->where("cid",$v->id)->count();
        }

        // 获取关键字
        $title = $request->input('title');
        // 所有文章
        $data = Article::where('title','like',"%{$title}%")->where("aid","=",session('AdminUserInfo.id'))->get();
        // 遍历
        foreach($data as $k=>$v){
            // 文章类别名字
            $data[$k]->type = DB::table('goods_label')->where("id",$v->cid)->first()->name;
            // 文章商品名字
            $data[$k]->gname = DB::table('goods')->where("id",$v->gid)->first()->title;
        }
        // dd($data);
        $total = Article::count();
        return view('admin.article.article_list',['type'=>$type,'data'=>$data,'total'=>$total,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        // 文章类型
        $type = DB::table('goods_label')->where("pid","111")->get();
        // 商品
        $goods = DB::table('goods')->get();
        return view('admin.article.article_add',['type'=>$type,'goods'=>$goods]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Articleinsert $request)
    {
        // dd($request->all());
        $data = $request->except(['_token']);
        $data['add_time'] = $data['up_time'] = time();
        $data['aid'] = session('AdminUserInfo.id');
        // 判断是否有图片
        if($request->hasFile('thumb')){
             // 获取后缀名
            $suffix = $request->file('thumb')->getClientOriginalExtension();
            // 随机文件名
            $imgName = md5(time().mt_rand(1000,9999));
            // 拼接文件
            $thumb = $imgName.'.'.$suffix;
            // 上传文件到uploads目录
            $request->file('thumb')->move('./uploads/'.date('Y-m-d').'/',$thumb);
            // 保存到要添加进数据库的数组中
            $data['thumb'] = '/uploads/'.date('Y-m-d').'/'.$thumb;
            // 执行
            if(DB::table('article')->insert($data)){
                return redirect('/admin/article')->with('success','添加成功');
            }else{
                return back()->with('errror','添加失败');
            }
        }else{
            $data['thumb'] = '';
            // 执行
            if(DB::table('article')->insert($data)){
                 return redirect('/admin/article')->with('success','添加成功');
            }else{
                 return back()->with('errror','添加失败');
            }
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
        // 获取指定类别的数据
        $data = Article::where("cid",$id)->where("aid","=",session('AdminUserInfo.id'))->get();
        // 遍历
        foreach($data as $k=>$v){
            // 文章类别名字
            $data[$k]->type = DB::table('goods_label')->where("id",$v->cid)->first()->name;
            // 文章商品名字
            $data[$k]->gname = DB::table('goods')->where("id",$v->gid)->first()->title;
        }
        // 文章数量
        $total = Article::count();
        // dd($data);
        // 加载模板
        return view('admin.article.ajax_type',['data'=>$data,'total'=>$total]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // 文章类型
        $type = DB::table('goods_label')->where("pid","111")->get();
        // 选择的文章
        $data = Article::where("id",$id)->first();
        $data->gname = DB::table('goods')->where("id",$data->gid)->first()->title;
        return view('admin.article.article_edit',['data'=>$data,'type'=>$type]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Articleinsert $request, $id)
    {
        $data = $request->except(['_token','_method']);
        $data['up_time'] = time();
        // 获取当前数据的图片
        $info=DB::table('article')->where("id","=",$id)->first();
        // 判断是否有图片
        if($request->hasFile('thumb')){
             // 获取后缀名
            $suffix = $request->file('thumb')->getClientOriginalExtension();
            // 随机文件名
            $imgName = md5(time().mt_rand(1000,9999));
            // 拼接文件
            $thumb = $imgName.'.'.$suffix;
            // 上传文件到uploads目录
            $request->file('thumb')->move('./uploads/'.date('Y-m-d').'/',$thumb);
            // 保存到要添加进数据库的数组中
            $data['thumb'] = '/uploads/'.date('Y-m-d').'/'.$thumb;
            // 执行
            if(DB::table('article')->where("id",$id)->update($data)){
                if(file_exists('.'.$info->thumb)){
                    unlink('.'.$info->thumb);                   
                }
                return redirect('/admin/article')->with('success','修改成功');
            }else{
                return back()->with('errror','修改失败');
            }
        }else{
            // 执行
            if(DB::table('article')->where("id",$id)->update($data)){
                 return redirect('/admin/article')->with('success','修改成功');
            }else{
                 return back()->with('errror','修改失败');
            }
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

    // 删除文章
    public function del(Request $requesrt)
    {
        // 要删的id
        $id=$requesrt->input('id');
        // 判断
        if(DB::table('article')->where("id","=",$id)->delete()){
            echo 1;
        }else{
            echo 0;
        }
    }
}
