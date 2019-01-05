<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\OrderModel;
use Cache;
class IndexController extends Controller
{
    //首页
    public function index(){
        //获取导航分类1第一层
        $navigate1_first = $this->getNavigate1_first();
        // 获取导航分类1其他层
        $navigate1 = $this->getNavigate1_other();
        // 获取导航分类2
        $navigate2 = $this->getNavigate2();
        // 获取所有标签   设置缓存
        if(Cache::has('all_cates')){
            $all_cates = Cache::get('all_cates');
        }else{
            $all_cates = DB::table('goods_label')->get();
            Cache::put('all_cates', $all_cates,0.05);
        }
    
        // dd($navigate2);
        // 二层商品获取
        // 获取当季热玩 16
        foreach($all_cates as $v){
            if($v->id == 16){
                $djrw = $v;
            }
        }
        // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $djrw->id){
                $djrw->child[] = $v;
            }
        }
        // 获取商品
        $djrw_goods = $this->getGoods($djrw->child);
        
        // 获取出境长线 25
        foreach($all_cates as $v){
            if($v->id == 25){
                $cjcx = $v;
            }
        }
        // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $cjcx->id && $v->name != '热门景点玩法'){
                $cjcx->child[] = $v;
            }elseif($v->pid == $cjcx->id && $v->name == '热门景点玩法'){
                $cjcx->remen = $v;
            }
        }
        // 获取热门
        foreach($all_cates as $v){
            if($v->pid == $cjcx->remen->id){
                $cjcx->remen->child[] = $v;
            }
        }
        // 获取商品
        $cjcx_goods = $this->getGoods($cjcx->child);


        // 获取出境短线 33 
        foreach($all_cates as $v){
            if($v->id == 33){
                $cjdx = $v;
            }
        }
        // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $cjdx->id && $v->name != '热门目的地'){
                $cjdx->child[] = $v;
            }elseif($v->pid == $cjdx->id && $v->name == '热门目的地'){
                $cjdx->remen = $v;
            }
        }
        // 获取热门
        foreach($all_cates as $v){
            if($v->pid == $cjdx->remen->id){
                $cjdx->remen->child[] = $v;
            }
        }
        // 获取商品
        $cjdx_goods = $this->getGoods($cjdx->child);
        // dd($cjdx);

        // 获取国内旅游 42
        foreach($all_cates as $v){
            if($v->id == 42){
                $gnly = $v;
            }
        }
         // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $gnly->id && $v->name != '热门景点玩法' && $v->name != '热门目的地'){
                $gnly->child[] = $v;
            }elseif($v->pid == $gnly->id && $v->name == '热门景点玩法'){
                $gnly->remen[] = $v;
            }elseif($v->pid == $gnly->id && $v->name == '热门目的地'){
                $gnly->remen[] = $v;
            }
        }
        // 获取热门
        foreach($all_cates as $v){
            foreach($gnly->remen as $gnly_remen_v){
                if($v->pid == $gnly_remen_v->id){
                    $gnly_remen_v->child[] = $v;
                }
            } 
        }
        // 获取商品
        $gnly_goods = $this->getGoods($gnly->child);


        // 获取周边旅游 50
        foreach($all_cates as $v){
            if($v->id == 50){
                $zbly = $v;
            }
        }
        // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $zbly->id && $v->name != '热门玩法'){
                $zbly->child[] = $v;
            }elseif($v->pid == $zbly->id && $v->name == '热门玩法'){
                $zbly->remen = $v;
            }
        }
        // 获取热门
        foreach($all_cates as $v){
            if($v->pid == $zbly->remen->id){
                $zbly->remen->child[] = $v;
            }
        }
        // 获取商品
        $zbly_goods = $this->getGoods($zbly->child);




        // 获取自助旅游 58
        foreach($all_cates as $v){
            if($v->id == 58){
                $zzly = $v;
            }
        }
        // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $zzly->id && $v->name != '热门目的地'){
                $zzly->child[] = $v;
            }elseif($v->pid == $zzly->id && $v->name == '热门目的地'){
                $zzly->remen = $v;
            }
        }
        // 获取热门
        foreach($all_cates as $v){
            if($v->pid == $zzly->remen->id){
                $zzly->remen->child[] = $v;
            }
        }
        // 获取商品
        $zzly_goods = $this->getGoods($zzly->child);


        // 获取主题旅游 66
        foreach($all_cates as $v){
            if($v->id == 66){
                $ztly = $v;
            }
        }
        // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $ztly->id && $v->name != '热门主题玩法'){
                $ztly->child[] = $v;
            }elseif($v->pid == $ztly->id && $v->name == '热门主题玩法'){
                $ztly->remen = $v;
            }
        }
        // 获取热门
        foreach($all_cates as $v){
            if($v->pid == $ztly->remen->id){
                $ztly->remen->child[] = $v;
            }
        }

        // 获取商品
        $ztly_goods = $this->getGoods($ztly->child);

        // 一层
        // 获取游轮签证 74
        foreach($all_cates as $v){
            if($v->id == 74){
                $ylqz = $v;
            }
        }
        // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $ylqz->id && $v->name != '热门'){
                $ylqz->child[] = $v;
            }elseif($v->pid == $ylqz->id && $v->name == '热门'){
                $ylqz->remen = $v;
            }
        }
        // 获取热门
        foreach($all_cates as $v){
            if($v->pid == $ylqz->remen->id){
                $ylqz->remen->child[] = $v;
            }
        }
         // 获取商品
        $ylqz_goods = $this->getGoods($ylqz->child);


        // 获取自驾旅游 82
        foreach($all_cates as $v){
            if($v->id == 82){
                $zjly = $v;
            }
        }
          // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $zjly->id && $v->name != '热门'){
                $zjly->child[] = $v;
            }elseif($v->pid == $zjly->id && $v->name == '热门'){
                $zjly->remen = $v;
            }
        }
        // 获取热门
        foreach($all_cates as $v){
            if($v->pid == $zjly->remen->id){
                $zjly->remen->child[] = $v;
            }
        }
         // 获取商品
        $zjly_goods = $this->getGoods($zjly->child);



        // 获取酒店精选 89
        foreach($all_cates as $v){
            if($v->id == 89){
                $jdjx = $v;
            }
        }
        
          // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $jdjx->id && $v->name != '热门'){
                $jdjx->child[] = $v;
            }elseif($v->pid == $jdjx->id && $v->name == '热门'){
                $jdjx->remen = $v;
            }
        } 
        // 获取热门
        foreach($all_cates as $v){
            if($v->pid == $jdjx->remen->id){
                $jdjx->remen->child[] = $v;
            }
        }
         // 获取商品
        $jdjx_goods = $this->getGoods($jdjx->child);



        // 获取门票精选 97
        foreach($all_cates as $v){
            if($v->id == 97){
                $mpjx = $v;
            }
        }
          // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $mpjx->id && $v->name != '热门'){
                $mpjx->child[] = $v;
            }elseif($v->pid == $mpjx->id && $v->name == '热门'){
                $mpjx->remen = $v;
            }
        }
        
        // 获取热门
        foreach($all_cates as $v){
            if($v->pid == $mpjx->remen->id){
                $mpjx->remen->child[] = $v;
            }
        }
         // 获取商品
        $mpjx_goods = $this->getGoods($mpjx->child);




        // 获取当地玩乐 101
        foreach($all_cates as $v){
            if($v->id == 101){
                $ddwl = $v;
            }
        }
          // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $ddwl->id && $v->name != '热门'){
                $ddwl->child[] = $v;
            }elseif($v->pid == $ddwl->id && $v->name == '热门'){
                $ddwl->remen = $v;
            }
        } 
        
        // 获取热门
        foreach($all_cates as $v){
            if($v->pid == $ddwl->remen->id){
                $ddwl->remen->child[] = $v;
            }
        }
         // 获取商品
        $ddwl_goods = $this->getGoods($ddwl->child);

        // 获取游记攻略 111
        foreach($all_cates as $v){
            if($v->id == 111){
                $yjgl = $v;
            }
        }
          // 获取子类
        foreach($all_cates as $v){
            if($v->pid == $yjgl->id){
                $yjgl->child[] = $v;
            }
        } 
        // 获取游记攻略的文章
        foreach($yjgl->child as $yjgl_child_v){
            $yjgl_article[] = DB::table('article')->where('cid',$yjgl_child_v->id)->where('status',0)->take(6)->get();
        }
        


        // 获取特卖 226
        $temai = DB::table('goods_label')->where('pid',226)->get()->toArray();
        //获取商品
        foreach($temai as $temai_v){
            // 商品id
            $gid = DB::table('goods_links')->where('cid',$temai_v->id)->take(4)->get();
            $goods = array();
            foreach($gid as $gid_v){
                $goods[] = DB::table('goods')->where('id',$gid_v->gid)->first();
            }
            $temai_goods[] = $goods;
        }
        
        foreach($temai_goods[0] as $temai_goods0_k => $temai_goods0_v){
            $discount_active = DB::table('discount_active')->where('goods_id',$temai_goods0_v->id)->first();
            
            // 减后的价格
            $decrease_price = $temai_goods0_v->price - $discount_active->discount_amount;
            // 计算折扣
            $discount = round($decrease_price/$temai_goods0_v->price,2)*10;

            // 剩余时间
            $remaining_time = $discount_active->end_time - time();

            $temai_goods[0][$temai_goods0_k]->discount = $discount;
            $temai_goods[0][$temai_goods0_k]->end_time = $discount_active->end_time;
            $temai_goods[0][$temai_goods0_k]->remaining_time = $remaining_time;
        }


        // dd($temai_goods);

        // 获取旅游友情链接
        $links = DB::table('links')->where("status","=",1)->get();


    	// 轮播广告(获取轮播广告的id)

    	$Cid = DB::table('adverts')->where('pid','=',0)->where('area','=',0)->first()->id;
	    	$Cinfo = DB::table('adverts')->where('pid','=',$Cid)->where('area','=',0)->where('status','=',0)->orderBy('sort','asc')->get();

    	// 头部广告(获取头部广告的id)
    	$hid = DB::table('adverts')->where('pid','=',0)->where('area','=',1)->first()->id;
	    	$hinfo = DB::table('adverts')->where('pid','=',$hid)->where('area','=',1)->where('status','=',0)->orderBy('sort','asc')->get();

    	// 尾部广告(获取尾部广告的id)
    	$fid = DB::table('adverts')->where('pid','=',0)->where('area','=',3)->first()->id;
	    	// 尾部头
	    	$fhead = DB::table('adverts')->where('pid','=',$fid)->where('area','=',1)->where('status','=',0)->orderBy('sort','desc')->get();
	    	// 尾部中
	    	$fcontent = DB::table('adverts')->where('pid','=',$fid)->where('area','=',2)->where('status','=',0)->first();
	    	// 尾部尾
	    	$ffloat = DB::table('adverts')->where('pid','=',$fid)->where('area','=',3)->where('status','=',0)->orderBy('sort','desc')->get();

            // 查找订单id
            $ids= DB::table('home_order')->select('id','adult_num','child_num')->get();
            // 过去公告信息
            $goodsname = OrderModel::select('goods_id','userphone','order_change_time')->orderby('id','desc')->take(10)->get();
            $num = 1;
            // 点评人数
            $order_i = 1;
            // 出游的总人数
            $people = 0;
            foreach($ids as $v){
                $people += $v->child_num + $v->adult_num;
                $res = DB::table('comment')->where('oid',$v->id)->first();
                //获取总满意评价
                if($res != null){

                    if($res->colligate_grade == "2"){
                        $num ++;
                    }
                    $order_i++;
                }
                
            }
            //总满意度百分比
            $num = (float)$num / (float)$order_i;
            

    	return view('home.index',['Cinfo'=>$Cinfo,
            'fhead'=>$fhead,
            'fcontent'=>$fcontent,
            'ffloat'=>$ffloat,
            'hinfo'=>$hinfo,
            'navigate1_first'=>$navigate1_first,
            'navigate1'=>$navigate1,
            'navigate2'=>$navigate2,
            'djrw'=>$djrw,
            'djrw_goods'=>$djrw_goods,
            'cjcx'=>$cjcx,
            'cjcx_goods'=>$cjcx_goods,
            'cjdx'=>$cjdx,
            'cjdx_goods'=>$cjdx_goods,
            'gnly'=>$gnly,
            'gnly_goods'=>$gnly_goods,
            'zbly'=>$zbly,
            'zbly_goods'=>$zbly_goods,
            'zzly'=>$zzly,
            'zzly_goods'=>$zzly_goods,
            'ztly'=>$ztly,
            'ztly_goods'=>$ztly_goods,
            'ylqz'=>$ylqz,
            'ylqz_goods'=>$ylqz_goods,
            'zjly'=>$zjly,
            'zjly_goods'=>$zjly_goods,
            'jdjx'=>$jdjx,
            'jdjx_goods'=>$jdjx_goods,
            'mpjx'=>$mpjx,
            'mpjx_goods'=>$mpjx_goods,
            'ddwl'=>$ddwl,
            'ddwl_goods'=>$ddwl_goods,
            'yjgl'=>$yjgl,
            'yjgl_article'=>$yjgl_article,
            'temai'=>$temai,
            'temai_goods'=>$temai_goods,
            'num'=>$num,
            'order_i'=>$order_i,
            'people'=>$people,
            'goodsname'=>$goodsname,
            'links'=>$links
            ]);
    }

    public function getNavigate1_first(){
        // 获取导航一级分类第一层
        $navigate1_first = DB::table('navigate_first')->where('level','=',1)->where('pid','=',0)->get();
        // 获取下面的子分类
        foreach($navigate1_first as $v){
            // 查询子类
            $child = DB::table('navigate_first')->where('level','=',1)->where('pid','=',$v->id)->get();
            // 判断是否查询到结果
            if ($child->count()) {
                // 遍历查询到的数组，保存到$arr中
                foreach($child as $v1){
                     $arr[] = $v1->name;
                }
                // 将$arr存放到child键名中
                $navigate1_first['child'] = $arr;
            }    
        }
        return $navigate1_first;
    }

    public function getNavigate1_other(){
        // 获取导航一级分类其他层
        $levels = DB::table('navigate_first')->select('level')->where('level','>',1)->distinct()->get();
        foreach($levels as $v2){
            // 获取层级数
            $level = $v2->level;
            // 找到相同层级放到同一个子数组中
            $data = DB::table('navigate_first')->where('pid','=',0)->where('level','=',$level)->get();

            // 获取下面的子分类
            foreach($data as $v3){

                // 查询子类
                $arr2 = array();
                $child1 = DB::table('navigate_second')->where('level','=',$v3->level)->where('is_hot','=',1)->get();
                // 判断是否查询到结果
                if ($child1->count()) {
                    // 遍历查询到的数组，保存到$arr2中
                    foreach($child1 as $v4){
                         $arr2[] = $v4->name;
                    }
                    // 将$arr存放到child键名中
                    $data['child'] = $arr2;
                }else{
                    // 说明子类中没有热门的分类，继续往其子类查找
                    $child1 = DB::table('navigate_second')->where('level','=',$v3->level)->get();
                    foreach($child1 as $v4){
                        // 根据id去找子类
                        $child2 = DB::table('navigate_second')->where('pid','=',$v4->id)->where('is_hot','=',1)->get();
                        if ($child2->count()) {
                             // 遍历查询到的数组，保存到$arr2中
                            foreach($child2 as $v5){
                                 $arr2[] = $v5->name;
                            }
                            // 将$arr存放到child键名中
                            $data['child'] = $arr2;
                        }
                    }
                }  
            }
            $navigate1[] = $data;
        }
        return $navigate1;
    }

    public function getNavigate2(){
        $navigate2 = array();
        // 获取三级分类集合
        for($i=1; $i<10; $i++){
            // echo $i.'<br>';
            if($i==1){
                // 度假精选三级菜单
                // 查询国内推荐
                $self_country = DB::table('navigate_second')->where('is_chinese','=',1)->where('is_hot','=',1)->get();
                $arr3 = array();
                foreach($self_country as $k5 => $v5){
                    if(is_file('.'.$v5->pic)){
                        $arr3[] = $v5;
                        // 只查20个数据
                        if (count($arr3) == 20) {
                            break;
                        }
                    }
                }
                // 找到国内推荐
                $gntj = DB::table('navigate_second')->where('id','=',123)->first();
                // 因为首页遍历需要，需要将查到的20个数据平分成每组4个的5个数组
                $arr3 = array_chunk($arr3,4);
                $gntj->child = $arr3;
                $navigate2[$i][] = $gntj;

                // 查询国外推荐
                $other_country = DB::table('navigate_second')->where('is_chinese','=',2)->where('is_hot','=',1)->get();
                $arr4 = array();
                foreach($other_country as $k6 => $v6){
                    if(is_file('.'.$v6->pic)){
                        $arr4[] = $v6;
                        // 只查20个数据
                        if (count($arr4) == 20) {
                            break;
                        }
                    }
                }
                // 找到国外推荐
                $gwtj = DB::table('navigate_second')->where('id','=',124)->first();
                // 因为首页遍历需要，需要将查到的20个数据平分成每组4个的5个数组
                $arr4 = array_chunk($arr4,4);
                $gwtj->child = $arr4;
                $navigate2[$i][] = $gwtj;

                // 查询免签 id=43
                $mianqian = DB::table('navigate_second')->where('pid','=',43)->get();
                $navigate2[$i][] = $mianqian;

                // 查询海岛 id=44
                $haidao = DB::table('navigate_second')->where('pid','=',44)->get();
                $navigate2[$i][] = $haidao;

                // 热门推荐
                $remen = DB::table('navigate_second')->where('pid','=',45)->get();
                $navigate2[$i][] = $remen;

            }elseif($i==2 || $i==3){
                // 查询当前层数的所有字段
                $data2 = DB::table('navigate_second')->where('level','=',$i)->get();
                // 定义一个放整块页面的数组
                $arr5 = array();
                // $arr5 索引下标0 放热门字段
                foreach($data2 as $k7 => $v7){
                    // 判断是否为热门字段
                    if ($v7->is_hot==1) {
                        $arr5[0][] = $v7;
                        // 当热门字段的键数最大只能为7 等于7时结束当前foreach循环
                        if (count($arr5[0]) == 7) {
                            break;
                        }
                    }
                }

                $data11 = DB::table('navigate_second')->where('level','=',$i)->get();

                // $arr5 索引下标1 放所有分类
                foreach($data11 as $k8 => $v8){                 
                    $arr6 = array();
                    // 顶级分类
                    if ($v8->pid==0){
                        // 判断这个子类是否隐藏(判断是否为双字段的父类)
                        if ($v8->is_display == 2){
                            $pid = $v8->id;
                            // 获取下面的子类
                            $arr6 = DB::table('navigate_second')->where('pid','=',$pid)->get();
                            // 当有子类的时候继续进行查询
                            if (count($arr6) > 0) {
                                // 查询每个的子类，放到$arr7数组中
                                $arr7 = array();
                                foreach($arr6 as $k9 => $v9){
                                    $pid1 = $v9->id;
                                    // 获取子类集合
                                    $data4 = DB::table('navigate_second')->where('pid','=',$pid1)->get();
                                    
                                    foreach($data4 as $v10){
                                        // 将获取的子类放在$arr7中
                                        $arr7[] = $v10;    
                                    }  
                                }
                                // 新建一个child下标保存所有子类
                                $arr6['child'] = $arr7;
                                // 将每个分类保存进$arr5下标为1的数组里
                                $arr5[1][] = $arr6;
                            }
                            // 跳到下一次循环
                            continue;
                        }else{
                            $pid = $v8->id;
                            // $v8是单个字段，直接将获取的子类赋给新属性child
                            $v8->child = DB::table('navigate_second')->where('pid','=',$pid)->get();
                            // 将每个分类保存进$arr5下标为1的数组里
                            $arr5[1][] = $v8;
                        }
                    }
                }  
                $navigate2[$i] = $arr5;

            }elseif($i==4){
                // 查询当前层数的所有字段
                $data5 = DB::table('navigate_second')->where('level','=',$i)->get();
                // 定义一个放整块页面的数组
                $arr8 = array();

                // $arr8 索引下标0 放热门字段
                foreach($data5 as $k11 => $v11){
                    // 判断是否为热门字段
                    if ($v11->is_hot==1) {
                        $arr8[0][] = $v11;
                        // 当热门字段的键数最大只能为7 等于7时结束当前foreach循环
                        if (count($arr8[0]) == 7) {
                            break;
                        }
                    }
                }

                // $arr8 索引下标1 存放分类
                // 找到马尔代夫
                $maerdaifu = DB::table('navigate_second')->where('id','=',32)->first();
                // 获取除了热门玩法的子分类(岛屿)
                $data6 = DB::table('navigate_second')->where('pid','=',$maerdaifu->id)->where('name','!=','热门玩法')->get();
                // 获取子分类(岛屿下的每个子分类)
                foreach($data6 as $k12 => $v12){
                    $pid2 = $v12->id;
                    $arr9 = array();
                    // 获取每个岛屿下的子分类
                    $arr9 = DB::table('navigate_second')->where('pid','=',$pid2)->get();
                    // 保存进对应岛屿的child属性中
                    $data6[$k12]->child = $arr9;
                }
                // 将含有所有岛屿的数组保存到马尔代夫的child属性中
                $maerdaifu->child = $data6;
                // 将马尔代夫保存到$arr8索引为1的数组中
                $arr8[1][] = $maerdaifu;

                // 获取热门玩法字段
                $remenwanfa = DB::table('navigate_second')->where('pid','=',$maerdaifu->id)->where('name','=','热门玩法')->first();
                // 获取热门玩法下的子分类
                $data7 = DB::table('navigate_second')->where('is_popular_game','=','1')->where('pid','=',$remenwanfa->id)->get();
                // 将子分类保存到热门玩法的child属性中
                $remenwanfa->child = $data7;
                // 将热门玩法保存到$arr8索引为1的数组中
                $arr8[1][] = $remenwanfa;
                // 将整个页面数据保存到所有页面的数组中(下标为当前层数)
                $navigate2[$i] = $arr8;

            }else{
                // 其他相同的分类
                // echo '<pre>';
                // 定义$arr10保存页面数据 
                $arr10 = array();

                // 获取热门字段
                // 查询当前层数的所有字段
                $data8 = DB::table('navigate_second')->where('level','=',$i)->get();
                // $arr10 索引下标0 放热门字段
                foreach($data8 as $k13 => $v13){
                    // 判断是否为热门字段
                    if ($v13->is_hot==1) {
                        $arr10[0][] = $v13;
                        // 当热门字段的键数最大只能为7 等于7时结束当前foreach循环
                        if (count($arr10[0]) == 7) {
                            break;
                        }
                    }
                }

                // $arr10 索引下标为1 放所有分类
                // 定义$arr11放顶级分类
                $arr11 = array();
                foreach($data8 as $v14){
                    // 获取顶级分类
                    if ($v14->pid == 0) {
                        // 获取下面的分类(除了热门玩法)
                        $data9 = DB::table('navigate_second')->where('pid','=',$v14->id)->where('name','!=','热门玩法')->get();
                        $v14->child = $data9;

                        // 获取热门玩法
                        $remenwanfas = DB::table('navigate_second')->where('pid','=',$v14->id)->where('name','=','热门玩法')->first();
                        // 获取热门玩法的子分类
                        $data10 = DB::table('navigate_second')->where('pid','=',$remenwanfas->id)->where('is_popular_game','=','1')->get();
                        // 将子分类保存到热门玩法的child属性中
                        $remenwanfas->child = $data10;
                        // 将热门挖法保存到$v14的remen属性
                        $v14->remen = $remenwanfas;
                        // 将每个分类保存到$arr11中
                        $arr11[] = $v14;
                    }
                }
                // $arr10下标为1的数组保存分类集合
                $arr10[1][] = $arr11;
                // 将整个$arr10保存到对应层数下标的$navigate2中
                $navigate2[$i] = $arr10;
            }
        }
        return $navigate2;

    }

    // 获取分类下的商品
    public function getGoods($arr){
        $goods = array();
        $i=0;//定义初始下标
        foreach($arr as $v){
            $id = $v->id;
            // 到关系表中查找商品id
            $gid = DB::table('goods_links')->where('cid',$id)->get();

            foreach($gid as $gid_v){
                // 根据商品id 获取商品信息，保存起来
                $goods_info = DB::table('goods')->where('id',$gid_v->gid)->where('status',1)->first();
                if(count($goods_info)>0){
                    $goods[$i][] = $goods_info;

                }
            }
            // 找到商品后下标加1
            $i++;
        }

        // 获取满意度
         foreach($goods as $key => $value){
            foreach($value as $value_k => $value_v){
                // 获取满意度和点评人数
                $comment = DB::table('comment')->where('gid',$value_v->id)->pluck('colligate_grade');
                if(count($comment)>0){
                    // 获取好评数量
                    $good_num = 0;
                    foreach($comment as $comment_v){
                        if($comment_v == 2){
                            $good_num++;
                        }
                    }
                    $manyi = ceil(($good_num/count($comment)*100));
                    $goods[$key][$value_k]->manyi = $manyi;
                }else{
                    $goods[$key][$value_k]->manyi = 0;

                }
            }
        }

        return $goods;
    }



}
