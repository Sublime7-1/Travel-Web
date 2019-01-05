<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\Goods;
// 引入校验类
use App\Http\Requests\GoodsRequest;
use App\Http\Requests\GoodsEditRequest;


class GoodsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {   
        // 获取当前客服id
        $admin_id = session('AdminUserInfo.id');

        if($request->has('keyword')){
          $keyword = $request->input('keyword');
          $goods = DB::table('goods')->orderBy('id','asc')->where('admin_id',$admin_id)->where('title','like','%'.$keyword.'%')->paginate(10);

        }else{
          $keyword = '';
           // 获取商品列表
          $goods = DB::table('goods')->orderby('id','asc')->where('admin_id','=',$admin_id)->paginate(10);
        }


        

        
        foreach($goods as $goods_k => $goods_v){
            $collect = DB::table('goods_collection')->where('gid',$goods_v->id)->get();
            if(count($collect)>0){
                $goods[$goods_k]->collect_num = count($collect);
            }else{
                $goods[$goods_k]->collect_num = 0;
            }
        }



        // 获取普通所有分类
        $cates = DB::table('goods_label')->select(DB::raw('*,concat(path,",",id) as paths'))->orderBy('paths')->where('is_display','=',1)->where('type','=',3)->get();
        // 获取所有景点 
        $places = DB::table('goods_label')->where('is_display',1)->where('type',4)->where('pid','!=','0')->get();
        foreach($cates as $k => $v){
        	// 获取path字段
            $path = $v->path;
            // 将path 转换成数组
            $arr = explode(',',$path);
            // 获取逗号的个数，代表第几层个子类
            $num = count($arr)-1;
            $cates[$k]->name = str_repeat('--', $num).$v->name;
        }

       

        // 获取接待商列表
        $receptionist = DB::table('goods_label')->select('id','name')->where('type','=',1)->where('pid','!=',0)->get();

        // 获取品牌列表
        $brand = DB::table('goods_label')->select('id','name')->where('type','=',2)->where('pid','!=',0)->get();

        

