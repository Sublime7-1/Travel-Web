<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\InsuranceRequest;

class InsuranceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        if ($request->has('keyword')) {
        	$data = \App\Models\Insurance::where('name','like','%'.$request->input('keyword').'%')->paginate(2);
        	$num = \App\Models\Insurance::where('name','like','%'.$request->input('keyword').'%')->get()->count();
        }else{
        	$data = \App\Models\Insurance::paginate(2);
        	$num = \App\Models\Insurance::get()->count();

        }
        $i=1;
        return view('admin.insurance.index',['data'=>$data,'i'=>$i,'num'=>$num,'request'=>$request]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.insurance.add');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(InsuranceRequest $request)
    {
        //
        $data = $request->except('_token');
        $res = \DB::table('insurance')->insert($data);
        if ($res) {
            $request->session()->flash('tips_code',6);
            return redirect('/admin/insurance')->with('insurance_msg','添加成功');
        }else{
            $request->session()->flash('tips_code',5);
            return back()->with('insurance_msg','添加失败');
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
        $data = \DB::table('insurance')->where('id',$id)->first();
        // dd($data);
        return view('admin.insurance.edit',['data'=>$data]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(InsuranceRequest $request, $id)
    {
        //
        $data = $request->except('_method','_token');
        $res = \DB::table('insurance')->where('id',$id)->update($data);
        if ($res) {
            $request->session()->flash('tips_code',6);
            return redirect('/admin/insurance')->with('insurance_msg','修改成功');
        }else{
            $request->session()->flash('tips_code',5);
            return back()->with('insurance_msg','修改失败');
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
        $res = \DB::table('insurance')->where('id',$id)->delete();
        if ($res) {
            echo 1;
        }else{
            echo 0;
        }
    }
}
