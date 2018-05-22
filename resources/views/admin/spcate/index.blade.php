@extends('layout.admin')

<meta name="csrf-token" content="{{ csrf_token() }}">

@section('title',$title)


@section('content')
<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>{{$title}}</span>
    </div>
	
    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

        	<form action="/admin/category" method='get'>
        	<div id="DataTables_Table_1_length" class="dataTables_length">
        		<label>显示
        			
	        		<select name="num" size="1" aria-controls="DataTables_Table_1">

	        			<option value="10"></option>
     			
	        		</select> 条数据
        		</label>
        	</div>

        	<div class="dataTables_filter" id="DataTables_Table_1_filter">
    			<label>关键字: 
    				<input type="text" name='search' aria-controls="DataTables_Table_1" value="">
    			</label>

    			<button class='btn btn-info'>搜索</button>
    		</div>



    		</form>

        <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
            <thead>
                <tr role="row">
                	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 198px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">ID</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 180px;" aria-label="Browser: activate to sort column ascending">分类名</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 247px;" aria-label="Platform(s): activate to sort column ascending">父级id</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 170px;" aria-label="Engine version: activate to sort column ascending">path</th>
                	
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
                </tr>
            </thead>
            
        <tbody role="alert" aria-live="polite" aria-relevant="all">
				
				@foreach($res as $k => $v)

        		<tr class="
					@if($k % 2 == 1) 
						odd 
					@else
						even
					@endif 

        		">
                    <td class="">{{$v->id}}</td>
                    <td class="uname">{{$v->cname}}</td>
                    
                    <td class=" ">{{getName($v->pid)}}</td>
                    <td class=" ">{{$v->path}}</td>
                    
                    
                    <td class=" ">
                    	<a href="/admin/spcatedetails/{{$v->id}}"><button class='btn btn-primary'>详情</button></a>
                    	<a href="/admin/spcate/{{$v->id}}/edit"><button class='btn btn-primary'>修改</button></a>

                    	
                    	<!-- <a href="" class='btn btn-danger'>删除</a> -->
						<form action="/admin/spcate/{{$v->id}}" method='post' style='display:inline'>
							{{csrf_field()}}
							{{method_field('DELETE')}}
							<button class='btn btn-danger'>删除</button>

						</form>

                    </td>

                </tr>
             
                @endforeach

               </tbody></table><div class="dataTables_info" id="DataTables_Table_1_info">Showing 1 to 10 of 57 entries</div>
				
				<style>
					.pagination li{
						float: left;
					    height: 20px;
					    padding: 0 10px;
					    display: block;
					    font-size: 12px;
					    line-height: 20px;
					    text-align: center;
					    cursor: pointer;
					    outline: none;
					    background-color: #444444;
					   
					    text-decoration: none;
					    border-right: 1px solid #232323;
					    border-left: 1px solid #666666;
					    border-right: 1px solid rgba(0, 0, 0, 0.5);
					    border-left: 1px solid rgba(255, 255, 255, 0.15);
					    -webkit-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
					    -moz-box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);
					    box-shadow: 0px 1px 0px rgba(0, 0, 0, 0.5), inset 0px 1px 0px rgba(255, 255, 255, 0.15);

					}

					.pagination li a{
 					color: #fff;
					}

					.pagination .active{
					background-color: #88a9eb;
					color: #323232;
				    border: none;
				    background-image: none;
				    box-shadow: inset 0px 0px 4px rgba(0, 0, 0, 0.25);
					}

					.pagination .disabled{

						color: #666666;
    					cursor: default;
					}

					

					.pagination{
						margin:0px;
					}
				
				</style>

               <div class="dataTables_paginate paging_full_numbers" id="DataTables_Table_1_paginate">
					{{$res->links()}}
               </div>
    </div>
</div>

@endsection

@section('js')
<script>

	$.ajaxSetup({
	    headers: {
	        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	    }
	});
	
	//修改用户名
	$('.uname').dblclick(function(){
		//获取中间的文本
		var um = $(this).text().trim();

		//创建input
		var ipn = $('<input type="text" />');
		//
		$(this).empty();
		$(this).append(ipn);

		ipn.val(um);

		ipn.focus();

		ipn.select();

		var td = $(this);

		ipn.blur(function(){

			//获取id
			var id = $(this).parents('tr').find('td').eq(0).text();

			//获取输入的值
			var username = ipn.val();

			//发送ajax
			$.post('/admin/ajax',{id:id,username:username},function(data){


				if(data == '1'){

					//把td 中间的文本换成输入的值


					td.text(username);
				} else {

					td.text(um);
				}

			})



		})



	})



</script>


@endsection