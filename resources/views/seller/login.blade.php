<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>登录</title>
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
                <div class="">
                    <img src="{{asset('assets/img/logoa.png')}}" alt="">
                </div>
                @if (count($errors) > 0)
                    <div class="mark" style="color:red">
                        <ul>
                            @if(is_object($errors))
                                @foreach ($errors->all() as $error)
                                <li><center>{{ $error }}</center></li>
                                @endforeach
                            @else
                                <li><center>{{ $errors }}</enter></li>
                            @endif
                        </ul>
                    </div>
                @endif
                <form class="am-form tpl-form-line-form" method="post" action="{{url('/seller/login')}}">
                {{csrf_field()}}
                    <div class="am-form-group">
                        <input type="text" class="tpl-form-input" id="user-name" name="sname" placeholder="请输入6-12位账号"><span class="zhanghao"></span>

                    </div>

                    <div class="am-form-group">

                        <input type="password" class="tpl-form-input" name="spwd" id="user-name" placeholder="请输入密码"><span class="mima"></span>

                    </div>
                    <div>
                    <input type="text" class="code" name="code" placeholder="请输入验证码" width="20px" /><br>

                        <span><i class="fa fa-check-square-o"></i></span><span class="yanzhengma"></span>
                        <img src="{{asset('/code')}}" alt="" onclick="this.src='{{asset('/code')}}?'+Math.random()">
                        {{--<a onclick="javascript:re_captcha();">--}}
                            {{--<img src="{{ asset('/code/captcha/1') }}" id="127ddf0de5a04167a9e427d883690ff6">--}}
                        {{--</a>--}}
                    </div><br>  
                    <div class="am-form-group tpl-login-remember-me">
                        <input id="remember-me" name="mima" checked type="checkbox">
                        <label for="remember-me">
                        记住密码
                         </label>
                        <a href="{{url('/seller/forget')}}" style="margin-left:150px">忘记密码</a>
                    </div>
                    <div class="am-form-group">


                        <button type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn" id="tijiao">提交</button>


                    </div>
                </form>

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
   
</body>

</html>