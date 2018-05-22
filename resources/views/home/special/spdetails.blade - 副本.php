@extends('layout.home')

@section('title',$title)
 
@section('content')


<!DOCTYPE html>
<html>
  <head>
  	<title>{{$title}}</title>
	



<meta charset="utf-8">




	<link rel="stylesheet" type="text/css" href="static/css/goods_detail_1.css">
	<!-- <link rel="stylesheet" href="static/css/main_1.css" /> -->
	<link rel="stylesheet" href="static/css/cartscroll_1.css" />
	<link rel="stylesheet" href="static/css/idangerous.swiper2.7.6_1.css" />
  </head>
  
  <body>




 	<!--内容部分-->
<div class="container-white">
	<input type="text" value="2018/05/07 20:46:43" style="display: none;" id="daoji"/>
	<input type="hidden" id="isLogin" value="1">
	<input type="hidden" id="actiId" value="0"/>
	<input type="hidden" id="typeId" value="0"/> <!-- 活动类型 -->
	<input type="hidden" id="isby" value=""/>
	<input type="hidden" id="isPutway" value="0">
	<input type="hidden" id="activityTypeId" value=""><!--限时限量活动类型  判断如何倒计时的 -->
	<div class="content w-1250">
		<div class="head-top">
			<a href="elastic/goods?typeName=水果" style="color:black;"><span class="generalities" style="cursor: pointer;">水果</span></a>>
			<a href="elastic/goods?typeName=国产水果,水果" style="color:black;"><span style="cursor: pointer;">国产水果</span></a>>
			<a href="elastic/goods?typeName=苹果,国产水果,水果" style="color:black;"><span style="cursor: pointer;">苹果</span></a>
		</div>
		
		
		
		<div class="chunk">
			<div class="chunk-left">
				<div class="fdj-wrap">
					<div class="preview">
						<div class="state-img">
							<!-- 商品水印图片 -->					
						</div>
						<div id="vertical" class="bigImg">

							
							<img src="static/picture/010101000101-001_1.jpg" alt="" width="400" height="400" style="margin: 10px;" id="midimg"  />

							<div style="display:none;" id="winSelector"></div>

						</div><!--bigImg end-->

						<div class="smallImg">

							<div class="scrollbutton smallImgUp disabled"></div>

							<div id="imageMenu">

								<ul>

										@foreach($res as $k=>$v)
										<li style="float:left;"><img src="{{$v->spie}}"  width="72" alt="" /></li>
										@endforeach
										
										<div class="clearfix"></div>

								</ul>

							</div>

							<div class="scrollbutton smallImgDown"></div>

						</div><!--smallImg end-->

						<div id="bigView" style="display:none;"><img width="800" height="800" alt="" src="" /></div>

					</div>
					
				</div>
				<div class="clearfix or-shop"><span id="bookMark" style="cursor: pointer; color: #999;" value="173" tname=",国产水果,"><i class="iconfont">&#xe88b;</i> 收藏商品<span></span></span><span class="pull-right"></span></div>
			</div>
			<div class="chunk-center">
				<h2 class="titled" style="position:relative">
					<span id="goodsName" title="[金龙乡果业] 甘肃静宁红富士(中果) 2个/盒(约400g)">{{$data->sname}}</span>
					
				</h2>
				<div class="pMsg">
					<ul class="clearfix">
						<li>
						<p style="font-size: 17px;">
							<span>销售价</span>￥
							<a id="activityPrice">
								
								{{$data->sprice}}
							</a>/盒 
						</p>
						</li>
						
					</ul>
				</div>
				<div class="xsum">
					<ul class="clearfix">
						<li>
							<p class="tit">
							
							67
							</p>
							<p>累计销量</p>
						</li>
						<li>
							<p class="tit">
								{{$data->ssum}}
								
							</p>
							<p>累计评价</p>
						<div class="xinD"><span style="width:98%"></span></div>
						</li>
						<li class="end">
							<p class="tit">{{$data->sprice}}</p><p>送香满圆积分</p>
						</li>
					</ul>
				</div>
				<div class="qss">
					<p><span class="tit">商品编码</span><span>{{$data->number}}</span></p>
					<p><span class="tit">商家</span><span><a href="elastic/goods?typeName=金龙乡果业">{{$data->scompany}}</a></span></p>
					<p><span class="tit">配送范围</span>
					<span style="color:red;margin-left:-3px;">{{$data->srange}}</span></p>
					<p class="mt5"><span class="tit">商品产地</span><span style="position:relative;left:1px;">{{$data->saddres}}</span></p>
					
							<div class="mt5 spec">
								<span class="tit">商品规格</span>
									
									
									<div class="etalon-wrap">
									
									
										
										<a href="goods/173/0/0" class="etalon cur">{{$data->standard}}</a>
									
								
									</div>
									
							</div>
					

					
				</div>
				<div class="buysum clearfix"><span class="tit">购买数量</span><div class="gw_num"><em class="jian">-</em><input id="goodsNum" type="text" value="1" class="num"/><em class="add"><img src="static/picture/em-add_1.png" style="width:25px;height:25px;" /></em></div></div>
				<div class="ml20 mt15"><a href="javascript:void(0);" class="btn btn-success add-cart" id="goodsId" value="173"><i class="icon icon12"></i>加入购物车</a><a href="javascript:void(0);" class="btn btn-danger buy-now ml10" id="shopping">立即购买</a></div>
			</div>
			
			<!-- 看了又看 -->
			
		</div>
		<div class="content-details w-1250">
			<div class="clearfix">
				<div class="details-left">
					<div class="chunk-classify1">
						
					</div>
					
					
				</div>
				<div class="details-right">
					<div class="tab-navv">
						<ul>
							<li class="active">商品描述</li>
							<li onclick="getComment(173,1)">累计评价</li>
							<li onclick="getDeal(173,1)">最新成交记录</li>
						</ul>
					</div>
					<div class="tab-contentt">
						<div>
							<ul class="tab-con-top clearfix">
								<li class="ad-color-o" style="width:170px;">重庆水果市场品牌商品</li>
								<li style="margin-right:25px;">地址 : <span>菜园坝水果市场内香满圆</span></li>
								<li style="margin-right:40px;">商品 : <span>[金龙乡果业] 甘肃静宁红富士(中果) 2个/盒(约400g)</span></li>
								<li>包装方式 : <span>包装</span></li>
								<li style="width:170px;">重量/规格 : <span id="guige"></span></li>
								<li style="margin-right:25px;">包装 : <span>盒</span></li>
								<li style="margin-right:40px;">存储方式 : <span>冷藏</span></li>
								<li>商家 : <span>金龙乡果业</span></li>
							</ul>
							<div class="clearfix control-img"><p><img src="static/picture/010101000101-01_1.jpg"/><img src="static/picture/010101000101-02_1.jpg"/><img src="static/picture/010101000101-03_1.jpg"/><img src="static/picture/010101000101-04_1.jpg"/><img src="static/picture/010101000101-05_1.jpg"/></p><p><br/></p>
								
								<div class="descript-img"> <!-- 分类描述图 -->
									<img src="static/picture/水果_1.jpg"/>
								</div>
								<div class="container-img">
								<div class="container-tab">
									<div class="tab-sec">
										<ul class="clearfix">
											<li class="active">
												<div class="img-wrap img-wrap1"></div>
												<p>品牌市场 精心挑选</p>
											</li>
											<li>
												<div class="img-wrap img-wrap2"></div>
												<p>实物拍摄 所见所得</p>
											</li>
											<li>
												<div class="img-wrap img-wrap3"></div>
												<p>专业配送 新鲜直达</p>
											</li>
											<li>
												<div class="img-wrap img-wrap4"></div>
												<p>本土国企 值得信赖</p>
											</li>
										</ul>
									</div>
									<div class="tab-content-sec">
										<div>
											
											<img alt="" src="static/picture/ta_1.png">
										</div>
										<div>
											
											<img alt="" src="static/picture/tb_1.png">
										</div>
										<div>
											
											<img alt="" src="static/picture/tc_1.png">
										</div>
										<div>
											
											<img alt="" src="static/picture/td_1.png">
										</div>
									</div>
								</div>
							</div>
							
							
							
							</div>		
						</div>
						<div>
							<div id="comment"></div>
							<div style="text-align: right;">
								<div class="table-fy-right">
									<ul class="paging-ul">
										<li class="paged active" value="1">1</li>
										<li><i onclick="getComment(173,2)" class="iconfont" style="font-size:15px;color:#666">&#xe65b;</i></li>
									</ul>
								</div>
							</div>
						</div>
						<div>
							<div id="deal"></div>
							<div style="text-align: right;">
								<div class="table-fy-right">
									<ul class="paging-ul">
										<li class="paged active" value="1">1</li>
										<li><i onclick="getDeal(173,2)" class="iconfont" style="font-size:15px;color:#666">&#xe65b;</i></li>
									</ul>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
  

