<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class SearchController extends Controller
{
    //
    public function index($keyword,$code,Request $request){
        if($code == 1){
            $request->session()->forget('hadselected');
        }

    	if($request->has('name') && $request->has('pid') && $request->has('pname')){
    		// $data = $request->all();
    		// dd($data);
    		$data = array(
    			'name' => $request->input('name'),
    			'pid' => $request->input('pid'),
    			'pname' => $request->input('pname')
    		);
    		if(session('hadselected')){
    			$request->session()->push('hadselected',$data);
    		}else{
    			// 处理为二维数组
    			$data2[] = $data;
    			// 将新数据保存到session中
    			session(['hadselected'=>$data2]);
    		}	
    	}

    		if(session('hadselected')){
    			$hadselected = session('hadselected');
    			$hadselected = self::getUnique($hadselected);
    			// 转换后 0=》name   1=》pid  2=》pname
	    		// 获取被选中的行id
	    		foreach($hadselected as $hadselected_v){
	    			$cate_pid[] = $hadselected_v[1];
                }
    		}else{
    			$cate_pid = array();
    		}


    		if(!isset($hadselected)) $hadselected = 0;

            if(is_array($hadselected)){
                foreach($hadselected as $hadselected_v2){
                   $arr2[] = $hadselected_v2[0];
                }
            }
            // echo '<pre>';   
           // dd($arr2);
        // 到中文分词表中查询gid
        $participle_gids = DB::table('participle')->where('keyword',$keyword)->pluck('gid')->toArray();
        if(!empty($arr2)){
            foreach ($arr2 as $value1) {
                // 到分类表查询分类的信息
                $cate_info = DB::table('goods_label')->where('name','like','%'.$value1.'%')->first();
                if(count($cate_info)>0){
                    // 获取分类id
                    $cid = $cate_info->id;
                    // 到商品分类关联表中查询商品id
                    $gid = DB::table('goods_links')->where('cid',$cid)->get();
                    if(count($gid)>0){
                        foreach($gid as $gid_v){
                            if(in_array($gid_v->gid,$participle_gids)){
                                $search_gid[] = $gid_v->gid;
                            }
                        }
                    }
                }
            }
             // 如果商品分类关联表中没有商品
            if(empty($search_gid)){
                $search_gid = array();
            }  
        }else{
            $search_gid = $participle_gids;
        }
// var_dump($search_gid); 
//             exit;

        if(count($search_gid)>0){
            // 有商品id
            $goods = DB::table('goods')->whereIn('id',$search_gid)->where('status',1)->paginate(10);
        }else{
            // 没商品id 到分类表里查询
            // 获得分类id
            $goods_label_id = DB::table('goods_label')->where('name','like','%'.$keyword.'%')->first();

            if(count($goods_label_id)>0){
                // 到标签表中查询商品id
                $goods_links_gid = DB::table('goods_links')->where('cid',$goods_label_id->id)->pluck('gid');
                if(!empty($arr2)){
                    foreach($arr2 as $value2){
                        // 到分类表中查询分类
                        $cate_info = DB::table('goods_label')->where('name','like','%'.$value2.'%')->first();
                        if(count($cate_info)>0){
                            // 分类id
                            $cid = $cate_info->id;
                            // 根据分类id到商品分类表中查询商品id
                            $gid = DB::table('goods_links')->where('cid',$cid)->get();
                            if(count($gid)>0){
                                foreach($gid as $gid_v){
                                    if(in_array($gid_v,$goods_links_gid)){
                                        // 获取匹配到的id，保存起来
                                        $search_gid2[] = $gid_v;
                                    }
                                }

                            }
                        }
                    }
                    if(empty($search_gid2)){
                        // 如果没有符合条件的商品
                        $search_gid2 = array();
                    }
                }else{
                    // 如果没有点击搜索条件，商品id为标签表中获取的商品id
                    $search_gid2 = $goods_links_gid;
                }
            }else{
                // 没有这个分类
                $search_gid2 = array();
            }

            if(count($search_gid2)>0){
                // 有商品id
                $goods = DB::table('goods')->whereIn('id',$search_gid2)->where('status',1)->paginate(10);
            }else{
                // 没商品id 模糊查询商品表
                
                // 获取条件的个数
                if(empty($arr2)){
                    $goods = DB::select('SELECT * FROM goods WHERE title like "%'.$keyword.'%" and status=1 LIMIT 10');
                }else{
                    $where = '';
                    foreach($arr2 as $value3){
                        $where .= ' and title like "%'.$value3.'%"';
                    }
                    $goods = DB::select('SELECT * FROM goods WHERE title like "%'.$keyword.'%"'.$where.' and status=1 LIMIT 10');
                }
                // $goods = DB::table('goods')->where('title','like','%'.$keyword.'%')->paginate(10);
            }
        } 
         
         // dd($goods);   
        //获取详情
        foreach($goods as $goods_k => $goods_v){
            $id = $goods_v->id;
            // 查找出发城市,成团地点
            $city = DB::table('goods_city')->where('goods_id',$id)->first();
            if(count($city)>0){
                $goods[$goods_k]->city = $city->begin_city;
            }
            // 查找景点id
            $placeid = DB::table('goods_place')->where('gid',$goods_v->id)->get();
            $place_arr = array();
            foreach($placeid as $placeid_v){
                $place = DB::table('goods_label')->where('id',$placeid_v->pid)->where('type',4)->first();
                if(count($place)>0){
                    $place_arr[] = $place->name; 
                }
            }
            // 商品包含景点
            if(count($place_arr)>0){
                $goods[$goods_k]->place = $place_arr;
            }

            // 查找供应商
            $receptionist = DB::table('goods_label')->where('id',$goods_v->receptionist)->first();
            if(count($receptionist)>0){
                $goods[$goods_k]->receptionist = $receptionist->name;
            }

            // 查找团期
            $tuanqi = DB::table('travel_info_time')->where('goods_id',$goods_v->id)->get();
            $tuanqi_arr = array();
            if(count($tuanqi)>0){

                foreach($tuanqi as $tuanqi_v){
                    $tuanqi_arr[] = date('m月d日',strtotime($tuanqi_v->begin_time));
                }
            }
            if(count($tuanqi_arr)>0){
                $goods[$goods_k]->tuanqi = $tuanqi_arr;
            }

            // 获取满意度和点评人数
            $comment = DB::table('comment')->where('gid',$goods_v->id)->pluck('colligate_grade');
            if(count($comment)>0){
                // 获取好评数量
                $good_num = 0;
                foreach($comment as $comment_v){
                    if($comment_v == 2){
                        $good_num++;
                    }
                }
                $manyi = ceil(($good_num/count($comment)*100));
                $goods[$goods_k]->manyi = $manyi;

                // 获取点评人数
                $goods[$goods_k]->dianping = count($comment);

            }else{
                $goods[$goods_k]->manyi = 0;
                $goods[$goods_k]->dianping = 0;

            }

            // 获取出游人数  订单状态 order_status >= 6
            // 获取该商品的已出游的订单
            $order = DB::table('home_order')->where('goods_id',$goods_v->id)->where('order_status','>=',6)->get();
            if(count($order)>6){
                // 出游人数
                $play_num = 0;
                foreach($order as $order_v){
                    $play_num += $order_v->adult_num + $order_v->child_num;
                }
            }else{
                $play_num = 0;
            }
            $goods[$goods_k]->play_num = $play_num;


        }

        // dd($goods);

        // dd($goods);
		$search_cates = DB::table('goods_label')->where('is_searchTop',1)->where('name','!=','热门推荐')->whereNotIn('id',$cate_pid)->orderBy('id','asc')->get();
    	foreach($search_cates as $k => $v){
    		$cates = array();
    		switch($v->name){
    			case '游玩线路':
    				// 查找热门玩法
    				$cates = DB::table('navigate_second')->where('is_popular_game',1)->get();
    				$search_cates[$k]->icon = 'x_line';
    				break;
    			case '出发城市':
    				$cate = DB::table('goods_city')->select('begin_city as name')->distinct()->get();
    				foreach($cate as $cate_v){
    					$cates[] = $cate_v;
    				}
    				$search_cates[$k]->icon = 'x_city';
    				break;
    			case '出游时间':
    				// 查找出行时间
    				$cate = DB::table('travel_info_time')->select('begin_time')->get();
	    			foreach($cate as $cate_v){
	    				// $cate_v是一个对象 无法使用数组函数，再进行遍历
	    				foreach($cate_v as $cate_k1 => $cate_v1){
	    					// 将对象中的数据拿出来保存到一个数组中，将时间字符串转换成时间戳，再转换成相应的格式
	    					$arr[] = date('y年m月',strtotime($cate_v1));
	    				}
	    			}
	    			// 将获得的数组反转，去重,键名为需要的值
	    			$cate = array_flip($arr);
	    			// 再次反转
	    			$cate = array_flip($cate);
	    			foreach($cate as $v){
	    				$cates[] = $v;
	    			}
    				$search_cates[$k]->icon = 'x_time';
	    			break;
	    		case '推荐景点':
	    			$cate = DB::table('navigate_second')->where('level','>',2)->where('is_hot',1)->get();
	    			foreach($cate as $cate_v2){
	    				
	    				if(is_file('.'.$cate_v2->pic)){
	    					$arr1[] = $cate_v2;
	    				}
	    			}
	    			$cates = $arr1;
    				$search_cates[$k]->icon = 'x_jingdian';
	    			break;
	    		case '产品品牌':
	    			$cates = DB::table('goods_label')->where('type',2)->where('pid','!=',0)->get();
    				$search_cates[$k]->icon = 'x_default';
	    			break;
	    		case '成团地点':
    				$cate = DB::table('goods_city')->select('begin_city as name')->distinct()->get();
    				foreach($cate as $cate_k3 =>$cate_v3){
    					$cates[] = $cate_v3;
    				}
    				$search_cates[$k]->icon = 'x_didian';
    				break;
    			default:
    				$cates = DB::table('goods_label')->where('pid',$v->id)->where('is_display',1)->get();
    				if($v->name == '产品钻级'){
    					$search_cates[$k]->icon = 'x_cp_tese';
    				}elseif($v->name == '行程天数'){
    					$search_cates[$k]->icon = 'x_day';
    				}elseif($v->name == '线路特色'){
    					$search_cates[$k]->icon = 'x_hotel_tese';
    				}elseif($v->name == '交通类型'){
    					$search_cates[$k]->icon = 'x_jt_style';
    				}elseif($v->name == '酒店位置'){
    					$search_cates[$k]->icon = 'x_hotel_address';
    				}elseif($v->name == '酒店等级'){
    					$search_cates[$k]->icon = 'x_hotel_star';
    				}elseif($v->name == '住宿类型'){
    					$search_cates[$k]->icon = 'x_zs_style';
    				}else{
    					$search_cates[$k]->icon = 'x_default';
    				}
    		}

			$search_cates[$k]->child = $cates; 	
    	}



    	// 尾部广告(获取尾部广告的id)
        $fid = DB::table('adverts')->where('pid','=',0)->where('area','=',3)->first()->id;
            // 尾部头
        $fhead = DB::table('adverts')->where('pid','=',$fid)->where('area','=',1)->where('status','=',0)->orderBy('sort','desc')->get();
        // 尾部中
        $fcontent = DB::table('adverts')->where('pid','=',$fid)->where('area','=',2)->where('status','=',0)->first();
        // 尾部尾
        $ffloat = DB::table('adverts')->where('pid','=',$fid)->where('area','=',3)->where('status','=',0)->orderBy('sort','desc')->get();


    	return view('home.search.index',['fid'=>$fid,
    		'fhead'=>$fhead,
    		'fcontent'=>$fcontent,
    		'ffloat'=>$ffloat,
    		'search_cates'=>$search_cates,
            'keyword'=>$keyword,
    		'goods'=>$goods,
    		'hadselected'=>$hadselected
    		]); 	
    }

	 // 获取中文分词 保存到数据库中
    public function getParticiple(){
    	$goods = DB::table('goods')->get();
    	foreach($goods as $goods_v){
    		// 匹配商品标题中的汉字
    		preg_match_all('/([\x{4e00}-\x{9fa5}]+)/u',$goods_v->title,$result);
    		// 判断是否匹配到汉字
    		if(count($result[0])>0){
    			$str = '';
    			foreach($result[0] as $result_v){
		    		$str .= $result_v;
    			}
    			// 根据匹配到的汉字，获取中文分词
    			$keywords = participle($str);
    			// 插入数据表中
    			// 定义一个保存商品标题得到的中文分词的字符串
    			$string = '';
    			foreach($keywords as $keywords_v){
    				$string .= "('".$keywords_v['word']."',".$goods_v->id."),";
    			}
    			// 除去最后的逗号
    			$string = rtrim($string,',');
    			// 执行插入操作
    			DB::insert("INSERT INTO participle(`keyword`,`gid`) VALUES{$string}");
    		}
    	}
    	return true;
    }

    // 更新中文分词(清空表/删除表 —> )
    public function updateParticiple(){
    	// 清空分词表
    	// 使用truncate删除表数据可以重置自增id，让id从1开始
    	DB::table('participle')->truncate();
    	$res = self::getParticiple();
    	if($res){
            echo 1;
        }else{
            echo 0;
        }
    }

    // 二维数组去重
    public function getUnique($arr){
    	foreach($arr as $arr_v){
    		$str = join(',',$arr_v);
    		$temp[] =  $str;
    	}
    	$temp = array_unique($temp);//去掉重复的键值
    	
    	foreach($temp as $temp_k => $temp_v){
    		 $temp[$temp_k] = explode(',',$temp_v);//将拆开的数组再重新转换
    	}
    	return $temp;
    }

    // 清除已选的产品
    public function destorySession(Request $request,$keyword){
        // 删除所有
        $request->session()->forget('hadselected');
        // 跳到搜索页
        return redirect('/home/search/'.$keyword.'-2');
    }

    // 清除单个选中条件 key第几个条件 keyword查询关键字
    public function destroyOneSession($key,$keyword){
        $hadselected = session('hadselected');
        $hadselected = self::getUnique($hadselected);
        
        //删除条件
        unset($hadselected[$key]);
        // 更新session
        session(['hadselected'=>$hadselected]);
        return redirect('/home/search/'.$keyword.'-2');
    }

}
