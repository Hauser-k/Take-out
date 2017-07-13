<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>找回密码</title>
    <!-- <meta name="description" content="这是一个 index 页面"> -->
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="icon" type="image/png" href="{{asset('assets/i/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/i/app-icon72x72@2x.png')}}">
    <!-- <meta name="apple-mobile-web-app-title" content="Amaze UI" /> -->
    <link rel="stylesheet" href="{{asset('assets/css/amazeui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/amazeui.datatables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>

</head>

<body data-type="login">
    <script src="{{asset('assets/js/theme.js')}}"></script>
    <div class="am-g tpl-g">
        <!-- 风格切换 -->
        <div class="tpl-skiner">
            <div class="tpl-skiner-toggle am-icon-cog">
            </div>
            <div class="tpl-skiner-content">
                <div class="tpl-skiner-content-title">
                    选择主题
                </div>
                <div class="tpl-skiner-content-bar">
                    <span class="skiner-color skiner-white" data-color="theme-white"></span>
                    <span class="skiner-color skiner-black" data-color="theme-black"></span>
                </div>
            </div>
        </div>

        <div class="tpl-login">
            <div class="tpl-login-content">
            <div class="am-btn-block tpl-btn-bg-color-success" style="width:100px">验证账号</div>
                    <div class="mark" style="color:red">
                        <ul>
                                <li><center></center></li>
                                <li><center></enter></li>
                        </ul>
                    </div><br>
                <!-- <form class="am-form tpl-form-line-form"> -->
                {{csrf_field()}}
                    <div class="am-form-group">
                        <input type="text" id="email" name="email" style="width: 420px" value="" placeholder="请输入您的邮箱"><span></span>

                    </div><br>
                    <div class="am-form-group">
                         <button type=""  class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn" id="btn">验证</button>

                    </div>
                <!-- </form> -->

            </div>
        </div>
    </div>

    <script src="{{asset('assets/js/amazeui.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/denglutijiao.js')}}"></script>
    <script type="text/javascript">
        function re_captcha() {
            $asset = "{{ asset('/code/captcha') }}";
            $asset = $asset + "/" + Math.random();
            document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $asset;
        }
    </script>
    <script>
$(function(){
    $('#btn').click(function(){
            var youxiang = '';
            var res = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
            var email = $('#email').val();
            if(email==''){
                alert('邮箱不能为空');
                return false;
            }
            if(!res.test(email)){
                alert('请输入正确的邮箱格式');
                return false;
            }else{
                    $.ajax({
                    url:'/seller/email',
                    type:'get', //默认get方式
                    data:{email:email},
                    success:function(data){
                        if(data==1){
                            alert('该邮箱不存在！')
                            youxiang = false;
                            return youxiang;
                        }
                        if(data==0){
                            alert('邮件已发送，请去邮箱验证');
                            location.href = '/seller/login';
                            youxiang = true;
                            return youxiang;
                        }
                    },
                    dataType:'json',
                    async:false, //默认true
                });
            }
        });
     
});
    </script>
</body>

</html>