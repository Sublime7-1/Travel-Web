<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Navigate3;

class Navigate_ThirdController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // 查询顶级分类
        $top_cates = \DB::table('navigate_third')->where('pid',0)->paginate(10);
        $i=1;

        $currentPage = isset($_GET['page'])?$_GET['page']:1;
        $offset = ($currentPage-1)*10;
        return view('admin.navigate_third.index',['top_cates'=>$top_cates,'i'=>$i,'offset'=>$offset]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.navigate_third.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Navigate3 $request)
    {
        //
        dd($request->all());
        $data = $request->except('_token','addchild');
        $res = \DB::table('navigate_third')->insert($data);
        if ($res) {
              // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','添加成功');
          // layer提示成功的样式码
          $request->session()->flash('tips_code','6');
          // return redirect('/admin/NavigateThird')->with('success','添加成功');
          if($request->has('addchild')){
            return redirect('/admin/NavigateThird/'.$request->input('pid'))->with('success','添加成功');
          }else{
            return redirect('/admin/NavigateThird')->with('success','添加成功');
          }
        }else{
              // 将添加的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','添加失败');
          // layer提示成功的样式码
          $request->session()->flash('tips_code','5');
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
        $data = \App\Models\Navigate_Third::where('pid',$id)->paginate(10);

        // 当前页码
        $currentPage = isset($_GET['page'])?$_GET['page']:1;
        // 偏移量
        $offset = ($currentPage-1)*10;
        // 初始编号
        $i = 1;
        return view('admin.navigate_third.childlist',['data'=>$data,'pid'=>$id,'i'=>$i,'offset'=>$offset]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request,$id)
    {
        //
        $data = \DB::table('navigate_third')->where('id',$id)->first();

        // childlist 用来判断是否是修改子分类信息
        if($request->has('childlist')){
            $childlist = $request->input('childlist');
        }else{
            $childlist = 0;
        }
        
        return view('admin.navigate_third.edit',['data'=>$data,'childlist'=>$childlist]);
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
        $data['name'] = $request->input('name');
        $res = \DB::table('navigate_third')->where('id',$id)->update($data);
        if ($res) {
              // 将修改的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','修改成功');
          // layer修改成功的样式码
          $request->session()->flash('tips_code','6');

          // 判断是否是修改子分类
          if($request->has('childlist')){
             return redirect($request->input('childlist'))->with('success','添加成功');
          }else{
            return redirect('/admin/NavigateThird')->with('success','添加成功');
          }
  
        }else{
              // 将修改的结果添加到闪存,刷新后失效
          $request->session()->flash('navigate_msg','修改失败');
          // layer修改成功的样式码
          $request->session()->flash('tips_code','5');
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
        // 查询是否有子分类
        $data = \DB::table('navigate_third')->where('pid',$id)->first();
        if(count($data)>0){
            echo 2;
        }else{
            $res = \DB::table('navigate_third')->where('id',$id)->delete();
            if ($res) {
                echo 1;
            }else{
                echo 0;
            }
        }
    }

    // 展示添加子类页面
    public function addChild(Request $request,$id){
        $pid = $id;
        $parent = \DB::table('navigate_third')->where('id',$id)->first();
        $path = $parent->path.','.$id;

        // 判断是否是在当前分类中添加同父的兄弟
        if($request->has('childlist')){
            $childlist = $request->input('childlist');
        }else{
            $childlist = 0;
        }

        return view('admin.navigate_third.addchild',['pid'=>$pid,'path'=>$path,'childlist'=>$childlist]);
    }





}
