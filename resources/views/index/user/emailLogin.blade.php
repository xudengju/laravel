<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="author" content="order by dede58.com"/>
    <title>会员登录</title>
    <base href="__PUBLIC__">
    <link rel="stylesheet" type="text/css" href="/css/login.css">

</head>
<body>
<!-- login -->
<div class="top center">
    <div class="logo center">
        <a href="{{url('index/index')}}" target="_blank"><img src="/image/mistore_logo.png" alt=""></a>
    </div>
</div>
<form  method="post" action="/index.php/emailLogin" class="form center">
    <div class="login">
        <div class="login_center">
            <div class="login_top">
                <div class="left fl">邮箱登录</div>
                <div class="right fr">您还不是我们的会员？<a href="{{url('user/login')}}">手机号登录</a> <a href="{{url('user/register')}}" target="_self">立即注册</a></div>
                <div class="clear"></div>
                <div class="xian center"></div>
            </div>
            @csrf
            <div class="login_main center">
                <div class="username">邮&nbsp;&nbsp;&nbsp;&nbsp;箱:&nbsp;<input class="shurukuang" type="text" name="email" placeholder="请输入你的邮箱"/></div>
                <div class="username">密&nbsp;&nbsp;&nbsp;&nbsp;码:&nbsp;<input class="shurukuang" type="password" name="password" placeholder="请输入你的密码"/></div>
                <div class="username">
                    <div class="left fl">验证码:&nbsp;<input class="yanzhengma" type="text" placeholder="请输入验证码"/></div>
                    <div class="right fl"><img src="/image/yanzhengma.jpg"></div>
                    <div class="clear"></div>
                </div>
            </div>
            <div class="login_submit">
                <input class="submit" type="submit"  value="立即登录" >
            </div>

        </div>
    </div>
</form>
<footer>
    <div class="copyright">简体 | 繁体 | English | 常见问题</div>
    <div class="copyright">小米公司版权所有-京ICP备10046444-<img src="/image/ghs.png" alt="">京公网安备11010802020134号-京ICP证110507号</div>

</footer>
</body>
</html>