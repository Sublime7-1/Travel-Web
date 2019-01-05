<?php

namespace App\Http\Controllers\Home;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Comment;
use Session;

class GoodsinfoController extends Controller
{
    
    
    public function index($id)
    {
        // 查询商品信息
        $goodsinfo = \App\Models\Goods::where('id',$id)->first();

        //查询优惠活动
        $discount = DB::table('discount_active')->where('goods_id',$id)->get();
        $discuont_num = $discount->count();
        // dd($id);
        // 查询商品下的全部优惠券
        $coupon = DB::table('coupon')->where("status","=",0)->where("gid","=",$id)->get();
        foreach($coupon as $k => $v){
            $coupon[$k]->start_time = date('Y-m-d',$v->start_time);
            $coupon[$k]->end_time = date('Y-m-d',$v->end_time);
        }
        $coupon_total = DB::table('coupon')->where("status","=",0)->where("gid","=",$id)->count();
        // 最新十条优惠劵
        $topcoupon = DB::table('coupon')->where("status","=",0)->where("gid","=",$id)->orderBy("id","desc")->limit(10)->get();
        // 最新五条优惠劵
        $topscoupon = DB::table('coupon')->where("status","=",0)->where("gid","=",$id)->orderBy("id","desc")->limit(5)->get();
        foreach($topscoupon as $k => $v){
            $topscoupon[$k]->start_time = date('Y-m-d',$v->start_time);
            $topscoupon[$k]->end_time = date('Y-m-d',$v->end_time);
        }

        //查找可选城市
        $goods_city = DB::table('goods_city')->where('goods_id',$id)->get();
        // 查找过去的信息
        $first_city = DB::table('goods_city')->where('goods_id',$id)->first();
        if( $first_city == null){
            $first_city = '';
        }

        // 查询当前用户所领取的优惠劵
        if(session('userid') != ''){
            $coupon_user = DB::table('coupon_receive')->where('uid','=',session('userid'))->groupBy('cid')->pluck('cid')->toArray();
        }else{
            $coupon_user = '';
        }
        // var_dump($coupon_user);exit;
        // 查询产品品牌
        

         // 判断是否收藏该商品 已收藏为1 未收藏为0
        $is_collect = DB::table('goods_collection')->where('gid',$id)->where('uid',session('userid'))->first();


        // 查询评论
        // 总评论
        $commenttotal = DB::table('comment')->where("gid","=",$id)->count();
        
        // 综合满意评论数
        $colligate_satisfied = DB::table('comment')->where("gid","=",$id)->where("colligate_grade","2")->count();
        if($colligate_satisfied != 0){
            $satisfied = round(($colligate_satisfied/$commenttotal)*100);
        }else{
            $satisfied = 0;
        }
        // 综合一般评论数
        $colligate_commonly = DB::table('comment')->where("gid","=",$id)->where("colligate_grade","1")->count();
        if($colligate_commonly != 0){
            $commonly = round(($colligate_commonly/$commenttotal)*100);
        }else{
            $commonly = 0;
        }
        // 综合不满意评论数
        $colligate_dissatisfied = DB::table('comment')->where("gid","=",$id)->where("colligate_grade","0")->count();
        if($colligate_dissatisfied != 0){
            $dissatisfied = round(($colligate_dissatisfied/$commenttotal)*100);
        }else{
            $dissatisfied = 0;
        }
        // 综合服务分值
        if($colligate_satisfied != 0){
            $z_colligate = round(($colligate_satisfied/$commenttotal)*5,1);
        }else{
            $z_colligate = 0;
        }
        // 预定优惠满意评论数
        $discount_satisfied = DB::table('comment')->where("gid","=",$id)->where("discount_grade","2")->count();
        // 预订优惠分值
        if($discount_satisfied != 0){
            $y_discount = round(($discount_satisfied/$commenttotal)*5,1);
        }else{
            $y_discount = 0;
        }
        // 游玩服务满意评论数
        $service_satisfied = DB::table('comment')->where("gid","=",$id)->where("service_grade","2")->count();
        // 游玩服务分值
        if($service_satisfied != 0){
            $y_service = round(($service_satisfied/$commenttotal)*5,1);
        }else{
            $y_service = 0;
        }
        // 游玩体验评论数
        $experience_satisfied = DB::table('comment')->where("gid","=",$id)->where("experience_grade","2")->count();
        // 游玩体验分值
        if($experience_satisfied != 0){
            $y_experience = round(($experience_satisfied/$commenttotal)*5,1);
        }else{
            $y_experience = 0;
        }
        // 当前商品评论的所有类型
        $comment_type = DB::table('comment')->where("gid","=",$id)->groupBy('pid')->pluck('pid');
        if(count($comment_type)){ 
            foreach($comment_type as $k => $v) {
                $type[$k]['pid'] = DB::table('comment_type')->where("id","=",$v)->first()->id;
                $type[$k]['name'] = DB::table('comment_type')->where("id","=",$v)->first()->name;
                $type[$k]['total'] = DB::table('comment')->where("gid","=",$id)->where('pid',"=",$v)->count();
            }
        }else{
            $type = '';
        }
        // dd($type);
    
        // 获取评论信息
        $comment_info = Comment::where("gid","=",$id)->get();   
        // 判断是否有评论    
        if(count($comment_info)){
            // 遍历
            foreach ($comment_info as $k => $v) {
                // 判断是否有回复
                $commentreply = DB::table('comment_reply')->where('comment_id',"=",$v->id)->first();
                if(count($commentreply)){
                    $comment_info[$k]->reply = $commentreply->reply;
                    $comment_info[$k]->reply_time = date('Y-m-d H:i:s',$commentreply->reply_time);                
                }else{
                    $comment_info[$k]->reply = '';
                }
                
                // dd($v['anonymous']);
                // 判断是否是匿名
                if($v['anonymous'] == '是'){
                    $comment_info[$k]->uname = '匿名评论';
                }else{
                    // 不是匿名则做处理
                    $comment_info[$k]->uname = DB::table('user')->where('id','=',$v->uid)->first()->username;    
                    // 获取用户名长度
                    $strlen = mb_strlen($comment_info[$k]->uname, 'utf-8');
                    // 提取第一个字符
                    $firstStr = mb_substr($comment_info[$k]->uname, 0, 1, 'utf-8');
                    // 提取最后一个字符
                    $lastStr = mb_substr($comment_info[$k]->uname, -1, 1, 'utf-8');
                    // 判断如果用户名长度为2
                    if($strlen == 2){
                        // 则处理为中间加*
                        $comment_info[$k]->uname = $firstStr . str_repeat('*', mb_strlen($comment_info[$k]->uname, 'utf-8') - 1);
                    }else{
                        // 不为2，则中间替换为*
                        $comment_info[$k]->uname = $firstStr . str_repeat("*", $strlen - 2) . $lastStr;
                    }              
                }
                // 获取评论类型
                $comment_info[$k]->type = DB::table('comment_type')->where('id','=',$v->pid)->first()->name;
            }
        }
        // dd($comment_info);

        // dd($coupon->count());
        // 查找商品的轮播图
        $goodsimg = DB::table('adverts')->where("status","=",0)->where("gid","=",$id)->get(); 
        // dd($goodsimg);

        // 尾部广告(获取尾部广告的id)
        $fid = DB::table('adverts')->where('pid','=',0)->where('area','=',3)->first()->id;
            // 尾部头
        $fhead = DB::table('adverts')->where('pid','=',$fid)->where('area','=',1)->where('status','=',0)->orderBy('sort','desc')->get();
        // 尾部中
        $fcontent = DB::table('adverts')->where('pid','=',$fid)->where('area','=',2)->where('status','=',0)->first();
        // 尾部尾
        $ffloat = DB::table('adverts')->where('pid','=',$fid)->where('area','=',3)->where('status','=',0)->orderBy('sort','desc')->get();

        //遍历时间
        $begin_time = DB::table('travel_info_time')->where('begin_time','>',date('Y/m/d',time()))->orderby('begin_time','asc')->where('goods_id',$id)->get();

        // 统计商品的出游人数
        $people = DB::table('home_order')->where('goods_id',$goodsinfo->id)->get();

        $sum_people = 0;
        foreach($people as $v){
            $sum_people += $v->adult_num + $v->child_num;
        }

        if($begin_time->count()){
            foreach($begin_time as $v){
                //进行过滤(大于当前时间)
                $time_a = strtotime($v->begin_time);

                if($time_a > time()){}
                $a1 = explode('/',$v->begin_time);
                $year1 = $a1[0];
                $mouth1 = $a1[1];               
                $true_time[$year1.$mouth1] = $v;
            }
        }else{
            $true_time = '';
        }
        //遍历路程
        $goods_travel = DB::table('travel_info_content')->where('goods_id',$id)->get();

      
        return view('home.goodsinfo.index',['coupon'=>$coupon,
            'topcoupon'=>$topcoupon,
            'topscoupon'=>$topscoupon,
            'coupon_total'=>$coupon_total,
            'goodsimg'=>$goodsimg,
            'commenttotal'=>$commenttotal,
            'colligate_satisfied'=>$colligate_satisfied,
            'satisfied'=>$satisfied,
            'colligate_commonly'=>$colligate_commonly,
            'commonly'=>$commonly,
            'colligate_dissatisfied'=>$colligate_dissatisfied,
            'dissatisfied'=>$dissatisfied,
            'z_colligate'=>$z_colligate,
            'y_discount'=>$y_discount,
            'y_service'=>$y_service,
            'y_experience'=>$y_experience,
            'type'=>$type,
            'comment_info'=>$comment_info,
            'fhead'=>$fhead,'fcontent'=>$fcontent,
            'ffloat'=>$ffloat,
            'goodsinfo'=>$goodsinfo,
            'begin_time'=>$begin_time,
            'true_time'=>$true_time,
            'goods_travel'=>$goods_travel,
            'discount'=>$discount,
            'discount_num'=>$discuont_num,
            'coupon_user'=>$coupon_user,
            'goods_city'=>$goods_city,
            'is_collect'=>$is_collect,
            'sum_people'=>$sum_people,
            'first_city'=>$first_city
            ]);
    }

