<?php

namespace App\Http\Controllers\home;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;



class IndexController extends Controller
{
    //
    //
    public function index()
    {
        
        $spcate = DB::table('spcate')->get();

       // dd($spcate);
       /* $first = $spcate['0'];
        $id = $first->id;
        dd($id);*/
        
        $id = $spcate['0']->id;
       
        $special = DB::table('special')->where('pid',$id)->get();

    	$friends = DB::table('friends')->get();
        $lunboimg = DB::table('lunbo')->get();
       
        //dd($friends);
        return view('home.index',[
            'title'=>'香满园农产品商城',
            'lunboimg'=>$lunboimg,
            'friends'=>$friends,
            'spcate'=>$spcate,
            'special'=>$special
            ]);
    }

    public function list()
    {
    	//echo 'dagas';

        return view('home.goods.list',['title'=>'商品列表页']);

    }

    public static function getmessage()
    {
        $friends = DB::table('friends')->get();
        return $friends;
    }
    
    //特价商品栏鼠标移入获取数据
    public function spajax(Request $request)
    {
       // echo 66666666;
      //  $cname = $request->input('cname');

       // $spres = DB::table('spcate')->where('cname',$cname)->first();

        //$id = $spres->id;
       // $res = DB::table('special')->where('pid',$id)->get();

        $id = $request->input('id');
        //$res = DB::table('special')->where('pid',$id)->get();
        $res = DB::table('special')->where('pid',$id)->orderBy('id')->limit(6)->get();

        return $res;

       // echo json_encode($res);
       // echo '<pre>';
        //var_dump($res);


    }  

    //特价商品详情页跳转
    public function spgoods($id)
    {
        $res = DB::table('spdetails')->where('spid',$id)->get();
        $data = DB::table('spdmore')->where('spmid',$id)->get();
        $special = DB::table('special')->where('id',$id)->first();
         //dd($special);
        return view('home/special/spdetails',[
            'title'=>'特价商品详情页',
            'res'=>$res,
            'data'=>$data,
            'special'=>$special
            ]);
    }


}
