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
    	$friends = DB::table('friends')->get();
        $lunboimg = DB::table('lunbo')->get();
        //dd($friends);
        return view('home.index',['title'=>'香满园农产品商城','lunboimg'=>$lunboimg,'friends'=>$friends]);
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
    


}
