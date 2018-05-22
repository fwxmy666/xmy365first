@extends('layout.admin')

@section('title',$title)

@section('content')


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>exercise</title>
	<script type="text/javascript" src="/static/js/jquery-1.9.1.min_1.js"></script>
	<style>
		#pid{
			width:400px;
			height: 100px;
			border:0px solid blue;
			position:absolute;
			top:30px;
			left:50px;
		}
		#pid ul li{
			list-style: none;
			float: left;
			position: relative;
			top:-18px;
			left:-40px;
			
		}
		#pid ul li img{
				width: 100px;
				height: 100px;
				border:1px solid blue;
		}

		#uid{
			width: 400px;
			height: 100px;
			border:0px solid green;
			position:absolute;
			top:260px;
			left:50px;
		}
		
		#uid ul li{
			list-style: none;
			float: left;
			position: relative;
			top:-18px;
			left:-40px;
			
		}
		#uid ul li img{
				width: 100px;
				height: 100px;
				border:1px solid blue;
		}
		.url{
			width: 102px;
			height: 102px;
		}
		.urlss{
			display: block;
		}
	</style>
</head>
<body>
	
	<div id="pid">
		<ul style="display:block;">
			<li><img src="/uploads/special/8551_1526648389.jpg" alt=""></li>
			<li><img src="/uploads/special/8959_1526647303.jpg" alt=""></li>
			<li><img src="/uploads/special/9784_1526478317.gif" alt=""></li>
		</ul>
		<ul style="display:none;">
			<li><img src="/static/images/010105000204-001.jpg" alt=""></li>
			<li><img src="/uploads/special/7523_1526478124.png" alt=""></li>
			<li><img src="/static/images/010108011902-001.jpg" alt=""></li>
		</ul>
		<ul style="display:none;">
			<li><img src="/uploads/special/3764_1526478487.jpg" alt=""></li>
			<li><img src="/static/images/040300005102-001.jpg" alt=""></li>
			<li><img src="/static/images/020200010801-001.jpg" alt=""></li>
		</ul>
	</div>
	<div id='uid'>
		<ul class="sec-img">
			<li><img src="/uploads/special/1291_1526646338.jpg" alt=""></li>
			<li><img src="/uploads/special/2204_1526646206.jpg" alt=""></li>
			<li><img src="/uploads/special/2501_1526648704.jpg" alt=""></li>
		</ul>
	</div>

	
</body>
</html>

<script>

	var uid = document.getElementById('uid').getElementsByTagName('img');
	var pid = document.getElementById('pid').getElementsByTagName('ul');
	
	for(var i=0;i<uid.length;i++){
		
		
		uid[i].onmouseover = function(){
			var url = this.getAttribute('src');
			var y = this;
			//pid[i].style.display = 'block';
			//pid.eq(i).css('display','block');

			console.log(url,y);
		}
		

	}

	/*foreach(uid as $k=>$v){
		console.log($k);
	}*/


	//$('ul.level-2').children().css('background-color', 'red');
	/*$('#uid').mouseover(function(){
		var arr = $(this).find('img');
		var brr = $('#pid').find('ul');
		
		arr.eq(0).mouseover(function(){
				brr.eq(1).css('display','none');
				brr.eq(2).css('display','none');
				brr.eq(0).css('display','block');
				$(this).css('border','1px solid red');

			})
		arr.eq(0).mouseout(function(){
				
				$(this).css('border','1px solid blue');

			})

		arr.eq(1).mouseover(function(){
				brr.eq(0).css('display','none');
				brr.eq(2).css('display','none');
				brr.eq(1).css('display','block');
				
				$(this).css('border','1px solid red');

			})
		arr.eq(1).mouseout(function(){
				
				$(this).css('border','1px solid blue');

			})
		arr.eq(2).mouseover(function(){
				brr.eq(1).css('display','none');
				brr.eq(0).css('display','none');
				
				brr.eq(2).css('display','block');
				$(this).css('border','1px solid red');

			})
		arr.eq(2).mouseout(function(){
				
				$(this).css('border','1px solid blue');

			})

	})*/
	
</script>

@endsection