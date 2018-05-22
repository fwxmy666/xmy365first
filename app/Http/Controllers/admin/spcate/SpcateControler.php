<?php

namespace App\Http\Controllers\admin\spcate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;



class SpcateControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
         
        
         $res = DB::table('spcate')->
        select(DB::raw('*,concat(path,id) as path'))->
        orderBy('path')->paginate(10);
        
            
        foreach ($res as $k => $v) {
            $foo  = explode(',',$v->path);
            $counts = count($foo)-2;
            $v->cname = str_repeat('&nbsp;&nbsp;&nbsp;',$counts).'|--'.$v->cname;
        }

        return view('admin/spcate/index',['title'=>'浏览类别','res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $res = DB::table('spcate')->
        select(DB::raw('*,concat(path,id) as path'))->
        orderBy('path')->
        get();
            
        foreach ($res as $k => $v) {
            $foo  = explode(',',$v->path);
            $counts = count($foo)-2;
            $v->cname = str_repeat('&nbsp;&nbsp;&nbsp;',$counts).'|--'.$v->cname;
        }
        
        return view('admin/spcate/create',['title'=>'特价商品类别添加','res'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //表单验证 只有{{csrf_field()}}字符令牌 传过来的_token 认证不要
        $res = $request->except('_token');

       
        //添加顶级分类
        if($res['pid'] == '0'){
            $res['path'] = '0,';
        } else {
            $data = DB::table('spcate')->where('id',$res['pid'])->first();
            $res['path'] = $data->path.$data->id.',';
        }
        $info = DB::table('spcate')->insert($res);

        if($info){
            return redirect('admin/spcate');
        } else {
            return back();
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
        $data = DB::table('spcate')->where('id',$id)->first();
        if($data->pid != '0'){
            $res = DB::table('spcate')->where('id',$data->pid)->first();
        } else {

            $res = DB::table('spcate')->where('pid',$data->pid)->first();
            $res->id = '0';
            $res->cname = '顶级分类';
        }
        
       //dd($res);
        return view('admin/spcate/edit',['title'=>'修改类别','data'=>$data,'res'=>$res]);

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
        $data = DB::table('spcate')->where('id',$id)->first();
        $res['cname'] = $request->input('cname');
        $res['id'] = $data->id;
        $res['path'] = $data->path;
        $res['pid'] = $data->pid;
       // dd($res);

        $foo = DB::table('spcate')->where('id',$id)->update($res);
        if($foo){
            return redirect('admin/spcate');
        } else {
            return back();
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
        //$res = DB::table('spcate')->where('pid',$id)->first();

        //判断是否有子类
        $data = DB::table('spcate')->where('path','like','%,'.$id.',%')->delete();

        

        $foo = DB::table('spcate')->where('id',$id)->delete();

        if($foo){
            return redirect('admin/spcate');
        } else {
            return back();
        }
    }
}