    public function ajax_time($time,Request $request){

        $id = $request->input('goodsid');
        $goodsinfo = DB::table('goods')->where('id',$id)->first();
        $a2 = explode('-',$time);
        $year2 = $a2[0];
        $mouth2 = $a2[1];  
        $begin_time = DB::table('travel_info_time')->where('goods_id',$id)->get();
        if($begin_time->count()){
            foreach($begin_time as $v){

                $a1 = explode('/',$v->begin_time);
                $year1 = $a1[0];
                $mouth1 = $a1[1]; 
                if($year2 == $year1 && $mouth2 == $mouth1){
                    $true_time[] = $v;
                }            
            }

            return view('home.goodsinfo.ajax_time',['begin_time'=>$true_time,'goodsinfo'=>$goodsinfo]);
        }

    }

    public function coupon($uid,$cid){
        // echo $cid;
        $data['uid'] = $uid;
        $data['cid'] = $cid;
        if(DB::table('coupon_receive')->insert($data)){
            echo 1;
        }else{
            echo 0;
        }
    }


    // 收藏商品
    public function collectGoods($gid,$uid){
        $res = DB::insert('INSERT INTO goods_collection(gid,uid) VALUES('.$gid.','.$uid.')');
        if($res){
            echo 1;
        }else{
            echo 2;
        }
    }

	// 取消收藏
    public function cancelCollection($gid,$uid){
        $res = DB::table('goods_collection')->where('gid',$gid)->where('uid',$uid)->delete();
        if ($res) {
            echo 1;
        }else{
            echo 0;
        }
    }
    
    public function checkCollect($gid,$uid){
    	$res = DB::table('goods_collection')->where('gid',$gid)->where('uid',$uid)->first();
    	if ($res) {
    		echo 1;
    	}else{
    		echo 0;
    	}
    }

}
