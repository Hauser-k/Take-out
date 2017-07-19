<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title> @section('title')    @show</title>
    <meta name="description" content="这是一个 index 页面">
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="{{asset('assets/i/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/i/app-icon72x72@2x.png')}}">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    <script src="{{asset('assets/js/echarts.min.js')}}"></script>
    <script src="{{asset('assets/js/area.js')}}"></script>
    <!-- <script src="{{asset('bootstrap-3.3.7-dist/js/bootstrap.min.js')}}"></script> -->
    <link rel="stylesheet" href="{{asset('assets/css/amazeui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/amazeui.datatables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <link rel="stylesheet" href="{{asset('assets/css/hauser.css')}}">
    <link rel="stylesheet" href="{{asset('bootstrap-3.3.7-dist/css/bootstrap.css')}}">
  
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{asset('layer/layer.js')}}"></script>

    @section('cssstyle')  @show

</head>

<body data-type="index">
    <script src="{{asset('assets/js/theme.js')}}"></script>
    <div class="am-g tpl-g">
        <!-- 头部 -->
        <header>
            <!-- logo -->
            <div class="am-fl tpl-header-logo">
                <a href="javascript:;" ><img src="{{asset('assets/img/logo.png')}}" style="width:240px;height:70px" alt=""></a>
            </div>
            <!-- 右侧内容 -->
            <div class="tpl-header-fluid">
                <!-- 侧边切换 -->
                <!-- <div class="am-fl tpl-header-switch-button am-icon-list">
                    <span>

                </span>
                </div> -->
                <!-- 搜索 -->
               <!--  <div class="am-fl tpl-header-search">
                    <form class="tpl-header-search-form" action="javascript:;">
                        <button class="tpl-header-search-btn am-icon-search"></button>
                        <input class="tpl-header-search-box" type="text" placeholder="搜索内容...">
                    </form>
                </div> -->
                <!-- 其它功能-->
                <div class="am-fr tpl-header-navbar">
                    <ul>
                        <!-- 欢迎语 -->
                        <li class="am-text-sm tpl-header-navbar-welcome">
                            <a href="{{url('/seller/personal')}}">欢迎你,{{session('seller_user')->sname}}<span></span> </a>
                        </li>
                        <!-- 新提示 -->
                        <li class="am-dropdown" data-am-dropdown>
                            <a id="ina"  href="javascript:;" class="am-dropdown-toggle" data-am-dropdown-toggle>
                                <i class="am-icon-bell"></i>
                                <span class="am-badge am-badge-warning am-round item-feed-badge">5</span>
                            </a>

                            <!-- 弹出列表 -->
                            <ul class="am-dropdown-content tpl-dropdown-content">
                                <li class="tpl-dropdown-menu-notifications">
                                    <a href="javascript:;" class="tpl-dropdown-menu-notifications-item am-cf">
                                        <div class="tpl-dropdown-menu-notifications-title">
                                            <i class="am-icon-line-chart"></i>
                                            <span> 有6笔新的销售订单</span>
                                        </div>
                                        <div class="tpl-dropdown-menu-notifications-time">
                                            12分钟前
                                        </div>
                                    </a>
                                </li>
                                
                                <li class="tpl-dropdown-menu-notifications">
                                    <a href="javascript:;" class="tpl-dropdown-menu-notifications-item am-cf">
                                        <i class="am-icon-bell"></i> 进入列表…
                                    </a>
                                </li>
                            </ul>
                        </li>

                        <!-- 退出 -->
                        <li class="am-text-sm">
                            <a href="{{url('/seller/quit')}}">
                                <span class="am-icon-sign-out"></span> 退出
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

        </header>
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
        <!-- 侧边导航栏 -->
        <div class="left-sidebar">
            <!-- 用户信息 -->
            <div class="tpl-sidebar-user-panel">
                <div class="tpl-user-panel-slide-toggleable">
                    <div class="tpl-user-panel-profile-picture">
                        <img src="{{asset('seller/uploads/')}}/{{ session('seller_detail')->slogo }}" alt="">
                    </div>
                    <span class="user-panel-logged-in-text">
          </span>
                    <a href="{{ asset('seller/setup/') }}/{{ session('seller_user')->sid }}/edit" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
                </div>
            </div>
                <li class="sidebar-nav-link">
                    <a href="{{ asset('/seller/kaidian') }}">
                        <i class="am-icon-clone sidebar-nav-link-logo"></i>我要开店
                    </a>
                </li>
                <li class="sidebar-nav-link">
                    <a href="{{ asset('seller/index/') }}/{{ session('seller_user')->sid }}/edit">
                        <i class="am-icon-clone sidebar-nav-link-logo"></i>我的店铺
                    </a>
                </li>
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 我的分类
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="{{ url('seller/goodsclass') }}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 菜类列表
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="{{ url('seller/goodsclass/create') }}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 增加菜类
                            </a>
                        </li>
                    </ul>
                </li> 
                <li class="sidebar-nav-link">
                    <a href="javascript:;" class="sidebar-nav-sub-title">
                        <i class="am-icon-table sidebar-nav-link-logo"></i> 我的菜单
                        <span class="am-icon-chevron-down am-fr am-margin-right-sm sidebar-nav-sub-ico"></span>
                    </a>
                    <ul class="sidebar-nav sidebar-nav-sub">
                        <li class="sidebar-nav-link">
                            <a href="{{url('/seller/goods')}}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 菜单列表
                            </a>
                        </li>

                        <li class="sidebar-nav-link">
                            <a href="{{url('/seller/goods/create')}}">
                                <span class="am-icon-angle-right sidebar-nav-link-logo"></span> 增加美食
                            </a>
                        </li>
                    </ul>
                </li> 
                
                <li class="sidebar-nav-link">
                    <a href="{{url('/seller/order')}}">
                        <i class="am-icon-key sidebar-nav-link-logo"></i>我的订单
                    </a>
                </li>
                <li class="sidebar-nav-link">
                    <a href="{{url('seller/eval')}}">
                        <i class="am-icon-tv sidebar-nav-link-logo"></i>我的评价
                    </a>
                </li>

            </ul>
        </div>
        <div class="tpl-content-wrapper">
        @section('content')
                <!-- 内容区域 -->
        @show     
        </div>

       
       
    </div>
    </div>
    <script src="{{asset('assets/js/amazeui.min.js')}}"></script>
    <script src="{{asset('assets/js/amazeui.datatables.min.js')}}"></script>
    <script src="{{asset('assets/js/dataTables.responsive.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script> 

</body>

</html>