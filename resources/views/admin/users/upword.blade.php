@extends('layout.admin')
@section('title',$title)
@section('content')

<div class="mws-panel grid_8">
	<div class="mws-panel-header">
    	<span>{{$title}}</span>
    </div>
	
	@if (count($errors) > 0)
		    		<div class="mws-form-message error">
		        <ul>
		            @foreach ($errors->all() as $error)
		                <li style='color:blue;font-size:17px;list-style:none'>{{ $error }}</li>
		            @endforeach
		        </ul>
		    </div>
		@endif
			{{session('msg')}}	
    <div class="mws-panel-body no-padding">
		
    	<form action="/admin/changepass" method="post" class="mws-form" enctype="multipart/form-date">
    		<div class="mws-form-inline">

    			<div class="mws-form-row">
    				<label class="mws-form-label">旧密码</label>
    				<div class="mws-form-item" style="display:inline">
    					<input type="password" name='oldpassword' class="small">
                        <span> {{session('msg')}}</span>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">新密码</label>
    				<div class="mws-form-item" style="display:inline">
    					<input type="password" name='password' class="small">
                        <span> *请输入6~12位密码</span>
    				</div>
    			</div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">确认密码</label>
    				<div class="mws-form-item" style="display:inline">
    					<input type="password" name='repassword' class="small">
                        <span> *请再次输入密码</span>
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


