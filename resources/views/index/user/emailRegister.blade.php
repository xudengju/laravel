<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>用户注册</title>
    <base href="__PUBLIC__">
    <link rel="stylesheet" type="text/css" href="/css/login.css">
    <script type="text/javascript" src="/js/jquery.min.js"></script>
    <script type="text/javascript" src="/js/register.js"></script>
</head>
<body>
<form  method="post" action="/index.php/emailRegister">
    <div class="regist">
        <div class="regist_center">
            <div class="regist_top">
                <div class="left fl">邮箱注册</div>
                <div class="right fr"><a href="{{url('user/register')}}" target="_self">手机号注册</a> <a href="{{url('index/index')}}" target="_self">小米商城</a></div>
                <div class="clear"></div>
                <div class="xian center"></div>
            </div>
            @csrf
            <div class="regist_main center">
                <div class="username">用&nbsp;&nbsp;户&nbsp;&nbsp;名:&nbsp;&nbsp;<input class="shurukuang" id="userName" type="text" name="username" placeholder="请输入你的用户名"/><span id="name_span">用户名不能有汉字哦</span></div>
                <div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="shurukuang" id="password" type="password" name="password" placeholder="请输入你的密码"/><span id="password_span">密码必须大于6位哦</span></div>

                <div class="username">确认密码:&nbsp;&nbsp;<input class="shurukuang" id="repassword" type="password" name="repassword" placeholder="请确认你的密码"/><span id="repassword_span">请确认密码</span></div>
                <div class="username">邮&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;箱:&nbsp;&nbsp;<input class="shurukuang" type="text" id="email" name="email" placeholder="请填写正确的邮箱"/><span id="email_span">填写下邮箱吧，方便我们联系您！</span></div>
                <div class="username">
                    <div class="left fl">验&nbsp;&nbsp;证&nbsp;&nbsp;码:&nbsp;&nbsp;<input class="yanzhengma" id="captcha" type="text" name="captcha"  placeholder="请输入验证码"/></div>
                    <div class="right fl"><img class="thumbnail captcha" src="{{ captcha_src('flat') }}" onclick="re_captcha()" id="recaptcha" title="点击图片重新获取验证码"><span id="captcha_span"></span></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="regist_submit">
                <input class="submit" type="submit" id="email_submit"  value="立即注册" >
            </div>

        </div>
    </div>
</form>
</body>
</html>
<script>
    $("#email_submit").click(function(){
        if(user_name && user_password && user_repassword && user_email && captchaq){
            $("form").submit();
        }else{
            return false;
        }
    })
    function re_captcha() {
        $url = "{{ captcha_src('flat') }}";
        $url = $url + "/" + Math.random();
        document.getElementById('recaptcha').src=$url;
    }
</script>