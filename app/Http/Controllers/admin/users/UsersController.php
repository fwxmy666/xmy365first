<?php

namespace App\Http\Controllers\admin\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;


class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //echo 'dksjglaskd';
       //$num = $request->input('num');
      // $search = $request->input('search');

       $arr = $request->all();
      
       //$res = DB::table('users')->paginate(5);
        $res = DB::table('users')->
        where('uname','like','%'.$request->input('search').'%')->
        paginate($request->input('num',10));

        $num = $request->input('num');
        $search = $request->input('search');

        //dd($res);
       return view('admin/users/index',[
        'title'=>'用户列表页',
        'num'=>$num,
        'search'=>$search,
        'res'=>$res,
        'request'=>$arr
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        


        return view('admin.users.create',['title'=>'添加页面']);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
           // echo 'dssldkjksd';
        //接收传过来的数据
        $res = $request->all();
        //dd($res);
       

        $res = $request->except('_token','repassword');

        //$res['password'] = Hash::make($request->input('password'));
        $pass = $request->input('password');

        $res['password'] = Hash::make($pass);
         $res['stime'] = time();


         $data = DB::table('users')->insert($res);

         if($data){

            return redirect('admin/users');
            //dd($data);
         } else {
            return back();
         }

        /*echo '<pre>';
        var_dump($res);*/
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($uid)
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
        //echo 'dafas';

        $res = DB::table('users')->where('uid',$id)->first();
        $status = $res->status;
        //var_dump($status);die;
       
        return view('admin.users.edit',['title'=>'修改页面','res'=>$res,'status'=>$status]);
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
        //echo 'daklfdf';
        //$res = $request->all();
        $data = $request->except('_method','_token');
       
        $foo = DB::table('users')->where('uid',$id)->update($data);
        if($foo){
            return redirect('admin/users');
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
    public function destroy($uid)
    {
        //echo 'dkagjaksg';
        
        $data = DB::table('users')->where('uid',$uid)->delete();
        if($data){
            return redirect('admin/users');
        } else {
            return back();
        }



    }
}
