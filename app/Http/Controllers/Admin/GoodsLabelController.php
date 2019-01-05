<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use App\Models\GoodsLabel;
use App\Http\Requests\GoodsLabelRequest;

class GoodsLabelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

    	if($request->has('keyword')){
    		$keyword = $request->input('keyword');
    		$data = GoodsLabel::select(DB::raw('*,concat(path,",",id) as paths'))
        	->where('name','like','%'.$keyword.'%')
        	->orderBy('paths')
    	    ->orderBy('id')
	        ->paginate(3);
	        $num = GoodsLabel::select(DB::raw('*,concat(path,",",id) as paths'))->where('name','like','%'.$keyword.'%')->count();

    	}else{
    		$keyword = '';
    		$data = GoodsLabel::select(DB::raw('*,concat(path,",",id) as paths'))
	        ->orderBy('paths')
	        ->orderBy('id')
	        ->paginate(10);
	        $num = $data->count();
    	}

                
         // 当前页码
        $currentPage = isset($_GET['page'])?$_GET['page']:1;
        // 偏移量
        $offset = ($currentPage-1)*10;
        // 初始编号
        $i = 1;
        return view('admin.goodslabel.index',['data'=>$data,'num'=>$num,'i'=>$i,'offset'=>$offset,'request'=>$request->all(),'keyword'=>$keyword]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // 获取所有分类id和name
        $data = DB::table('goods_label')->select(DB::raw('*,concat(path,",",id) as paths'))->where('type','=',3)->orderBy('paths')->get();
        foreach($data as $k => $v){
            // 将path转换成数组
            $arr = explode(',',$v->path);
            // 获取层数
            $num = count($arr)-1;
            // 分类是第几层就在分类名前加几个--
            $data[$k]->name = str_repeat('--',$num).$v->name;
        }

        return view('admin.goodslabel.add',['data'=>$data]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodsLabelRequest $request)
    {
      // dd($request->all());
        // 获取数据
        $data = $request->except('_token');
        // 获取分类类型(品牌,接待商,正常分类)
        $type = $request->input('type');
        switch($type){
            case 1:
                $data['type'] = 1;//接待商
                break;
            case 2:
                $data['type'] = 2;//品牌
                break;
            case 3:
                $data['type'] = 3;//其他正常分类
                break;
        }

        // 判断是否是顶级分类
        if ($request->input('pid') == 0) {
            // path 路径为0
            $data['path'] = '0';
        }else{
            // 不是顶级分类，获取父分类的path
            $parent = DB::table('goods_label')->where('id','=',$request->input('pid'))->first();
            // 将父分类的path和id拼接
            $data['path'] = $parent->path.','.$parent->id;
        }
        
        // 添加操作
        $res = DB::table('goods_label')->insert($data);
        if ($res) {
            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','添加成功');
          // layer提示成功的样式码
          $request->session()->flash('tips_code','6');
          // 刷新父窗口页面
          return redirect('/admin/GoodsLabel')->with('success','添加成功');
        }else{
            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','添加失败');
          // layer提示失败的样式码
          $request->session()->flash('tips_code','5');
          $request->back()->with('error','添加失败');
          // 阻止提交
          return back()->with('error','添加失败');
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
        $data = DB::table('goods_label')->where('id','=',$id)->first();
        return view('admin.goodslabel.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodsLabelRequest $request, $id)
    {
        //
        $data = $request->except('_token','_method');
        $res = DB::table('goods_label')->where('id','=',$id)->update($data);
        if ($res) {
            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','添加成功');
          // layer提示成功的样式码
          $request->session()->flash('tips_code','6');
          
          return redirect('/admin/GoodsLabel')->with('success','添加成功');
        }else{
            // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','添加失败');
          // layer提示失败的样式码
          $request->session()->flash('tips_code','5');
          $request->back()->with('error','添加失败');
          // 阻止提交
          return back()->with('error','添加失败');
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
        // 查询是否有子类
        $data = DB::table('goods_label')->where('pid','=',$id)->first();
        if (count($data)>0) {
            // 有子类不能删除
            echo 2;
        }else{
            $res = DB::table('goods_label')->where('id','=',$id)->delete();
            if ($res) {
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    // 更改分类状态
    public function changeStatus(Request $request,$id){
        // 获取当前分类的状态码
        $status = $request->input('status');
        // 获取修改的状态码
        $data['is_display'] = $status==1 ? 2 : 1;
        // 更新数据
        $res = DB::table('goods_label')->where('id','=',$id)->update($data);
        if ($res) {
            echo 1;
        }
    }

}
