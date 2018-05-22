@extends('layout.admin')

@section('title',$title)
@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span><i class="icon-table"></i>{{$title}}</span>
    </div>

    <div class="mws-panel-body no-padding">
        <div role="grid" class="dataTables_wrapper" id="DataTables_Table_1_wrapper">

        	<form action="" >
        	<div id="DataTables_Table_1_length" class="dataTables_length">
        		<label>显示
        			
	        		<select name="num" size="1" aria-controls="DataTables_Table_1">

	        			
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
                	<th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 38px;" aria-sort="ascending" aria-label="Rendering engine: activate to sort column descending">SID</th>

                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 160px;" aria-label="Browser: activate to sort column ascending">活动名称</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 180px;" aria-label="Browser: activate to sort column ascending">推广商家</th>

                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">推广商品名称</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 126px;" aria-label="CSS grade: activate to sort column ascending">商品编号</th>
                	
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 186px;" aria-label="CSS grade: activate to sort column ascending">商品单价</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 186px;" aria-label="CSS grade: activate to sort column ascending">商品规格</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 186px;" aria-label="CSS grade: activate to sort column ascending">商品图片</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 186px;" aria-label="CSS grade: activate to sort column ascending">商品产地</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 186px;" aria-label="CSS grade: activate to sort column ascending">配送范围</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 186px;" aria-label="CSS grade: activate to sort column ascending">商品库存</th>
                    <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 186px;" aria-label="CSS grade: activate to sort column ascending">存储方式</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 186px;" aria-label="CSS grade: activate to sort column ascending">时间</th>
                	<th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" style="width: 186px;" aria-label="CSS grade: activate to sort column ascending">操作</th>
                </tr>
            </thead>
            
        <tbody role="alert" aria-live="polite" aria-relevant="all">
				
				
				@foreach($res as $k=>$v)
        		<tr class="">
                    <td class="">{{$v->id}}</td>
                    <td class="">{{getName($v->pid)}}</td>
                    <td class="">{{$v->scompany}}</td>
                    <td class="">{{$v->sname}}</td>
                    <td class="">{{$v->number}}</td>
                    <td class="">{{$v->sprice}}</td>
                    <td class="">{{$v->standard}}</td>
                    
                    <td class=""><img src="{{$v->spicture}}" style="width:100px;height:100px" alt=""></td>
                   
                 	<td class="">{{$v->saddres}}</td>
                 	<td class="">{{$v->srange}}</td>
                    <td class="">{{$v->ssum}}</td>
                 	<td class="">{{$v->store}}</td>
                 	
                    <td class="">{{date('Y-m-d H:i:s',$v->stime)}}</td>
           
                    <td class=" " >

                        <a href="/admin/special/{{$v->id}}/spde" ><button class='btn btn-primary'>多张</button></a>
                    	<a href="/admin/special/{{$v->id}}/spdmore" ><button class='btn btn-primary'>详情</button></a>
                    	<a href="/admin/special/{{$v->id}}/edit" ><button class='btn btn-primary'>修改</button></a>

                    	 
                    	
                    	<form action="/admin/special/{{$v->id}}" method="post" style='display:inline'>
								{{method_field('DELETE')}}
								{{csrf_field()}}
								<button class='btn btn-danger'>删除</button>
                    	</form>
                    </td>

                </tr>
                @endforeach

               </tbody></table>

				
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

