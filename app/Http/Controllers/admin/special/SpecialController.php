<?php

namespace App\Http\Controllers\admin\special;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;



class SpecialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $res = DB::table('special')->paginate(5);
        return view('admin.special.index',['title'=>'特价商品浏览','res'=>$res]);
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
        return view('admin.special.create',['title'=>'添加特价商品','res'=>$res]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        //dd($res);
        //处理首页图片单张
        if($request->hasFile('simg')){
            $name = rand(1111,9999).'_'.time();
            $suffix = $request->file('simg')->getClientOriginalExtension();
            $spath = $request->file('simg')->move('./uploads/special/',$name.'.'.$suffix);
        }

        
        $res = $request->except('_token','simg','mimg','spdm');
        $res['spicture'] = '/uploads/special/'.$name.'.'.$suffix;
        $res['stime'] = time();

        //dd($res);
        $spid = DB::table('special')->insertGetId($res);
       
        //dd($spid);
       //多张轮播图片的处理
        if($request->hasFile('mimg')){
            $mimgs = $request->file('mimg');
            //dd($mimgs);
            $mmgs = [];
            foreach ($mimgs as $k => $v) {
                $mname = rand(1111,9999).'_'.time();
                $msuffix = $v->getClientOriginalExtension();
                $v->move('./uploads/spdetails/',$mname.'.'.$msuffix);
                $mg['spid'] = $spid;
                $mg['spie'] = '/uploads/spdetails/'.$mname.'.'.$msuffix;
                $mg['sptime'] = time();
                //dd($mg);
                $mmgs[] = $mg;
            }

        }
        //dd($mmgs);
        DB::table('spdetails')->insert($mmgs);

        //多张详情图片的处理
        if($request->hasFile('spdm')){
            $spdms = $request->file('spdm');
            //dd($mimgs);
            $spg = [];
            foreach ($spdms as $k => $v) {
                $spname = rand(1111,9999).'_'.time();
                $msuffix = $v->getClientOriginalExtension();
                $v->move('./uploads/spdmore/',$spname.'.'.$msuffix);
                $mg['spmid'] = $spid;
                $mg['spmimg'] = '/uploads/spdmore/'.$spname.'.'.$msuffix;
                $mg['spmtime'] = time();
                unset($mg['spid']);
                unset($mg['spie']);
                unset($mg['sptime']);
               // dd($mg);
                $spg[] = $mg;
            }

        }

        //dd($spg);
        $sfoo = DB::table('spdmore')->insert($spg);
        if($sfoo){
            return redirect('admin/special');
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
        dd($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
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



        $data = DB::table('special')->where('id',$id)->first();

        return view('admin/special/edit',['title'=>'修改特价商品','res'=>$res,'data'=>$data]);
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       // dd($id);
        //先删除图片 ，再删除数据
        
        //1,删除spdetails 的图片 
        $spdetails = DB::table('spdetails')->where('spid',$id)->get();

        if($spdetails){
             foreach($spdetails as $k=>$v){

                    $src = $v->spie;
                    unlink('.'.$src);

                    //dd($v->spie);
                }
               // dd($spdetails);
        }
       
       $foo = DB::table('spdetails')->where('spid',$id)->delete();

       //删除spdmore  中的图片
       
       $spdmore = DB::table('spdmore')->where('spmid',$id)->get();

        if($spdmore){
             foreach($spdmore as $k=>$v){

                    $src = $v->spmimg;
                    unlink('.'.$src);

                    
                }
               
        }

        $info = DB::table('spdmore')->where('spmid',$id)->delete();

        //删除special 中的图片
        
        $special = DB::table('special')->where('id',$id)->get();

        //dd($special);
        if($special){
             foreach($special as $k=>$v){

                    $src = $v->spicture;
                    unlink('.'.$src);

                    
                }
               
        }

        $infoo = DB::table('special')->where('id',$id)->delete();
        
        if($infoo){
            return redirect('admin/special');
        } else {
            return back();
        }

    }
}
