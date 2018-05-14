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


		


    	<form action="/admin/users" method='post' class="mws-form" >
    		<div class="mws-form-inline">

    			<div class="mws-form-row">
    				<label class="mws-form-label">用户名</label>
    				<div class="mws-form-item" style="display:inline">
    					<input type="text" name='uname' class="small">
                        <span> *请输入4~12位用户名</span>
    				</div>
                </div>

    			<div class="mws-form-row">
    				<label class="mws-form-label">密码</label>
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


            <div class="mws-form-row">
                <label class="mws-form-label"></label>
                <div class="mws-form-item clearfix">
                    <ul class="mws-form-list inline">
                        <li>
                            <input type="radio" name="status" value="1"></input>
                            <label>超级管理员</label>
                        </li>
                        <li>
                            <input type="radio" name="status" value="2"></input>
                            <label>普通管理员</label>
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

@section('js')
    
<script>

        var UV;
        var PV;
       


        //获取用户名文本框
        $('input[name=uname]').focus(function(){

             $(this).css('border','solid 2px lightblue');

            //$(this).addClass('cur');
        })

        $('input[name=uname]').blur(function(){


            //获取用户输入的值
            var tv = $(this).val();

            //正则
            var reg = /^\w{4,12}$/;

            var us = $(this);

            //判断
            if(!reg.test(tv)){

                $(this).next().text(' *用户名格式不正确').css('color','red');

                UV = false;
            }else {


                //发送ajax
                $.get('/admin/checkuname',{uname:tv},function(data){

                    if(data == '1'){
                        us.next().text(' *用户名已经存在').css('color', 'red');

                        UV = false;
                    } else {

                        us.next().text(' √').css('color', 'green');

                        UV = true;
                    }

                })
            }
        })

        //获取密码
        $('input[name=password]').focus(function(){

            $(this).css('border','solid 2px lightblue');
            //$(this).addClass('cur');
        })

        $('input[name=password]').blur(function(){

            //获取输入的密码
            var pv = $(this).val();

            //正则
            var reg = /^\S{6,12}$/;

            //判断
            if(!reg.test(pv)){
                $(this).next().text(' *密码格式不正确').css('color','red');

                PV = false;
            }else{

                $(this).next().text(' √').css('color', 'green');

                PV = true;
            }
        })

        //确认密码
        $('input[name=repassword]').focus(function(){

            $(this).addClass('cur');
        })

        $('input[name=repassword]').blur(function(){

            //获取值
            var rpv = $(this).val();

            //获取输入密码的值
            var pv = $('input[name=password]').val();

            if(rpv != pv){

                $(this).next().text(' *两次密码不一致').css('color','red');
            } else {

                $(this).next().text(' √').css('color','green');

            }
        })

       //提交事件
        $(':submit').eq(1).click(function(){

            if(UV && PV ){

                return true;
            }
            
            return false;
            
        })


    </script>    


@endsection
