<!DOCTYPE html>
<!--[if lt IE 7]> <html class="lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--><html lang="en"><!--<![endif]-->
<head>
    <meta charset="utf-8">
    <!-- Viewport Metatag -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0">

    <!-- Plugin Stylesheets first to ease overrides -->
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/plugins/colorpicker/colorpicker.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/custom-plugins/wizard/wizard.css')}}" media="screen">

    <!-- Required Stylesheets -->
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/bootstrap/css/bootstrap.min.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/fonts/ptsans/stylesheet.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/fonts/icomoon/style.css')}}" media="screen">

    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/mws-style.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/icons/icol16.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/icons/icol32.css')}}" media="screen">

    <!-- Demo Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/demo.css')}}" media="screen">

    <!-- jQuery-UI Stylesheet -->
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/jui/css/jquery.ui.all.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/jui/jquery-ui.custom.css')}}" media="screen">

    <!-- Theme Stylesheet -->

    <script src="/admin/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/mws-theme.css')}}" media="screen">
    <link rel="stylesheet" type="text/css" href="{{asset('/admin/css/themer.css')}}" media="screen">
    @section('css')
    @show
    <title>@section('title')   @show</title>
	<style>
		.opend{
			display:none;
		}
	</style>

</head>

<body>
<!-- Header -->
<div id="mws-header" class="clearfix">

    <!-- Logo Container -->
    <div id="mws-logo-container">

        <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        <div id="mws-logo-wrap">
            <img src="/admin/images/mws-logo.png" alt="mws admin">
        </div>
    </div>

    <!-- User Tools (notifications, logout, profile, change password) -->
    <div id="mws-user-tools" class="clearfix">

        <!-- Notifications -->
        <div id="mws-user-notif" class="mws-dropdown-menu">

            <!-- Unread notification count -->


            <!-- Notifications dropdown -->
            <div class="mws-dropdown-box">
                <div class="mws-dropdown-content">
                    <ul class="mws-notifications">
                        <li class="read">
                            <a href="#">
                                    <span class="message">

                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="read">
                            <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="#">
                                    <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="#">
                                    <span class="message">退出
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

        <!-- Messages -->
        <div id="mws-user-message" class="mws-dropdown-menu">


            <!-- Unred messages count -->


            <!-- Messages dropdown -->
            <div class="mws-dropdown-box">
                <div class="mws-dropdown-content">
                    <ul class="mws-messages">
                        <li class="read">
                            <a href="#">
                                <span class="sender">John Doe</span>
                                <span class="message">
                                        Lorem ipsum dolor sit amet consectetur adipiscing elit, et al commore
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="read">
                            <a href="#">
                                <span class="sender">John Doe</span>
                                <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="#">
                                <span class="sender">John Doe</span>
                                <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                        <li class="unread">
                            <a href="#">
                                <span class="sender">John Doe</span>
                                <span class="message">
                                        Lorem ipsum dolor sit amet
                                    </span>
                                <span class="time">
                                        January 21, 2012
                                    </span>
                            </a>
                        </li>
                    </ul>
                    <div class="mws-dropdown-viewall">
                        <a href="#">View All Messages</a>
                    </div>
                </div>
            </div>
        </div>

        <!-- User Information and functions section -->
        <div id="mws-user-info" class="mws-inset">

            <!-- User Photo -->
            <div id="mws-user-photo">
                <img src="/admin/example/profile.jpg" alt="User Photo">
            </div>

            <!-- Username and Functions -->
            <div id="mws-user-functions">
                <div id="mws-username">{{ session('admin_user')['aname']}}
                </div>
                <ul>
                    <li><a href="{{url('admin/login/')}}/{{ session('admin_user')['aid']}}"><input type="hidden" name="_method" value="put">退出</a></li>
                    <li><a href="#">修改密码</li>
                </ul>
            </div>
        </div>
    </div>
</div>

