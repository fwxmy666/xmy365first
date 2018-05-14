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


		


    	<form action="/admin/users/{{$res->uid}}" method='post' class="mws-form" >
    		<div class="mws-form-inline">

    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item" style="display:inline">
    					<input type="text" name='uname' class="small" value="{{$res->uname}}">
                        <span> *请输入4~12位用户名</span>
    				</div>
                </div>

    			

            <div class="mws-form-row">
                <label class="mws-form-label"></label>
                <div class="mws-form-item clearfix">
                    <ul class="mws-form-list inline">
                        <li>
                            <input type="radio" name="status" value="1"
								@if ($status == 2)  
										checked = "checked"
								@endif
                            ></input>
                            <label>超级管理员</label>
                        </li>
                        <li>
                            <input type="radio" name="status" value="2"
								@if ($status == 1)
										checked ="checked"
								@endif
                            ></input>
                            <label>普通管理员</label>
                        </li>

                        
                    </ul>
                </div>
            </div>
	       </div>
    		<div class="mws-button-row">
            	
            	{{method_field('PUT')}}
    			{{csrf_field()}}
    			<input type="submit" class="btn btn-danger" value="提交">
    			
    		</div>
    	</form>


    </div>    	
</div>


@endsection
@section('js')

@endsection