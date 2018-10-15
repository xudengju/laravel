
$(function(){
    var user_name = false;
    var user_password = false;
    var user_repassword = false;
    var user_telephone = false;
    var user_email = false;
    var captchaq = false;
    $("#userName").blur(function(){
         var userName = $("#userName").val();
         var reg = /^[\u4e00-\u9fa5]{0,}$/
         if(reg.test(userName) || userName==''){
             $("#name_span").html("<span style='color: red'>用户名不能为空且用户名不能是中文</span>");
         }else{
             $("#name_span").html("<span style='color: green'>√</span>");
             user_name = true;
         }
    })
    $("#password").blur(function(){
         var password = $("#password").val();
         var reg = /^\w{6,}$/
        var p = password.match(reg);
         if (p!=null && password!=''){
             $("#password_span").html("<span style='color: green'>√</span>");
             user_password = true;
         }else{
             $("#password_span").html("<span style='color: red'>密码必须6位以上</span>");
         }
    })
    $("#repassword").blur(function(){
        var password = $("#password").val();
        var repassword = $("#repassword").val();
        if (password == repassword && password!='' && repassword!=''){
            $("#repassword_span").html("<span style='color: green'>两次密码一致</span>");
            user_repassword = true;
        }else{
            $("#repassword_span").html("<span style='color: red'>两次密码必须一致哦</span>");
        }
    })
    $("#telephone").blur(function(){
       var telephone = $("#telephone").val();
       var reg = /^\d{11}$/;
       var t = telephone.match(reg);
       if (t!=null && telephone!=''){
           $("#telephone_span").html("<span style='color: green'>√</span>")
           user_telephone = true;
       }else{
           $("#telephone_span").html("<span style='color: red'>电话号码格式不对</span>")
       }
    })
    $("#captcha").blur(function(){
        var captcha = $("#captcha").val();
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            type: "POST",
            url: "/index.php/user/captcha",
            data: "captcha="+captcha,
            success: function(msg){
               if(msg == 1){
                   captchaq = true;
                 $("#captcha_span").html("<span style='color: green'>√</span>");
               }
            },
            error:function(){
                $("#captcha_span").html("<span style='color: red'>验证码不正确</span>");
            }
        });
    })
    $(".submit").click(function(){
        if(user_name && user_password && user_repassword && user_telephone && captchaq){
            $("form").submit();
        }else{
            return false;
        }
    })
    $("#email").blur(function(){
        var email = $("#email").val();
        var reg = /^([\w\-]+\@[\w\-]+\.[\w\-]+)$/;
        var e = email.match(reg);
        if (e!=null && email!=''){
            $("#email_span").html("<span style='color: green'>√</span>")
            user_email = true;
        }else{
            $("#email_span").html("<span style='color: red'>邮箱格式不对</span>")
        }
    })

})