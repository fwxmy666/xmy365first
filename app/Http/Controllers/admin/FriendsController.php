<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;

class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //echo 'sdakal';
        $res = DB::table('friends')->paginate(5);
        return view('admin.friends.index',['title'=>'浏览链接','res'=>$res]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       // echo 'dgkasd';

        return view('admin.friends.create',['title'=>'添加链接']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //dd($request->all());

        
        if($request->hasFile('url')){
            $fname = rand(1111,9999).'.'.time();
            $suffix = $request->file('url')->getClientOriginalExtension();
            $path = $request->file('url')->move('./uploads/friends/',$fname.'.'.$suffix);

        }
        $res = $request->except('_token','url');

        $res['time'] = time();
        $res['urls'] = '/uploads/friends/'.$fname.'.'.$suffix;
        $data = DB::table('friends')->insert($res);

        if($data){
            return redirect('admin/friends');
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
        $res = DB::table('friends')->where('id',$id)->first();
        return view('admin.friends.edit',['title'=>'修改友情链接','res'=>$res]);
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
        //dd($request->all());

        $frires = DB::table('friends')->where('id',$id)->first();
        $friurls = $frires->urls;
        //dd($friurls);
        //有图片传过来就保存现在图片删除原来图片
        if($request->hasFile('url')){
            //删除原来图片
            //dd($friurls);
            unlink('.'.$friurls);

            $fname = rand(1111,9999).'.'.time();
            $suffix = $request->file('url')->getClientOriginalExtension();
            $path = $request->file('url')->move('./uploads/friends/',$fname.'.'.$suffix);

            
            $friurls = '/uploads/friends/'.$fname.'.'.$suffix;
            //dd($friurls);
        }

        


        //没有图片传过来 就用原来的图片
        $res = $request->except('_token','_method','url');
        
       /* //第二种方法
        if($res['url']){
            unset($res['url']);

        }*/
        
        $res['urls'] = $friurls;
        $res['time'] = time();
        //dd($res);

        $data = DB::table('friends')->where('id',$id)->update($res);

        if($data){
            return redirect('admin/friends');
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
        //echo 'kdsgsg';
        $res = DB::table('friends')->where('id',$id)->first();
        $urls = $res->urls;
       
        unlink('.'.$urls);
        $data = DB::table('friends')->where('id',$id)->delete();
        if($data){
            return redirect('admin/friends');
        } else {
            return back();
        }

    }
}