<script type="text/javascript" src="static/js/jquery-1.9.1.min_1.js"></script>
<script type="text/javascript" src="static/js/public_1.js"></script>

<script type="text/javascript" src="static/js/easydialog.min_1.js"></script>

<script type="text/javascript" src="static/js/laypage_1.js"></script>
<![if lt IE 9]>
  <script src="static/js/json_1.js" charset="utf-8"></script>
<![endif]>

<script src="static/js/json_1.js" charset="utf-8"></script>
<script src="static/js/5b0b424a2c984f5abcf1f3caed48eef9.js" charset="utf-8"></script>
<!-- 搜索js -->
<script type="text/javascript" src="static/js/goods_search_1.js"></script>




<div class="dialog-box" id="qian" style="display:none;border:1px solid #358812;">
  	<div id="title" style=" height: 30px; line-height:30px;font-size:13px;color:#444;border-bottom:1px solid #358812;background-image: linear-gradient(to bottom,#D1F5BF 50%,#bde9AB 50%);padding-left:15px;position:relative;background-color:#bde9ab;">
  	<i class="iconfont" style="margin-right:7px;font-size:16px;">&#xe650;</i>杨桃妹妹
  	<i id="close" class="iconfont" style="float:right;margin-right:15px;background:#FFF;color:#358812;font-size:12px;border:1px solid #358812;line-height:normal;padding:1px 2px;border-radius:3px;position:relative;top:7px;cursor: pointer;">&#xe676;</i></div>
