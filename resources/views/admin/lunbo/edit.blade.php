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


		


    	<form action="/admin/lunbo/update/{{$res->lid}}" method='get' class="mws-form" enctype='multipart/form-data'>
    		<div class="mws-form-inline">

    		<div class="mws-form-row">
                    <label class="mws-form-label">图片名称</label>
                    <div class="mws-form-item" style="display:inline">
                        <input type="text" name='lname' class="small" vlaue="{{$res->lname}}">
                        
                    </div>
            </div>

			<div class="mws-form-row">
				<label class="mws-form-label">选择商品图片</label>
				<div class="mws-form-item">
					<input type="file" name='gimg' multiple readonly="readonly" style="width: 30%; padding-right: 85px;" class="fileinput-preview" placeholder="No file selected..." value="{{$res->lname}}">
				</div>
			</div>


            <div class="mws-form-row">
                <label class="mws-form-label"></label>
                <div class="mws-form-item clearfix">
                    <ul class="mws-form-list inline">
                        <li>
                            <input type="radio" name="status" value="1"></input>
                            <label>启用</label>
                        </li>
                        <li>
                            <input type="radio" name="status" value="2"></input>
                            <label>禁止</label>
                        </li>

                        
                    </ul>
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

