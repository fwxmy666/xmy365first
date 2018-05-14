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
			<div class="mws-panel-body no-padding">
		        <table class="mws-table" >
		            <thead>
		                <tr>
		                    <th>姓名：</th>
		                    <th>{{$res->dname}}</th>
		                    <th>电话：</th>
		                    <th>{{$res->phone}}</th>
		                   
		                </tr>
		            </thead>
		            <tbody>
		                <tr>
		                    <td>现住地址：</td>
		                    <td>{{$res->place}}</td>
		                    <td>学历：</td>
		                    <td>{{$res->education}}</td>
		                    
		                </tr>
		                <tr>
		                    <td>毕业学校：</td>
		                    <td>{{$res->education}}</td>
		                    <td>专业：</td>
		                    <td>{{$res->profession}}</td>
		                    
		                </tr>
		                <tr>
		                    <td>入职时间：</td>
		                    <td>{{$res->dtime}}</td>
		                    <td>身份证号：</td>
		                    <td>{{$res->idd}}</td>
		                    
		                </tr>
		                <tr>
		                    <td>籍贯：</td>
		                    <td>{{$res->place}}</td>
		                    <td>紧急联系人电话：</td>
		                    <td>{{$res->phone}}</td>
		                    
		                </tr>
	
		               
		            </tbody>
		        </table>
		    </div>

		<style>
			.mws-panel-body no-padding{
				border-style: none solid solid;
				border-color: -moz-use-text-color #BCBCBC #BCBCBC;
				-moz-border-top-colors: none;
				-moz-border-right-colors: none;
				-moz-border-bottom-colors: none;
				-moz-border-left-colors: none;
				border-image: none;
				position: relative;
				padding: 24px;
				border-width: 0px 1px 1px;
				margin: 0px 2px;
				background-color: #FAFAFA;
				border-right: 1px solid #BCBCBC;
			}
			
			.mws-table {
				    width: 100%;
				    margin: 0px;
				    border: 0px none;
				    border-collapse: collapse;		
				}



		</style>


    </div>    	
</div>


@endsection

@section('js')

@endsection

