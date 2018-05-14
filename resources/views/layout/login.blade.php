<!doctype html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>香满园后台</title>
	<meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,user-scalable=yes, minimum-scale=0.4, initial-scale=0.8,target-densitydpi=low-dpi" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon" />
    <link rel="stylesheet" href="/land/css/font.css">
	<link rel="stylesheet" href="/land/css/xadmin.css">
    <script type="text/javascript" src="/land/js/jquery-3.2.1.min.js"></script>
    <script src="/land/lib/layui/layui.js" charset="utf-8"></script>
    <script type="text/javascript" src="/land/js/xadmin.js"></script>

</head>
<body class="login-bg">
    
    <div class="login">
        <div class="message">xmy365后台管理登录</div>
        <div id="darkbannerwrap"></div>
          
            @if (count($errors) > 0)
                    <div class="mws-form-message error">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li style='color:blue;font-size:17px;list-style:none'>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif





        <form action="/admin/check" method="post" class="layui-form" >

                
            <input name="username" placeholder="用户名"  type="text" lay-verify="required" class="layui-input" >
            <hr class="hr15">

            <input name="password" lay-verify="required" placeholder="密码"  type="password" class="layui-input">
            <hr class="hr15">
               
            <div>
                <input name="yanzhengma" lay-verify="required" placeholder="验证码"  type="text" class="">
                <a onclick="javascript:re_captcha();">
                    <img src="{{URL('/admin/captcha/1')}}" alt="验证码" title="刷新图片" id="127ddf0de5a04167a9e427d8836023">
                </a>
            
            </div>                  
            <hr class="hr15">
            
           {{csrf_field()}}
            <input value="登录" lay-submit lay-filter="login" style="width:100%;" type="submit">
            <hr class="hr20" >

        </form>
        <div id='errors' >
            {{session('err')}}
        </div>
        
    </div>
        <style>
            #errors{
                border:0px solid blue;
                height:30px;
                line-height:30px;
                font-size:20px;
                color:red;
            }
        </style>
    
</body>
</html>

<script>    
    $('#errors').slideUp(4000);

    function re_captcha() {  
    $url = "{{ URL('/admin/captcha') }}";
    $url = $url + "/" + Math.random();
        document.getElementById('127ddf0de5a04167a9e427d8836023').src = $url;
    }

</script>