        return view('admin.goods.index',['cates'=>$cates,
            'goods'=>$goods,
            'receptionist'=>$receptionist,
            'brand'=>$brand,
            'places'=>$places,
            'request'=>$request->all(),
            'keyword'=>$keyword
            ]);
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
    public function store(GoodsRequest $request)
    {
        //获取表单数据
        $data = $request->except('_token','cate_id','place_id','has_receptionist','has_brand');
        // 上传图片
        // 获取图片后缀名
        $suffix = $request->file('pic')->getClientOriginalExtension();
        // 随机文件名
        $picName = md5(time().mt_rand(1000,9999));
        // 拼接图片名和后缀名
        $pic = $picName.'.'.$suffix;
        // 将上传的图片移动到上传目录
       	$request->file('pic')->move('./uploads/'.date('Y-m-d',time()).'/',$pic);
       	// 将图片路径保存到要添加的数组中
       	$data['pic'] = '/uploads/'.date('Y-m-d',time()).'/'.$pic;

       	$res = Goods::insertGetId($data);
       	 
        if ($res) {
            $cate_id = $request->input('cate_id');
            foreach($cate_id as $v){
                // 将分类id和商品id添加到关联表中
                DB::table('goods_links')->insert(['cid'=>$v,'gid'=>$res]);
            }
            
            $place_id = $request->input('place_id');
            foreach($place_id as $v){
                // 将景点id和商品id添加到关联表中
                DB::table('goods_place')->insert(['gid'=>$res,'pid'=>$v]);
            }

            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('goods_msg','添加成功');
          // / 刷新父窗口页面 layer提示成功的样式码
          return redirect('/admin/Goods')->with('tips_code','1');
        }else{
            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('goods_msg','添加失败');
          // layer提示失败的样式码
          return back()->with('tips_code','5');
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
        $data = DB::table('goods')->where('id','=',$id)->first();
        $id = $data->id;
        // 获取当前商品的分类

        $cate_ids = DB::table('goods_links')->where('gid','=',$id)->get();
        $cids = '';
        foreach ($cate_ids as $value) {
            $cid = $value->cid;
            $cates_selected[] = DB::table('goods_label')->where('id','=',$cid)->first();
            $cids .= $cid.',';
        }
        // 去掉cids中最后的逗号
        $cids = rtrim($cids,',');
        // 查询没有被选中的标签
        $cates = DB::select('SELECT *,concat(path,",",id) as paths from goods_label where type=3 and is_display=1 and id not in ('.$cids.') order by paths');
        foreach($cates as $k => $v){
            // 获取path字段
            $path = $v->path;
            // 将path 转换成数组
            $arr = explode(',',$path);
            // 获取逗号的个数，代表第几层个子类
            $num = count($arr)-1;
            // 第几层就重复几次 -- 加在前面
            $cates[$k]->name = str_repeat('--', $num).$v->name;
        }

         // 获取接待商列表
        $receptionist = DB::table('goods_label')->select('id','name')->where('type','=',1)->where('pid','!=',0)->get();

        // 获取品牌列表
        $brand = DB::table('goods_label')->select('id','name')->where('type','=',2)->where('pid','!=',0)->get();
        
        // 获取当前的景点分类
        $place_ids = DB::table('goods_place')->where('gid',$id)->where('pid','<>',0)->get();
        $pids = '';
        foreach ($place_ids as $value2) {
            $pid = $value2->pid;
            $places_selected[] = DB::table('goods_label')->where('id','=',$pid)->first();
            $pids .= $pid.',';
        }
        // 去掉pids中最后的逗号
        $pids = rtrim($pids,',');
        // 查询没有被选中的标签
        $places = DB::select('SELECT * from goods_label where type=4 and is_display=1 and pid<>0 and id not in ('.$pids.')');

        return view('admin.goods.edit',['data'=>$data,
            'cates_selected'=>$cates_selected,
            'cates'=>$cates,
            'receptionist'=>$receptionist,
            'brand'=>$brand,
            'places_selected'=>$places_selected,
            'places' => $places
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsEditRequest $request, $id)
    {
        //
        
        // 获取除了 _token _method 的表单数据
        $data = $request->except('_token','_method','cate_id','place_id','has_receptionist','has_brand');

        // 判断是否上传图片
        if ($request->has('pic')) {
            // 获取原图片路径
            $pic = DB::table('goods')->select('pic')->where('id','=',$id)->first()->pic;
            // 判断是否有原图片
            if (is_file('.'.$pic)) {
                // 删除图片
                unlink('.'.$pic);   
            }
            // 上传图片
            // 获取文件后缀名
            $suffix = $request->file('pic')->getClientOriginalExtension();
            // 生成随机文件名
            $picName = md5(time().mt_rand(1000,9999));
            // 拼接文件名和后缀名
            $pic = $picName.'.'.$suffix;
            // 将文件上传到指定目录
            $request->file('pic')->move('./uploads/'.date('Y-m-d').'/',$pic);
            // 将文件路径保存到要修改的数组中
            $data['pic'] = '/uploads/'.date('Y-m-d').'/'.$pic;
        }

        // 删除商品分类关联表的数据
         DB::table('goods_links')->where('gid','=',$id)->delete();
        // 将表单获取的cate_id数据添加到第三张表中
         $cate_id = $request->input('cate_id');
         $values = '';
         foreach($cate_id as $k => $v){
            $values .= '('.$id.','.$v.'),';
         }
         // 去掉最后的逗号
         $values = rtrim($values,',');
         // 添加到商品分类关联表中
        $res1 = DB::insert("INSERT INTO goods_links(`gid`,`cid`) VALUES".$values."");

        // 删除商品景点关联表的数据
         DB::table('goods_place')->where('gid','=',$id)->delete();
        // 将表单获取的cate_id数据添加到第三张表中
         $place_id = $request->input('place_id');
         $values2 = '';
         foreach($place_id as $k => $v){
            $values2 .= '('.$id.','.$v.'),';
         }
         // 去掉最后的逗号
         $values2 = rtrim($values2,',');

        $res2 = DB::insert("INSERT INTO goods_place(`gid`,`pid`) VALUES".$values2."");

        // 更新goods表该商品数据
        $res = DB::table('goods')->where('id','=',$id)->update($data);
        if ($res) {
            $request->session()->flash('tips_code','1');
            return redirect('/admin/Goods')->with('goods_msg','修改成功');
        }else{
            if($res1 && $res2){
                $request->session()->flash('tips_code','1');
                return redirect('/admin/Goods')->with('goods_msg','修改成功');
            }else{
                $request->session()->flash('tips_code','5');
                return back()->with('goods_msg','修改失败');
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
        //删除商品分类关联表中的数据
        $res1 = DB::table('goods_links')->where('gid','=',$id)->delete();
        $res2 = DB::table('goods')->where('id','=',$id)->delete();

        //可能没有
        $res3 = DB::table('travel_info_time')->where('goods_id',$id)->delete();
        $res4 = DB::table('travel_info_content')->where('goods_id',$id)->delete();
        $res5 = DB::table('travel_info')->where('goods_id',$id)->delete();

        // 优惠卷 //可能没有
        $res6 = DB::table('coupon')->where('gid',$id)->delete();
        // 删除商品广告
        $res7 = DB::table('adverts')->where('gid',$id)->delete();
        // 删除商品路线规划
        $res8 = DB::table('goods_city')->where('goods_id',$id)->delete();
        // 删除优惠活动
        $res9 = DB::table('discount_active')->where('goods_id',$id)->delete();

		// 评论
        $comment = DB::table('comment')->where('gid',$id)->get();
        if ($comment->count()) {
        	foreach ($comment as $key => $value) {
        		DB::table('comment_reply')->where('comment_id',$value->id)->delete();
        	}
        }
        
       // 删除评论
		$comment = DB::table('comment')->where('gid',$id)->get();
        if ($comment->count()) {
        	foreach ($comment as $key => $value) {
        		DB::table('comment_reply')->where('comment_id',$value->id)->delete();
        	}
        }
         // 删除评论
		DB::table('comment')->where('gid',$id)->delete();




        if ($res1 && $res2 ) {
            echo 1;
        }else{
            echo 0;
        }
    }

    // 根据传过来的分类名获取处理后的分类名
    public function getCateName(Request $request){
        // 获取分类名
        $str = $request->input('str');
    	$arr = explode('--',$str);
    	// 取出最后一个字符串
		$newstr = array_pop($arr);
		echo $newstr;
    }

    // 修改商品状态
    public function changeStatus($id,Request $request){
        $status['status'] = $request->input('status');//要修改的状态
        $res = DB::table('goods')->where('id','=',$id)->update($status);
        if ($res) {
        	if($status['status']==2){
        		// 2 下架
        		// 相关文章
        		 DB::table('article')->where('gid',$id)->update(['status'=>1]);

        		// 删除评论
        		$comment = DB::table('comment')->where('gid',$id)->get();
		        if ($comment->count()) {
		        	foreach ($comment as $key => $value) {
		        		DB::table('comment_reply')->where('comment_id',$value->id)->delete();
		        	}
		        }
		         // 删除评论
       			DB::table('comment')->where('gid',$id)->delete();
        	}elseif($status['status']==1){
        		// 1 商品上架
        		// 相关文章
        		 DB::table('article')->where('gid',$id)->update(['status'=>0]);
        	}


            echo 1;

        }else{
            echo 0;
        }
    }


}
