<!DOCTYPE html>
<html>
    <script src="{{asset('/home/js/jquery-1.8.3.min.js')}}"></script>
    <script src="{{asset('layer/layer.js')}}"></script>      
    <head>  
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <meta name="renderer" content="webkit">
        <meta http-equiv="X-UA-Compatible" content="IE=Edge">
        <meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0"
        />
        <link rel="dns-prefetch" href="#">
        <link rel="apple-touch-icon" href="#">
        <link rel="shortcut icon" href="#">
        <link rel="icon" href="#"
        sizes="16x16 32x32">
        <link rel="alternate" href="#" title="订阅更新"
        type="application/rss+xml">
        <link rel="canonical" href="#">
        <meta name="keywords" content="美团,登录,注册,美团登录,美团注册">
        <title>
            注册 | 美团外卖
        </title>
        <!--[if lt IE 9]>
            <script src="//s0.meituan.net/bs/jsm/?f&#x3D;fe-sso-fs:build/page/vendor/html5shiv.min.js">
            </script>
        <![endif]-->
        <link rel="stylesheet" type="text/css" href="./css/zhuce.css">
        
    </head>
    
    <body class="pg-unitive-signup theme--waimai">
        <header class="header--mini">
            <div class="wrapper cf">
                <a class="site-logo" href="#">
                    美团
                </a>
            </div>
        </header>
        <div class="content">

             @if (count($errors) > 0)
            <div class="mark" style="color:red">
                <ul>
                    @if(is_object($errors))
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @else
                        <li>{{ $errors }}</li>
                    @endif
                </ul>
            </div>
        @endif
            <div class="J-unitive-signup-form">
                <div class="sheet" style="display:block">
                    <form action="{{url('/home/doreset')}}" method="post">

                        
                        <div class="form-field form-field--pwd">
                            <label>
                               手机号
                            </label>
                            <input type="text" name="utel"  value="{{$user}}"  readonly id="tel" class="f-text J-pwd" />
                        </div>
                        <div class="form-field form-field--pwd">
                            <label>
                                新密码
                            </label>
                            <input type="password" name="upwd" id="apassword" class="f-text J-pwd" />
                        </div>
                        <div class="form-field form-field--pwd2">
                            <label>
                                确认密码
                            </label>
                            <input type="password" name="apassword" id="arepassword" class="f-text J-pwd2" />

                        </div>

                        <div class="form-field">
                            <input data-mtevent="signup.submit" type="submit" id="submit_to" class="btn"
                            value="修改" />
                            
                            <a href="" target="_blank">
                            </a>
                        </div>
                        <input type="hidden"  class="J-fingerprint" value=""
                        />
                         {{ csrf_field() }}  
                    </form>
                    <script>
                            var t1 = false;
                            var t2 = false;
                            var t3 = false;
                           $('#apassword').blur(function(){
                                var res = /^[A-Za-z0-9]{6,20}$/;
                                var password = $('#apassword').val();
                                if(!res.test(password)){
                                    layer.msg('请输入6-18位,小写字母,大写字母,数字三种组合的密码',{icon:7});
                                    t2 = false;
                                }else{
                                    t2 = true;
                                }
                            });
                            $('#arepassword').blur(function(){
                                console.log($('#arepassword').val());
                                console.log($('#apassword').val());
                                if($('#arepassword').val() != $('#apassword').val()){
                                    layer.msg('重复密码不一致',{icon:5});
                                    t3 = false;
                                }else{
                                    t3 = true;
                                }
                            });
                            $('#submit_to').click(function(){
                                if(  t2 == true && t3 == true){
                                    return true;
                                } else{
                                    return false;
                                }
                                return false;
                            });
                    </script>
                            

                </div>
            </div>
            <div class="term">
                <a class="f1" href="#">
                    《美团网用户协议》
                </a>
            </div>
        </div>
        <footer class="footer--mini">
            <p class="copyright">
                ©
                <a class="f1" href="#">
                    meituan.com
                </a>
                &nbsp;
                <a class="f1" href="#">
                    京ICP证070791号
                </a>
                &nbsp;
                <span class="f1">
                    京公网安备11010502025545号
                </span>
            </p>
        </footer>
        
    </body>

</html>