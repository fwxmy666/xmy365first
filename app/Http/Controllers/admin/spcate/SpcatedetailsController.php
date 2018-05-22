<?php

namespace App\Http\Controllers\admin\spcate;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class SpcatedetailsController extends Controller
{
    public function index($id)
    {
    	$res = DB::table('special')->where('pid',$id)->paginate(6);
    	//dd($res);
    	return view('admin/spcate/spcatedetails',['title'=>'详情显示页','res'=>$res]);
    }


}