<!-- Start Main Wrapper -->
<div id="mws-wrapper">

    <!-- Necessary markup, do not remove -->
    <div id="mws-sidebar-stitch"></div>
    <div id="mws-sidebar-bg"></div>

    <!-- Sidebar Wrapper -->
    <div id="mws-sidebar">

        <!-- Hidden Nav Collapse Button -->
        <div id="mws-nav-collapse">
            <span></span>
            <span></span>
            <span></span>
        </div>

        <!-- Searchbox -->
        <div id="mws-searchbox" class="mws-inset">
            <form action="">
                <input type="text" class="mws-search-input" placeholder="Search...">
                <button type="submit" class="mws-search-submit"><i class="icon-search"></i></button>
            </form>
        </div>

        <!-- Main Navigation -->
     <div id="mws-navigation">
            <ul>
                <li>
                    <a href="#"><i class="icon-user"></i>用户列表</a>
                    <ul class="opend">
                        <li><a href="{{url('admin/user')}}">查看用户</a></li>
                        <li><a href="{{url('admin/user/create')}}">添加用户</a></li>
                    </ul>
                </li>
			</ul>
        </div>
        <div id="mws-navigation">
            <ul>
                <li>
                    <a href="#"><i class="icon-align-center"></i> 商家分类</a>
                    <ul class="opend">
                        <li><a href="{{url('admin/sellerclass/create')}}">分类添加</a></li>
                        <li><a href="{{url('admin/sellerclass/')}}">分类列表</a></li>
                    </ul>
                </li>
			</ul>
        </div>
        <div id="mws-navigation">
            <ul>

                <li>
                    <a href="#"><i class="icon-add-contact"></i> 商家列表</a>
                    <ul class="opend">
                        <li><a href="{{url('admin/seller')}}">查看商家</a></li>
                    </ul>
                </li>
        </div>
        <div id="mws-navigation">
            <ul>

                <li>
                    <a href="#"><i class="icon-file"></i> 订单信息</a>
                    <ul class="opend">
                        <li><a href="{{url('/admin/order')}}">订单查看</a></li> 
                        <li><a href="{{url('/admin/order/{id}')}}">订单商品</a></li> 
                        <li><a href="{{url('/admin/order/create')}}">订单配送</a></li> 
                    </ul>
                </li>
        </div>
         <div id="mws-navigation">
            <ul>

                <li>
                    <a href="#"><i class="icon-list-2"></i> 评价列表</a>
                    <ul class="opend">
                        <li><a href="{{url('/admin/eval')}}">评价查看</a></li> 

                    </ul>
                </li>
        </div>
         <div id="mws-navigation">
            <ul>

                <li>
                    <a href="#"><i class="icon-snowflake"></i> 收藏列表</a>
                    <ul class="opend">
                        <li><a href="{{url('/admin/collection')}}">收藏查看</a></li> 
                    </ul>
                </li>
        </div>
         <div id="mws-navigation">
            <ul>

                <li>
                    <a href="#"><i class="icon-users"></i> 商家审核</a>
                    <ul class="opend">
                        <li><a href="{{url('/admin/examine')}}">商家审核</a></li>
                    </ul>
                </li>
        </div>
        <div id="mws-navigation">
            <ul>

                <li>
                    <a href="#"><i class="icon-file-zip"></i> 反馈信息</a>
                    <ul class="opend">
                        <li><a href="#">信息查看</a></li>
                    </ul>
                </li>
        </div>
        <div id="mws-navigation">
            <ul>

                <li>
                    <a href="#"><i class="icon-file-zip"></i>BOSS请入</a>
                    <ul class="opend">
                        <li><a href="{{url('admin/adminuser/create')}}">添加管理</a></li>
                        <li><a href="{{url('admin/adminuser')}}">管理查看</a>
                         </li>
                    </ul>
                </li> 
                </ul>
            </div>  

         <div id="mws-navigation">
            <ul>
                <li>
                    <a href="#"><i class="icon-tree"></i>友情链接</a>
                    <ul class="opend">
                        <li><a href="{{url('admin/link/create')}}">添加链接</a></li>
                        <li><a href="{{url('admin/link/')}}">链接列表</a></li>
                    </ul>
                </li>
        </div>

        <div id="mws-navigation">
            <ul>
                <li>
                    <a href="#"><i class="icon-apple"></i>网站配置</a>
                    <ul class="opend">
                        <li><a href="{{url('admin/config/create')}}">添加配置项</a></li>
                        <li><a href="{{url('admin/config/')}}">网站配置</a></li>
                    </ul>
                </li>
        </div>
    </div>


    <!-- Main Container Start -->
    <div id="mws-container" class="clearfix">

        <!-- 内容开始 -->
        <div class="container">
            <!-- 成功提示信息 -->
            @if (session('success'))
                <div class="mws-form-message success">
                    {{ session('success') }}
                </div>
            @endif
        <!-- 失败提示信息 -->
            @if (session('error'))
                <div class="mws-form-message error">
                    {{ session('error') }}
                </div>
            @endif

            @section('content')

            @show
        </div>
        <!-- 内容结束 -->

        <!-- Footer -->
        <div id="mws-footer">
            Copyright Your Website 2012. All Rights Reserved.
        </div>

    </div>
    <!-- Main Container End -->

</div>

<!-- JavaScript Plugins -->

<script src="/admin/js/jquery.mousewheel.min.js"></script>
<script src="/admin/js/jquery.placeholder.min.js"></script>
<script src="/admin/js/fileinput.js"></script>

<!-- jQuery-UI Dependent Scripts -->
<script src="/admin/js/jquery-ui-1.9.2.min.js"></script>
<script src="/admin/js/jquery-ui.custom.min.js"></script>
<script src="/admin/js/jquery.ui.touch-punch.js"></script>

<!-- Plugin Scripts -->
<script src="/admin/js/jquery.dataTables.min.js"></script>
<!--[if lt IE 9]>
<script src="/admin/js/excanvas.min.js"></script>
<![endif]-->
<script src="/admin/js/jquery.flot.min.js"></script>
<script src="/admin/js/jquery.flot.tooltip.min.js"></script>
<script src="/admin/js/jquery.flot.pie.min.js"></script>
<script src="/admin/js/jquery.flot.stack.min.js"></script>
<script src="/admin/js/jquery.flot.resize.min.js"></script>
<script src="/admin/js/colorpicker-min.js"></script>
<script src="/admin/js/jquery.validate-min.js"></script>
<script src="/admin/js/wizard.min.js"></script>

<!-- Core Script -->
<script src="/admin/js/bootstrap.min.js"></script>
<script src="/admin/js/mws.js"></script>

<!-- Themer Script (Remove if not needed) -->
<script src="/admin/js/themer.js"></script>

<!-- Demo Scripts (remove if not needed) -->
<script src="/admin/js/demo.dashboard.js"></script>

</body>
</html>