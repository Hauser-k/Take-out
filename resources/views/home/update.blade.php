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
            <div class="J-unitive-signup-form">
                <div class="sheet" style="display:block">
                    <form action="{{url('home/reset')}}" method="post">

                    
                        <div class="form-field form-field--mobile">
                            <label>
                                手机号
                            </label>
                            <input type="text" name="utel" class="f-text J-mobile" id="phone" value="{{old('utel')}}" />
                            <span class="J-unitive-tip unitive-tip">
                                  @if(session('error2'))
                                <h1>{{ session('error2')}}</h1>
                                 @endif
                            </span>
                        </div>
                        <div class="form-field form-field--vbtn">
                            <label>
                                图片验证码
                            </label>
                         
                            <div class="verify-wrapper">
                                <input type="button" name="" class="btn-normal btn-mini verify-btn J-verify-btn" id="id" 
                                value="免费获取短信动态码" />
                                
                                <span class="f1 verify-tip" id="J-verify-tip">
                                </span>
                            </div>
                        </div>
                        <div class="form-field form-field--sms">
                            <label>
                                短信动态码
                            </label>
                            <input type="text" name="phone" id="phonecode" value="" class="f-text J-sms" />
                            <span  class="J-unitive-tip unitive-tip">
                                @if(session('error'))
                                <h1>{{ session('error')}}</h1>
                                 @endif
                            </span>
                        </div>
                        

                        <div class="form-field">
                            <input data-mtevent="signup.submit" type="submit" id="submit_to" class="btn"
                            value="验证" />
                            
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
                            $('#phone').blur(function(){
                               var res = /^1(3|4|5|7|8)\d{9}$/;
                               var phone = $('#phone').val();
                                if(phone==''){
                                    layer.msg('手机号不能为空',{icon:5});
                                    return false;
                                }
                               if(!res.test(phone)){
                                   layer.msg('请输入正确的手机号码',{icon:5});
                                   return false;
                               }
                            });
                            codeTime=null;
                            var i=60;
                            var phone_code = '';
                            $('#id').click(function(){
                                if($('#phone').val() == ''){
                                    layer.msg('请输入手机号',{icon:5});
                                    return false;
                                }
                                var res = /^1(3|4|5|7|8)\d{9}$/;
                                var phone = $('#phone').val();
                                if(!res.test(phone)){
                                    layer.msg('请输入正确的手机号码',{icon:5});
                                    return false;
                                    t2 = false;
                                }else{
                                    // 发送ajax 注册手机号
                                    $.get('{{url('/home/tel')}}',{phone:phone},function(msg){

                                        console.log(msg);

                                        phone_code = msg.code;
                                        if(msg.code == 'no'){
                                            layer.msg('用户不存在',{icon:2});
                                        }else{
                                            layer.msg('已发送验证码',{icon:5});
                                        }
                                        t2 = true;
                                    },'json');
                                 
                                }
                                return false;
                            });
                            
                           
                            $('#submit_to').click(function(){
                                if(  t2 == true ){
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