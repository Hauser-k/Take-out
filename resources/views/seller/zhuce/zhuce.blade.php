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
        <link rel="stylesheet" type="text/css" href="/home/css/zhuce.css">
        
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
                    <form action="{{url('/seller/register')}}" method="post">
                    
                       <div class="form-field form-field--sms">
                            <label>
                               昵称
                            </label>
                            <input type="text" name="sname" id="sname" value="" class="f-text J-sms" />
                            <span  class="J-unitive-tip unitive-tip">
                            </span>
                        </div>

                        
                        <div class="form-field form-field--mobile">
                            <label>
                                手机号
                            </label>
                            <input type="text" name="stel" class="f-text J-mobile" id="phone" value="{{old('utel')}}" />
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
                        <div class="form-field form-field--sms">
                            <label>
                               邮箱
                            </label>
                            <input type="text" name="semail" id="semail" value="" class="f-text J-sms" />
                            <span  class="J-unitive-tip unitive-tip">
                            </span>
                        </div>

                        <div class="form-field form-field--pwd">
                            <label>
                                创建密码
                            </label>
                            <input type="password" name="spwd" id="apassword" class="f-text J-pwd" />
                        </div>
                        <div class="form-field form-field--pwd2">
                            <label>
                                确认密码
                            </label>
                            <input type="password" name="password" id="arepassword" class="f-text J-pwd2" />

                        </div>

                        <div class="form-field">
                            <input data-mtevent="signup.submit" type="submit" id="submit_to" class="btn"
                            value="同意以下协议并注册" />
                            
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

                            
                            var name = '';
                            $('#sname').blur(function(){
                                var sname = $('#sname').val();
                                $.get('{{url('seller/stel')}}',{sname:sname},function(msg){

                                        name = msg.code;
                                        if(msg.code == 'no'){
                                            layer.msg('用户已存在',{icon:2});
                                        }else{
                                            layer.msg('用户可以使用',{icon:5});
                                        }
                                    },'json');

                            });




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
                                }else{
                                    // 发送ajax 注册手机号
                                    $.get('{{url('seller/phone')}}',{phone:phone},function(msg){

                                        // console.log(msg);

                                        phone_code = msg.code;
                                        if(msg.code == 'no'){
                                            layer.msg('用户已存在',{icon:2});
                                        }else{
                                            layer.msg('已发送验证码',{icon:5});
                                        }
                                    },'json');
                                    codeTime=setInterval(function() {
                                        $('#id').html(i);
                                        i--;
                                        if(i<0){
                                            clearInterval(codeTime);
                                            codeTime=null;
                                            i=60;
                                            $('#dyMobileButton').html('获取');
                                        }
                                    },1000);
                                }
                                return false;
                            });
                            // $('#phonecode').blur(function(){
                            //     // alert({{ session('phone_code') }});
                            //     if($('#phonecode').val() != {{ session('phone_code') }}){
                            //         layer.msg('验证码错误',{icon:2});
                            //         t1 = false;
                            //     }else{
                            //         t1 = true;
                            //     }
                            // });
                            

                             var email = '';
                            $('#semail').blur(function(){
                                var semail = $('#semail').val();
                                $.get('{{url('seller/email')}}',{semail:semail},function(msg){

                                        email = msg.code;
                                        if(msg.code == 'no'){
                                            layer.msg('邮箱存在',{icon:2});
                                        }else{
                                            layer.msg('邮箱可以使用',{icon:5});
                                        }
                                    },'json');

                            });
                            

    

                            $('#semail').blur(function(){
                                var res = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;
                                var email = $('#semail').val();
                                if(!res.test(email)){
                                    layer.msg('请输入正确的邮箱格式',{icon:5});
                                    return false;                
                                }
                            });
        

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