@extends('layout.admin')

@section('title',$title)

@section('content')

<div id='dvs'style="width:500px;height:50px;border:0px solid blue;text-align:center;font-size:25px;line-height:50px;margin-left:250px;margin-top:150px;"></div>

<div style="width:500px;height:50px;border:0px solid blue;text-align:center;font-size:25px;line-height:50px;margin-left:250px;margin-top:50px;">
	香满园365欢迎您！！！
</div>
@endsection

@section('js')
	<script>
		var dvs = document.getElementById('dvs');
		setInterval(function(){


				var dd = new Date();
				var y  = dd.getFullYear();
				var m = dd.getMonth()+1;
				if(m < 10){
					m = '0'+m;
				}
				var d = dd.getDate();
				if(d < 10){
					d = '0'+d;
				}
				var h = dd.getHours();
				if(h < 10){
					h = '0'+h;
				}
				var i = dd.getMinutes();
				if(i < 10){
					i = '0'+i;
				}
				var s = dd.getSeconds();
				if(s < 10){
					s = '0'+s;
				}

				var weekd = dd.getDay();

				switch(weekd){
					case 0: weekd = '星期日';break;
					case 1: weekd = '星期一';break;
					case 2: weekd = '星期二';break;
					case 3: weekd = '星期三';break;
					case 4: weekd = '星期四';break;
					case 5: weekd = '星期五';break;
					case 6: weekd = '星期六';break;
				}

				dvs.innerHTML = y+'年'+m+'月'+d+'日'+h+'时'+i+'分'+s+'秒'+weekd;
				//console.log(weekd);




		//alert($);
		},1000)
	</script>
@endsection