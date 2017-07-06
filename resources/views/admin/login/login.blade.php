
<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
<meta charset="utf-8">

<!-- Viewport Metatag -->
<meta name="viewport" content="width=device-width,initial-scale=1.0">

<!-- Required Stylesheets -->
<link rel="stylesheet" type="text/css" href="/admin/bootstrap/css/bootstrap.min.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/ptsans/stylesheet.css" media="screen">
<link rel="stylesheet" type="text/css" href="/admin/css/fonts/icomoon/style.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/login.css" media="screen">

<link rel="stylesheet" type="text/css" href="/admin/css/mws-theme.css" media="screen">

<title>后台登录</title>

</head>

<body>

    <div id="mws-login-wrapper">
        <div id="mws-login">
            @if(session('error'))
            <h1>{{ session('error')}}</h1>
            @else
            <h1>登录</h1>
            @endif
            <div class="mws-login-lock"><i class="icon-lock"></i></div>
            <div id="mws-login-form">
                <form class="mws-form" action="{{url('admin/login')}}" method="post">
                	{{ csrf_field()}}
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="text" name="username" class="mws-login-username required" placeholder="用户名">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <div class="mws-form-item">
                            <input type="password" name="password" class="mws-login-password required" placeholder="密码">
                        </div>
                    </div>

                     <div class="mws-form-row">
                        <div class="mws-form-item">
                             <img src="/code" title="点击切换" onclick="this.src=this.src+'?a='+Math.random()"><input type="text" name="code" class="required" placeholder="验证码" style="width:150px;margin-left:10px;">
                        </div>
                    </div>
                    <!-- <div id="mws-login-remember" class="mws-form-row mws-inset">
                        <ul class="mws-form-list inline">
                            <li>
                                <input id="remember" type="checkbox"> 
                                <label for="remember">记住我</label>
                            </li>
                        </ul>
                    </div> -->
                    <div class="mws-form-row">
                        <input type="submit" value="提交" class="btn btn-success mws-login-button">
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- JavaScript Plugins -->
    <script src="/admin/js/libs/jquery-1.8.3.min.js"></script>
    <script src="/admin/js/libs/jquery.placeholder.min.js"></script>
    <script src="/admin/custom-plugins/fileinput.js"></script>
    
    <!-- jQuery-UI Dependent Scripts -->
    <script src="/admin/jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script src="/admin/plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script src="/admin/js/core/login.js"></script>

</body>
</html>
