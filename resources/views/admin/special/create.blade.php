@extends('layout.admin')

@section('title',$title)

@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
    <div class="mws-panel-body no-padding">
		
		@if (count($errors) > 0)
		    		<div class="mws-form-message error">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li style='color:blue;font-size:17px;list-style:none'>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif


		


    	<form action="/admin/special" method='post' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">

                 <div class="mws-form-row">
                    <label class="mws-form-label">活动名称</label>
                    <div class="mws-form-item">

                        <select name='pid' class="small">
                            <option value='0'>请选择</option>

                            @foreach($res as $k=>$v)
                            <option value='{{$v->id}}'>{{$v->cname}}</option>
                            @endforeach

                        </select>

                    </div>
                </div>



                <div class="mws-form-row">
                    <label class="mws-form-label">推广商家</label>
                    <div class="mws-form-item" style="display:inline">
                        <input type="text" name='scompany' class="small">
                        
                    </div> 
                </div>
    		    <div class="mws-form-row">
                    <label class="mws-form-label">推广商品名称</label>
                    <div class="mws-form-item" style="display:inline">
                        <input type="text" name='sname' class="small">
                        
                    </div> 
                </div>
                <div class="mws-form-row">
                    <label class="mws-form-label">商品编码</label>
                    <div class="mws-form-item" style="display:inline">
                        <input type="text" name='number' class="small">
                        
                    </div> 
                </div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">单价</label>
    				<div class="mws-form-item" style="display:inline">
    					<input type="text" name='sprice' class="small">
                        
    				</div>
    			</div>

    			
                

                <div class="mws-form-row">
                    <label class="mws-form-label">商品规格</label>
                    <div class="mws-form-item" style="display:inline">
                        <input type="text" name='standard' class="small">
                        
                    </div> 
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">商品首页单张图片</label>
                    <div class="mws-form-item" style="display:inline">
                        <input type="file" name='simg' multiple readonly="readonly" style="width: 30%;" class="fileinput-preview" placeholder="No file selected...">
                        
                    </div> 
                </div>

                

                <div class="mws-form-row">
                    <label class="mws-form-label">商品轮播多张图片</label>
                    <div class="mws-form-item" style="display:inline">
                        <input type="file" name='mimg[]' multiple readonly="readonly" style="width: 30%;" class="fileinput-preview" placeholder="No file selected...">
                        
                    </div> 
                </div>

                 <div class="mws-form-row">
                    <label class="mws-form-label">商品详情多张图片</label>
                    <div class="mws-form-item" style="display:inline">
                        <input type="file" name='spdm[]' multiple readonly="readonly" style="width: 30%;" class="fileinput-preview" placeholder="No file selected...">
                        
                    </div> 
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">商品产地</label>
                    <div class="mws-form-item" style="display:inline">
                        <input type="text" name='saddres' class="small">
                        
                    </div> 
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">配送范围</label>
                    <div class="mws-form-item" style="display:inline">
                        <input type="text" name='srange' class="small">
                        
                    </div> 
                </div>

                <div class="mws-form-row">
                    <label class="mws-form-label">商品库存</label>
                    <div class="mws-form-item" style="display:inline">
                        <input type="text" name='ssum' class="small">
                        
                    </div> 
                </div>
                
                <div class="mws-form-row">
                    <label class="mws-form-label">存储方式</label>
                    <div class="mws-form-item" style="display:inline">
                        <input type="text" name='store' class="small">
                        
                    </div> 
                </div>

               
             </div>
    		<div class="mws-button-row">
            
    			{{csrf_field()}}
    			<input type="submit" class="btn btn-danger" value="提交">
    			
    		</div>
    	</form>


    </div>    	
</div>

@endsection


