<?php

namespace App\Http\Controllers\admin\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Hash;
use DB;

class AjaxController extends Controller
{
   public function checkuname(Request $req)
    {
        //第一种方式获取值
        //$uname = $_GET['uname'];
    	//第二种方式获取值
    	$uname = $req->get('uname');
    	
    	//$uname = $res->param('uname');//这种方式也不行啊
    	
    	//$uname = input('get.uname'); //这种方式不行啊
    	//echo $uname;

    	$res = DB::table('users')->where('uname',$uname)->first();
   		//echo json_encode($res);
   		//var_dump($res);
    	if($res){
    		echo 1;
    	} else {
    		echo 0;
    	}

    }


    public function index($uid)
    {

        $did = $uid;
       $res = DB::table('details')->where('did',$did)->first();
      /* echo '<pre>';
       var_dump($res);*/


        return view('admin/usersdetails/index',['title'=>'详情','res'=>$res]);
    }

    public function upword(Request $request ,$uid)
    {

        //dd($uid);
      $res = DB::table('users')->where('uid',$uid)->first();

     // $password = decrypt($res->password);//报错The payload is invalid.
      //decrypt 这个命令不能起作用
        return view('admin/users/upword',['res'=>$res,'title'=>'修改密码']);

    } 

    public function changepass(Request $req)
    {
      //dd($req->input('oldpassword'));

      $oldpassword = $req->input('oldpassword');

      $res = DB::table('users')->where('uid',session('uid'))->first();

      //哈希
      if(!Hash::check($oldpassword,$res->password)){
 
        return back()->with('msg','输入的旧密码错误');
      }

      //获取新密码
      $password = $req->input('password');

      $reg = '/^\S{6,12}$/';

      if(!preg_match($reg,$password)){
          return back()->with('msg','密码格式错误');
      }
     
      $repassword = $req->input('repassword');
      if($repassword != $password){
        return back()->with('msg','前后密码不一致');
      }


      $foo['password'] = Hash::make($req->input('password'));

      $data = DB::table('users')->where('uid',session('uid'))->update($foo);

      if($data){

        return redirect('admin/index');
      }
      
    }



}
