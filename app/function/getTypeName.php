<?php 
	
	function getName($pid)
	{
		if($pid == '0'){
			return '顶级分类';
		} else {
			$res = DB::table('spcate')->where('id',$pid)->first();
			$name = $res->cname;
			return $name;
		}
	}



 ?>