</div>

  
<!--2017-10-31 新增顶部浮现搜索-->
<div class="floattop fadein">
	<div class="floattop-overlay"></div>
	<div class="floattop-content clearfix">
		<div class="floattop-logo">
			<img src="static/picture/minlogo_1.png" alt="">
			<div class="net-nav">
                        <ul>
                        	
                        		 
		                            <li>
		                                <p class="title" style="background:url(static/images/水果_1.png) no-repeat;background-postion:-20px;"><a href="category/findCategoryGoods?id=124" style="color: red;">水果</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=125">国产水果</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=128">进口水果</a></p>
		                                
		                            </li>
	                            
                            
                        		 
		                            <li>
		                                <p class="title" style="background:url(static/images/生鲜_1.png) no-repeat;background-postion:-20px;"><a href="category/findCategoryGoods?id=129" style="color: red;">生鲜食品</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=131">海鲜水产</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=132">活禽蛋类</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=133">精品肉类</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=134">精制品</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=135">菌类</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=136">腌腊制品</a></p>
		                                
		                            </li>
	                            
                            
                        		 
		                            <li>
		                                <p class="title" style="background:url(static/images/干果干副_1.png) no-repeat;background-postion:-20px;"><a href="category/findCategoryGoods?id=137" style="color: red;">干副干果</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=138">炒货</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=139">干果</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=140">干货</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=141">山珍菌类</a></p>
		                                
		                            </li>
	                            
                            
                        		 
		                            <li>
		                                <p class="title" style="background:url(static/images/粮油副食_1.png) no-repeat;background-postion:-20px;"><a href="category/findCategoryGoods?id=143" style="color: red;">粮油副食</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=144">调味品</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=145">方便速食</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=146">米面粮油</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=147">食用油</a></p>
		                                
		                            </li>
	                            
                            
                        		 
		                            <li>
		                                <p class="title" style="background:url(static/images/休闲零食_1.png) no-repeat;background-postion:-20px;"><a href="category/findCategoryGoods?id=148" style="color: red;">休闲零食</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=149">饼干糕点</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=151">蜜饯果脯</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=152">膨化食品</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=153">其他零食</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=154">肉类零食</a></p>
		                                
		                            </li>
	                            
                            
                        		 
		                            <li>
		                                <p class="title" style="background:url(static/images/酒水饮料_1.png) no-repeat;background-postion:-20px;"><a href="category/findCategoryGoods?id=156" style="color: red;">酒水饮料</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=157">白酒</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=158">牛奶乳制品</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=159">啤酒</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=160">葡萄酒</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=161">饮料/水</a></p>
		                                
		                            </li>
	                            
                            
                        		 
		                            <li>
		                                <p class="title" style="background:url(static/images/冲调茶饮_1.png) no-repeat;background-postion:-20px;"><a href="category/findCategoryGoods?id=162" style="color: red;">冲调茶饮</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=163">茶</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=164">冲调饮品/奶粉</a></p>
		                                
		                            </li>
	                            
                            
                        		 
		                            <li>
		                                <p class="title" style="background:url(static/images/生活日用_1.png) no-repeat;background-postion:-20px;"><a href="category/findCategoryGoods?id=172" style="color: red;">生活日用品</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=173">个人护理</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=174">清洁用品</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=175">纸品</a></p>
		                                
		                            </li>
	                            
                            
                        		 
                            
                        		 
		                            <li>
		                                <p class="title" style="background:url(static/images/跨境专区_1.png) no-repeat;background-postion:-20px;"><a href="category/findCategoryGoods?id=180" style="color: red;">跨境专区</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=181">家居生活</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=182">美妆个护</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=183">母婴用品</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=184">生活数码</a></p>
		                                
		                                	<p class="title"><a href="elastic/typeGoods?typeId=298">食品保健</a></p>
		                                
		                            </li>
	                            
                    
                            <li>
                                <p class="title" style="background:url() no-repeat;background-postion:-20px;"><a href="activity/findActivity?show=2" style="color: red;">热销活动</a></p>
                               	<p class="title"><a href="activity/findActivity#bing?show=2">冰点价</a></p>
                               	<p class="title"><a href="activity/findActivity#dayday?show=2">限时抢购</a></p>
                               	<p class="title"><a href="activity/findActivity#buy?show=2">买即赠</a></p>
                               	<p class="title"><a href="activity/findActivity#week?show=2">每周特惠</a></p>
                               	<p class="title"><a href="activity/findActivity#all?show=2">整件惠</a></p>
                            </li>
                        </ul>
                    </div>
		</div>
		<div class="floattop-search">
			<input type="text" id="topSearchContent">
			<button type="submit" id="topSearch">搜索</button>
		</div>
		<div class="commidi-icon"><img src="static/picture/ad-1_1.png" alt=""></div>
	</div>
