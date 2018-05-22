<?php

namespace App\Http\Controllers\admin\special;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use DB;


class SpdetailsController extends Controller
{
    public function spde($id)
    {
    	
    	$res = DB::table('spdetails')->where('spid',$id)->get();
    	return view('admin/special/spde',['title'=>'多图显示页','res'=>$res]);
    }
}
