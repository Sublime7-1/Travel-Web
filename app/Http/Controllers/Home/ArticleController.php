<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
// 游记攻略类
class ArticleController extends Controller
{
    // 页面
    public function index($id){
    	// 获取当前登录用户的信息
    	if(session('userid')){
    		$userinfo = DB::table('user')->join('userinfo',"user.id","userinfo.uid")->where("user.id","=",session('userid'))->select('user.username','userinfo.nickname','userinfo.realname','userinfo.pic')->first();		
    	}else{
    		$userinfo = '';
    	}
    	// dd($userinfo);

    	// 获取文章信息
    	$article = DB::table('article')->where("id","=",$id)->first();
    	$article->add_time = date('Y-m-d',$article->add_time);
    	// 获取文章对应的商品信息
    	$goodsinfo = DB::table('goods')->where("id","=",$article->gid)->first();
    	// 获取商品满意度
	    	// 获取当前商品的所有评论
	    	$comment_total = DB::table('comment')->where('gid','=',$goodsinfo->id)->count();
	    	// 满意的评论
	    	$comment_satisfied = DB::table('comment')->where('gid','=',$goodsinfo->id)->where("colligate_grade","=",2)->count();
	    	if($comment_total == 0 || $comment_satisfied == 0){
	    		$satisfied = 0;
	    	}else{    		
		    	$satisfied = round(($comment_satisfied/$comment_total) * 100,2);
	    	}
    	// dd($goodsinfo);
    	// dd($article);

	    // 获取其他文章
	    $article_other = DB::table('article')->where("id","!=",$id)->where("status","=",0)->orderBy("id","desc")->limit(10)->get();
	    // 初始化文章序号
	    $i = 1;

		// 尾部广告(获取尾部广告的id)
    	$fid = DB::table('adverts')->where('pid','=',0)->where('area','=',3)->first()->id;
	    	// 尾部头
	    	$fhead = DB::table('adverts')->where('pid','=',$fid)->where('area','=',1)->where('status','=',0)->orderBy('sort','desc')->get();
	    	// 尾部中
	    	$fcontent = DB::table('adverts')->where('pid','=',$fid)->where('area','=',2)->where('status','=',0)->first();
	    	// 尾部尾
	    	$ffloat = DB::table('adverts')->where('pid','=',$fid)->where('area','=',3)->where('status','=',0)->orderBy('sort','desc')->get();


    	// 加载
    	return view('home.article.index',['userinfo'=>$userinfo,
	    		'article'=>$article,
	    		'goodsinfo'=>$goodsinfo,
	    		'satisfied'=>$satisfied,
	    		'article_other'=>$article_other,
	    		'i'=>$i,
	    		'fhead'=>$fhead,
	            'fcontent'=>$fcontent,
	            'ffloat'=>$ffloat
    	]);
    }


    public function total(Request $request){
    	// 获取关键字
    	$keyword = $request->input('search');

    	// 获取当前登录用户的信息
    	if(session('userid')){
    		$userinfo = DB::table('user')->join('userinfo',"user.id","userinfo.uid")->where("user.id","=",session('userid'))->select('user.username','userinfo.nickname','userinfo.realname','userinfo.pic')->first();		
    	}else{
    		$userinfo = '';
    	}

    	// 获取所有文章
    	$article_total = DB::table('article')->where("status","=",0)->where('title','like',"%{$keyword}%")->orderBy("id","desc")->paginate(20);


    	// 尾部广告(获取尾部广告的id)
    	$fid = DB::table('adverts')->where('pid','=',0)->where('area','=',3)->first()->id;
	    	// 尾部头
	    	$fhead = DB::table('adverts')->where('pid','=',$fid)->where('area','=',1)->where('status','=',0)->orderBy('sort','desc')->get();
	    	// 尾部中
	    	$fcontent = DB::table('adverts')->where('pid','=',$fid)->where('area','=',2)->where('status','=',0)->first();
	    	// 尾部尾
	    	$ffloat = DB::table('adverts')->where('pid','=',$fid)->where('area','=',3)->where('status','=',0)->orderBy('sort','desc')->get();
	    // 加载
    	return view('home.article.article_total',['userinfo'=>$userinfo,
    			'article_total'=>$article_total,
	    		'fhead'=>$fhead,
	            'fcontent'=>$fcontent,
	            'ffloat'=>$ffloat,
	            'request'=>$request
    	]);
    }
}