</div>
<!--2017-10-31 新增顶部浮现搜索end-->
	

	<script type="text/javascript" src="/static/js/jquery-1.9.1.min_1.js"></script>

   <link href="/static/css/style_1.css" type="text/css" rel="stylesheet" />
   <link href="/static/css/cartscroll_1.css" type="text/css" rel="stylesheet" />
   <link href="/static/css/goods_detail_1.css" type="text/css" rel="stylesheet" />
  <script type="text/javascript" src="/static/js/goods_search_1.js"></script>
  <script type="text/javascript" src="/static/js/goods_detail_1.js"></script>
   <script type="text/javascript" src="/static/js/cartscroll_1.js"></script>
   <script type="text/javascript" src="/static/js/idangerous.swiper2.7.6.min_1.js"></script>
  <script src="/static/js/menu_1.js"></script>


  <script type="text/javascript">
  
  console.log("0")
	var isLogin = "1" ;
 	//收藏商品
	$("#bookMark").click(function(){
		if (isLogin == 1) {
			popMsg("登录过后才能收藏商品！");
			return ;
		}
		var goodsId = $(this).attr("value");//商品id
		var categoryName = $(this).attr("tname");//商品分类名称
		var activityType = $("#typeId").val(); //活动类型
		var activityId = $("#actiId").val(); //活动id
		$.ajax({
			url:"cart/addCollection",
			type:"post",
			data:{"goodsId":goodsId,"categoryName":categoryName,"activityType":activityType,"activityId":activityId},
			dataType: "JSON",
			success:function (data) {
				if (data == 1) {
					popMsg("收藏夹已存在该商品！");
				} else {
					$("#bookMark").css("color","#358912");
					popMsg("已加入收藏夹！");
				}
			}
		})
		
	})
	function popMsg(Msg){
		var btnFn = function(){
			easyDialog.close();
		}
		easyDialog.open({
			  container : {
			    header : '提示',
			    content : Msg,
			    yesFn : btnFn
			  }
		});
	}
	$(function(){
		var mySwiper = new Swiper ('.swiper-container', {

            direction: 'horizontal',
            height: 300,//你的slide高度
            width : 720,
            loop: true,
            slidesPerView : 4,
            simulateTouch : false,

            // 如果需要分页器
            //pagination: '.swiper-pagination',

            // 如果需要前进后退按钮

            // 如果需要滚动条
            //scrollbar: '.swiper-scrollbar',
        })
        $('.before').click(function(){
            mySwiper.swipePrev();
        })
        $('.next').click(function(){
            mySwiper.swipeNext();
        });
        /* 
        $(".smallImgDown").click(function(){
        	if($(this).prev().find("#imageMenu li").size()<6){
        		alert("s")
        	}
        }) */
        
        var goodsname="[金龙乡果业] 甘肃静宁红富士(中果) 2个/盒(约400g)";
        var guige=goodsname.substr(goodsname.lastIndexOf(' '),goodsname.length);
        $("#guige").text(guige);
	})
  </script>
  </body>
</html>


@endsection