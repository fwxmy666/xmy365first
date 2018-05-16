<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;
use Hash;
use Gregwar\Captcha\CaptchaBuilder;  
use Cache;
use Session;


class LonginController extends Controller
{
    public function index()
    {


    	return view('admin/index',['title'=>'后台首页']);
    }

    public function admin()
    {
    	return view('layout/admin');
    }

    public function look()
    {
    	return view('layout/login');
    }

    public function check(Request $request)
    {

    	//dd($request->all());
    	$uname = $request->input('username');
    	$password = $request->input('password');
        $yan = $request->input('yanzhengma');

        //获取验证码
        $captcha = Session::get('code');
        if($captcha == $yan){
                //dd($uname);
                $res = DB::table('users')->where('uname',$uname)->first();
                
                //验证表单是否有这个用户名
                if(!$res){
                    return back()->with('err','用户名或密码错误！！！');
                } 

                //decrypt($res->password)也可以解密
                //验证密码hash::check 解密
                if(!Hash::check($password,$res->password)){
                    return back()->with('err','用户名或密码错误！！！');
                }

               /* $uid = $res->uid;
                var_dump($uid);die;*/
                //存储session
                session(['uid'=>$res->uid]);
                
                
                return redirect('admin/index');
        } else {
            return  back()->with('msg','验证码错误');
        }



    	


    }

    public function loginout(Request $request ,$uid)
    {
        
        //echo 'dslgkals';

        $request->Session()->forget('uid');

        return redirect('layout/login');
    }



    //跳转到前台首页
    public function adhome(Request $request ,$uid)
    {
        $request->Session()->forget('uid');

        return redirect('/');
    }

    //后台登录验证码
    public function captcha($tmp)
    {
        //生成验证码图片的Builder对象，配置相应属性  
        $builder = new CaptchaBuilder;  
        //可以设置图片宽高及字体  
        $builder->build($width = 120, $height = 50, $font = null);  
        //获取验证码的内容  
        $phrase = $builder->getPhrase();  
        //把内容存入session  
        //Session::flash('code', $phrase);  

         //Session::put('code',$phrase);


         session(['code'=>$phrase]);


        // $request->session()->put('code',$pharse);


        //生成图片  
        header("Cache-Control: no-cache, must-revalidate");  
        header('Content-Type: image/jpeg');  
        $builder->output();
       
    }







}
