<?php

namespace App\Http\Controllers\admin\special;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class SpdmoreController extends Controller
{
    public function spdmore($id)
    {
    	
    	$res = DB::table('spdmore')->where('spmid',$id)->get();
    	
    	return view('admin/special/spdmore',['title'=>'详情显示页','res'=>$res]);
    }

    public function lian()
    {
    	
    	return view('admin/special/lian',['title'=>'练习']);
    }




}
