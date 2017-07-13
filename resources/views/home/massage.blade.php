@extends('layout.home.home')

@section('content')
<html><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" type="text/css" href="./css/style1.3.28.4.css">
<style type="text/css">.amap-indoor-map .label-canvas{position:absolute;top:0;left:0}.amap-indoor-map .highlight-image-con *{pointer-events:none}.amap-indoormap-floorbar-control{position:absolute;margin:auto 0;bottom:165px;right:12px;width:35px;text-align:center;line-height:1.3em;overflow:hidden;padding:0 2px}.amap-indoormap-floorbar-control .panel-box{background-color:rgba(255,255,255,.9);border-radius:3px;border:1px solid #ccc}.amap-indoormap-floorbar-control .select-dock{position:absolute;top:0;left:0;width:100%;box-sizing:border-box;height:30px;border:solid #4196ff;border-width:0 2px;border-radius:2px;pointer-events:none;background:linear-gradient(to bottom,#f6f8f9 0,#e5ebee 50%,#d7dee3 51%,#f5f7f9 100%)}.amap-indoor-map .transition{transition:opacity .2s},.amap-indoormap-floorbar-control .transition{transition:top .2s,margin-top .2s}.amap-indoormap-floorbar-control .select-dock:after,.amap-indoormap-floorbar-control .select-dock:before{content:"";position:absolute;width:0;height:0;left:0;top:10px;border:solid transparent;border-width:4px;border-left-color:#4196ff}.amap-indoormap-floorbar-control .select-dock:after{right:0;left:auto;border-left-color:transparent;border-right-color:#4196ff}.amap-indoormap-floorbar-control.is-mobile{width:37px}.amap-indoormap-floorbar-control.is-mobile .floor-btn{height:35px;line-height:35px}.amap-indoormap-floorbar-control.is-mobile .select-dock{height:35px;top:36px}.amap-indoormap-floorbar-control.is-mobile .select-dock:after,.amap-indoormap-floorbar-control.is-mobile .select-dock:before{top:13px}.amap-indoormap-floorbar-control.is-mobile .floor-list-box{height:105px}.amap-indoormap-floorbar-control .floor-list-item .floor-btn{color:#555;font-family:"Times New Roman",sans-serif,"Microsoft Yahei";font-size:16px}.amap-indoormap-floorbar-control .floor-list-item.selected .floor-btn{color:#000}.amap-indoormap-floorbar-control .floor-btn{height:28px;line-height:28px;overflow:hidden;cursor:pointer;position:relative;-webkit-touch-callout:none;-webkit-user-select:none;-khtml-user-select:none;-moz-user-select:none;-ms-user-select:none;user-select:none}.amap-indoormap-floorbar-control .floor-btn:hover{background-color:rgba(221,221,221,.4)}.amap-indoormap-floorbar-control .floor-minus,.amap-indoormap-floorbar-control .floor-plus{position:relative;text-indent:-1000em}.amap-indoormap-floorbar-control .floor-minus:after,.amap-indoormap-floorbar-control .floor-plus:after{content:"";position:absolute;margin:auto;top:9px;left:0;right:0;width:0;height:0;border:solid transparent;border-width:10px 8px;border-top-color:#777}.amap-indoormap-floorbar-control .floor-minus.disabled,.amap-indoormap-floorbar-control .floor-plus.disabled{opacity:.3}.amap-indoormap-floorbar-control .floor-plus:after{border-bottom-color:#777;border-top-color:transparent;top:-3px}.amap-indoormap-floorbar-control .floor-list-box{max-height:153px;position:relative;overflow-y:hidden}.amap-indoormap-floorbar-control .floor-list{margin:0;padding:0;list-style:none}.amap-indoormap-floorbar-control .floor-list-item{position:relative}.amap-indoormap-floorbar-control .floor-btn.disabled,.amap-indoormap-floorbar-control .floor-btn.disabled *,.amap-indoormap-floorbar-control.with-indrm-loader *{-webkit-pointer-events:none!important;pointer-events:none!important}.amap-indoormap-floorbar-control .with-indrm-loader .floor-nonas{opacity:.5}.amap-indoor-map-moverf-marker{color:#555;background-color:#FFFEEF;border:1px solid #7E7E7E;padding:3px 6px;font-size:12px;white-space:nowrap;display:inline-block;position:absolute;top:1em;left:1.2em}.amap-indoormap-floorbar-control .amap-indrm-loader{-moz-animation:amap-indrm-loader 1.25s infinite linear;-webkit-animation:amap-indrm-loader 1.25s infinite linear;animation:amap-indrm-loader 1.25s infinite linear;border:2px solid #91A3D8;border-right-color:transparent;box-sizing:border-box;display:inline-block;overflow:hidden;text-indent:-9999px;width:13px;height:13px;border-radius:7px;position:absolute;margin:auto;top:0;left:0;right:0;bottom:0}@-moz-keyframes amap-indrm-loader{0%{-moz-transform:rotate(0);transform:rotate(0)}100%{-moz-transform:rotate(360deg);transform:rotate(360deg)}}@-webkit-keyframes amap-indrm-loader{0%{-webkit-transform:rotate(0);transform:rotate(0)}100%{-webkit-transform:rotate(360deg);transform:rotate(360deg)}}@keyframes amap-indrm-loader{0%{-moz-transform:rotate(0);-ms-transform:rotate(0);-webkit-transform:rotate(0);transform:rotate(0)}100%{-moz-transform:rotate(360deg);-ms-transform:rotate(360deg);-webkit-transform:rotate(360deg);transform:rotate(360deg)}}</style><script async="" src="./js/saved_resource"></script><script async="" src="./js/analytics.js"></script><script type="text/javascript" src="./js/maps"></script><script id="amap_main_js" src="./js/main" type="text/javascript"></script><style type="text/css">.amap-container{cursor:url(https://webapi.amap.com/theme/v1.3/openhand.cur),default;}.amap-drag{cursor:url(https://webapi.amap.com/theme/v1.3/closedhand.cur),default;}</style>







    
    <title>
        商家自入驻-店铺信息
    </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--iPhone私有标签，表示允许全屏模式浏览，即取消顶部工具栏-->
    <meta name="apple-mobile-web-app-capable" content="yes">
    <!--iPhone私有标签，表示safari顶端的状态条的样式-->
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!--不识别邮件和不把数字识别为电话号码-->
    <meta name="format-detection" content="telephone=no; email=no">
    <meta name="format-detection" content="telephone=no">
    

    <script type="text/javascript">    
        (function(){
            var isiOS = !!navigator.userAgent.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/);
            
            //全局MT变量
            var MT = window.MT = {};
            MT.BOOTSTAMP = new Date().getTime();
            MT.STATIC_ROOT = '';
            MT.UPLOADIMGSIZE = isiOS ? 500 * 1024 : 1 * 1024 * 1024;//最大图片上传大小 IOS 500K 安卓1M
            
            
            window.addEventListener("error",function onImgError(event) {
                //处理全站图片error信息
                var target = event.srcElement ? event.srcElement : event.target;
                if (target.tagName != null && (target.tagName.toLocaleLowerCase() === "img")) {
                    if(typeof $ == "undefined" ) return;

                    if($(target).hasClass('logoimg')) {
                        $(target).addClass("nologoimg");
                    } else {
                        $(target).addClass("noimg");
                    }
                    
                    $(target).removeAttr("alt").removeAttr("title");
                    return;
                }
                
                
                console.log(event);
                // if(event.target!=window && event.target.tagName && event.target.tagName.toLowerCase()=="script"){
                //     if(event.target.src.indexOf("amap.com/count")>=0) return;
                //     if(event.target.src.indexOf("frep.meituan.com")>=0) return;
                //     alert("脚本载入失败："+event.target.src);
                //     return;
                // }
                
                // alert("网站错误：["+event.lineno+","+event.colno+"]"+event.message+"\r\n"+event.filename);
                
            },true);
        })();
    </script>
    <!-- 按需引入 -->
    <!-- <script src="//webapi.amap.com/maps?v=1.3&key=b160c213706218568605440194a24be4"></script> -->

    <link rel="stylesheet" href="./css/kangarooui.css">
    
      <link rel="stylesheet" href="./css/base.css">
    
    
    <!-- perf性能监控平台 -->
   
<script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="base" src="./js/base.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="module/validate" src="./js/validate.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="module/weburls" src="./js/weburls.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="module/utilities" src="./js/utilities.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="module/coordtransform" src="./js/coordtransform.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="vue_module/amapmixin" src="./js/amapmixin.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="vue_module/autoselect" src="./js/autoselect.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="vue_module/imgupload" src="./js/imgupload.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="page/open_store/nav" src="./js/nav.js"></script><script type="text/javascript" charset="utf-8" async="" data-requirecontext="_" data-requiremodule="module/webenum" src="./js/webenum.js"></script></head>

<body>
<div class="wrapper">
    <div class="header">
        <div class="header-wrapper clearfix">
        
            <a href="" class="sitelogo"></a>
            <div class="openstore fl"><a href="">｜我要开店</a></div>
        
            <ul class="links fr clearfix">
                <li class="user-name">
                    <a href="javascript:;" class="user-info"><i class="i-user"></i>Hauser<i class="i-pulldown"></i></a>
                    <div><a href="javascript:;" class="logout J-logout">退出登录</a></div>
                </li>
            </ul>
        </div>
    </div>
    <!-- visibility:hidden为解决Vue载入前显示模板字符串“乱码”的问题 -->
    <div class="main-container">

<div id="navbar" class="navbar"><!----> <div id="nav" class="nav"><ul class="wizard-steps align"><li class="finish active"><a href=""><span class="step">1</span><span class="caption">店铺信息</span></a></li> <li class=""><a href=""><span class="step">2</span><span class="caption">资质信息</span></a></li> <li class=""><a href=""><span class="step">3</span><span class="caption">收款信息</span></a></li> <li class=""><a href=""><span class="step">4</span><span class="caption">认证签约人</span></a></li></ul></div></div>

<div id="base-page" class="stepPage"><form class="no-margin form-horizontal"><div class="form-group"><label class="control-label col-sm-2"><em class="red">*</em>门店名称</label> <div class="col-sm-6 has-error"><input type="text" placeholder="请输入门店名称,不超过15个字" validate="notEmpty, minLen=2, maxLen=15, noEmojiCode" class="form-control"><span class="validate" style="display: inline;">请填写门店名称</span></div></div> <div class="form-group"><label for="" class="control-label col-sm-2"><em class="red">*</em>联系人</label> <div class="col-sm-6"><input type="text" placeholder="请输入真实姓名,不能超过10个字" validate="notEmpty,noSpecialCode,minLen=2,maxlen=10" class="form-control"><span class="validate"></span></div></div> <div class="form-group"><label for="" class="control-label col-sm-2"><em class="red">*</em>外卖电话</label> <div class="col-sm-6"><input type="text" placeholder="请输入手机号" validate="notEmpty,number,phonenumber,minLen=11,maxLen=11" class="form-control"><span class="validate"></span></div></div> <div class="form-group"><label for="" class="control-label col-sm-2"><em class="red">*</em>经营品类</label> <div class="col-sm-8"><div class="row"><div class="col-sm-3"><select class="form-control"><option value="1000">美食</option><option value="19">甜点饮品</option><option value="21">生鲜果蔬</option><option value="20">生活超市</option><option value="22">医药健康</option><option value="1001">鲜花绿植</option><option value="-1">其他</option></select></div> <div class="col-sm-3"><select class="form-control"><option value="2002">冰淇淋</option><option value="171">其他饮品</option><option value="2003">凉茶/龟苓膏</option><option value="170">奶茶果汁</option><option value="169">咖啡</option><option value="2001">中西糕点</option><option value="168">面包蛋糕</option><option value="167">甜品</option></select></div> <div class="col-sm-3"><select class="form-control" style="display: none;"></select></div> <div class="col-sm-3"><span data-toggle="tooltip" data-placement="top" data-original-title="准确的品类会让用户在点餐也更快找到您的店铺" class="tooltip-ele"><i class="fa fa-question-circle"></i></span></div></div></div></div> <div class="line"></div> <div class="form-group"><label for="" class="control-label col-sm-2"><em class="red">*</em>门店区域</label> <div class="col-sm-8"><div class="row"><div class="col-sm-3"><select class="form-control"><option value="">选择省份</option><option value="310000">上海市</option><option value="530000">云南省</option><option value="150000">内蒙古自治区</option><option value="110000">北京市</option><option value="710000">台湾</option><option value="220000">吉林省</option><option value="510000">四川省</option><option value="120000">天津市</option><option value="640000">宁夏回族自治区</option><option value="340000">安徽省</option><option value="370000">山东省</option><option value="140000">山西省</option><option value="440000">广东省</option><option value="450000">广西壮族自治区</option><option value="650000">新疆维吾尔自治区</option><option value="320000">江苏省</option><option value="360000">江西省</option><option value="130000">河北省</option><option value="410000">河南省</option><option value="330000">浙江省</option><option value="460000">海南省</option><option value="420000">湖北省</option><option value="430000">湖南省</option><option value="820000">澳门特别行政区</option><option value="620000">甘肃省</option><option value="350000">福建省</option><option value="540000">西藏自治区</option><option value="520000">贵州省</option><option value="210000">辽宁省</option><option value="500000">重庆市</option><option value="610000">陕西省</option><option value="630000">青海省</option><option value="810000">香港特别行政区</option><option value="230000">黑龙江省</option></select></div> <div class="col-sm-3"><select class="form-control"><option value="">选择城市</option><option value="110100">北京市</option></select></div> <div class="col-sm-3"><select class="form-control"><option value="">选择县区</option><option value="110101">东城区</option><option value="110106">丰台区</option><option value="110115">大兴区</option><option value="110228">密云区</option><option value="110117">平谷区</option><option value="110229">延庆区</option><option value="110116">怀柔区</option><option value="110111">房山区</option><option value="110114">昌平区</option><option value="110105">朝阳区</option><option value="110108">海淀区</option><option value="110107">石景山区</option><option value="110102">西城区</option><option value="110112">通州区</option><option value="110109">门头沟区</option><option value="110113">顺义区</option></select></div></div></div></div> <div class="form-group"><label for="" class="control-label col-sm-2"><em class="red">*</em>门店地址</label> <div class="col-sm-6"><input type="text" placeholder="详细至门牌号, 与营业执照地址一致" validate="notEmpty,minLen=3,maxLen=50,noEmojiCode,notEndWithOptions=路|道|街" id="shopaddress" class="form-control"><span class="validate" style="display: none;"></span></div></div> <div class="form-group"><label for="" class="control-label col-sm-2"><em class="red">*</em>门店坐标</label> <div class="col-sm-9"><div id="map-container"><div id="autocomplate-container"><input type="text" id="autocomplate-input" placeholder="输入门店详细地址,越详细定位越精准"> <a class="btn search"><i aria-hidden="true" class="fa fa-search"></i></a></div>  <div id="amap-container" class="amap-container" style="position: relative; background: rgb(252, 249, 242); cursor: url(&quot;), default;"><object style="display: block; position: absolute; top: 0; left: 0; height: 100%; width: 100%; overflow: hidden; pointer-events: none; z-index: -1;" type="text/html" data="./css/saved_resource.html"></object><div class="amap-maps"><div class="amap-drags"><div class="amap-layers" style="transform: translateZ(0px);"><canvas class="amap-layer" width="710" height="340" style="position: absolute; z-index: 0; top: 0px; left: 0px; height: 340px; width: 710px;"></canvas><canvas class="amap-labels" draggable="false" style="position: absolute; z-index: 99; height: 340px; width: 710px; top: 0px; left: 0px;" width="710" height="340"></canvas><div class="amap-markers" style="position: absolute; z-index: 120; top: 194px; left: 426px;"><div class="amap-marker" style="top: -55px; left: -80px; z-index: 100; transform: rotate(0deg); transform-origin: 9px 31px 0px; display: block;"><div class="amap-icon" style="position: absolute; overflow: inherit; opacity: 1;"><img src="./images/location_marker.png" style="top: 0px; left: 0px;"></div></div></div><div class="amap-e" style="z-index: 11; opacity: 1;"><div class="amap-custom amap-indoor-map"><div class="floor-outline-image-con"></div><div class="floor-image-con"></div><div class="highlight-image-con"></div><div class="label-image-con"></div></div></div></div><div class="amap-overlays"><div class="amap-info" style="position: absolute; left: 206px; top: 170px;"><div style="position: absolute; bottom: 30px; left: -9px; display: block;"></div><div style="position: absolute; bottom: 30px; left: -9px;"><div><div class="amap-info-content amap-info-outer"><div><div class="marker-content"><div class="marker-content-header"><div class="marker-circle"><span class="fa fa-check"></span></div> <span class="notice">已将坐标定位为</span></div> <div class="marker-info"><div class="marker-name">北京市昌平区沙河镇兄弟连IT教育北京市育荣教育园区</div> <div class="marker-address">地址:昌平区北清路69号</div></div> <a class="btn btn-success" style="display: none;">确定</a></div></div></div><a class="amap-info-close" href="javascript: void(0)" style="right: 5px;">×</a><div class="amap-info-sharp" style="height: 23px;"></div></div></div></div></div></div></div><div style="display: none;"><div class="amap-info" style="position: absolute; left: 206px; top: 255px;"><div style="position: absolute; bottom: 30px; left: -9px; display: block;"></div><div style="position: absolute; bottom: 30px; left: -9px;"><div><div class="amap-info-content amap-info-outer"></div><a class="amap-info-close" href="javascript: void(0)" style="right: 5px;">×</a><div class="amap-info-sharp" style="height: 23px;"></div></div></div></div><div class="amap-info" style="position: absolute; left: 206px; top: 170px;"><div style="position: absolute; bottom: 30px; left: -9px; display: block;"></div><div style="position: absolute; bottom: 30px; left: -9px;"><div><div class="amap-info-content amap-info-outer"></div><a class="amap-info-close" href="javascript: void(0)" style="right: 5px;">×</a><div class="amap-info-sharp" style="height: 23px;"></div></div></div></div></div><div class="amap-controls"><div class="amap-toolbar" style="left: 10px; top: 10px; visibility: visible;"><div class="amap-pancontrol" style="position: relative; display: block;"><div class="amap-pan-left"></div><div class="amap-pan-top"></div><div class="amap-pan-right"></div><div class="amap-pan-bottom"></div></div><div class="amap-locate" style="position: relative; left: 17px; display: block;"></div><div class="amap-zoomcontrol" style="position: relative; left: 14px;"><div class="amap-zoom-plus amap-zoom-plus2"></div><div class="amap-zoom-ruler" style="display: block;"><div class="amap-zoom-mask" style="height: 0px;"></div><div class="amap-zoom-cursor" style="top: 0px;"></div><div class="amap-zoom-labels" style="display: none;"><div class="amap-zoom-label-street"></div><div class="amap-zoom-label-city"></div><div class="amap-zoom-label-province"></div><div class="amap-zoom-label-country"></div></div></div><div class="amap-zoom-minus"></div></div></div><div class="amap-scalecontrol" style="left: 2px; bottom: 20px; visibility: visible;"><div class="amap-scale-text" style="width: 117.465px;">50 米</div><div class="amap-scale-line"><div class="amap-scale-edgeleft"></div><div class="amap-scale-edgeright" style="left: 110.465px;"></div><div class="amap-scale-middle" style="width: 109.465px;"></div></div></div><div class="amap-indoormap-floorbar-control" style="display: none;"></div></div><a class="amap-logo" href="" target="_blank"><img src="./images/autonavi.png"></a><div class="amap-copyright" style="display: none;"><!--v1.3.28--> © 2017 AutoNavi <span class="amap-mcode">- GS(2016)710号</span></div></div></div></div></div> <div class="form-group"><label class="control-label col-sm-2 narrowed"><em class="red">*</em>配送方式</label> <div class="col-sm-9"><div class="radio"><label class="label-radio"><input type="radio" name="type" value="0"> <span class="custom-radio"></span> 商家自配送
                    <span data-toggle="tooltip" data-placement="top" data-original-title="可能会收取一定的平台使用费，提交申请后会有业务员与您电话沟通具体事宜！" class="tooltip-ele"><i class="fa fa-question-circle"></i></span></label> <label class="label-radio"><input type="radio" name="type" value="1"> <span class="custom-radio"></span> 申请美团配送 
                    <span data-toggle="tooltip" data-placement="top" data-original-title="提交申请后会有业务员沟通电话沟通配送分成比例，不会另收平台使用费！" class="tooltip-ele"><i class="fa fa-question-circle"></i></span> <span class="out-meituan">（会有美团业务人员与您沟通具体事宜）</span> <span class="out-meituan" style="display: none;">（抱歉，您店铺所在位置暂时不支持美团配送）</span></label></div></div></div> <div class="line"></div> <div class="form-group"><label class="control-label col-sm-2"><em class="red">*</em>门脸图</label> <div class="col-sm-9"><div validate="notEmpty" class="img-panel shop_front_url_panel"><div class="row"><div class="col-sm-5"><ul><li>需拍出完整门匾、门框（建议正对门店2米处拍摄）</li></ul></div> <div class="col-sm-7"><div class="row"><div class="col-sm-6"><div class="imgupload" refname="shop_front_url"><input type="file" accept="image/jpg,image/jpeg,image/png" class="file"> <!----> <div class="delete" data-original-title="" title="" style="display: none;"></div> <div class="reupload" style="display: none;">重新上传</div> <div class="loading" style="display: none;"></div> <div class="imgexample" style="background-image: url(&quot;&quot;); display: none;"></div> <div class="example" style="display: none;">示例</div></div></div> <div class="col-sm-6"><div class="imgupload"><input type="file" accept="image/jpg,image/jpeg,image/png" class="file"> <!----> <div class="delete" style="display: none;"></div> <div class="reupload" style="display: none;">重新上传</div> <div class="loading" style="display: none;"></div> <div class="imgexample" style="background-image: url(&quot;./images/bigfacade.jpg&quot;);" data-original-title="" title=""></div> <div class="example">示例</div></div></div></div></div></div></div><span class="validate" style="display: none;"></span></div></div> <div class="form-group"><label class="control-label col-sm-2"><em class="red">*</em>店内环境图</label> <div class="col-sm-9"><div validate="notEmpty" class="img-panel environmental_url_panel"><div class="row"><div class="col-sm-5"><ul><li>需真实反映用餐环境（收银台、用餐桌椅）</li></ul></div> <div class="col-sm-7"><div class="row"><div class="col-sm-6"><div class="imgupload" refname="environmental_url"><input type="file" accept="image/jpg,image/jpeg,image/png" class="file"> <!----> <div class="delete" style="display: none;"></div> <div class="reupload" style="display: none;">重新上传</div> <div class="loading" style="display: none;"></div> <div class="imgexample" style="background-image: url(&quot;&quot;); display: none;"></div> <div class="example" style="display: none;">示例</div></div></div> <div class="col-sm-6"><div class="imgupload"><input type="file" accept="image/jpg,image/jpeg,image/png" class="file"> <!----> <div class="delete" style="display: none;"></div> <div class="reupload" style="display: none;">重新上传</div> <div class="loading" style="display: none;"></div> <div class="imgexample" style="background-image: url(&quot;./images/bigenvironment.jpg&quot;);" data-original-title="" title=""></div> <div class="example">示例</div></div></div></div></div></div></div><span class="validate"></span></div></div> <div class="form-group"><label class="control-label col-sm-2">店铺商标图(选填)</label> <div class="col-sm-9"><div class="img-panel shop_logo_url_panel"><div class="row"><div class="col-sm-5"><ul><li>需体现您店铺的特色，可吸引更多的用户进店点餐</li> <li>可用美团外卖的袋鼠图标代替</li></ul></div> <div class="col-sm-7"><div class="row"><div class="col-sm-6"><div class="imgupload"><input type="file" accept="image/jpg,image/jpeg,image/png" class="file"> <!----> <div class="delete" style="display: none;"></div> <div class="reupload" style="display: none;">重新上传</div> <div class="loading" style="display: none;"></div> <div class="imgexample" style="background-image: url(&quot;&quot;); display: none;"></div> <div class="example" style="display: none;">示例</div></div></div> <div class="col-sm-6"><div class="imgupload"><input type="file" accept="image/jpg,image/jpeg,image/png" class="file"> <!----> <div class="delete" style="display: none;"></div> <div class="reupload" style="display: none;">重新上传</div> <div class="loading" style="display: none;"></div> <div class="imgexample" style="background-image: url(&quot;./images/biglogo.jpg&quot;);" data-original-title="" title=""></div> <div class="example">示例</div></div></div></div></div></div></div></div></div> <div class="form-group"><label class="control-label col-sm-2"></label> <div class="col-sm-9"><div class="panel panel-default"><div class="panel-footer"><div class="row"><div class="form-group"><label class="control-label col-sm-3">其他平台开店链接</label> <div class="col-sm-9"><input type="text" placeholder="选填,填写网址可快速开店" validate="url" class="form-control"><span class="validate"></span></div></div></div></div></div></div></div></form> <div class="btns"><button type="button" class="btn btn-default">上一步</button> <button type="button" class="btn btn-primary">提交并进入下一步</button> <!----> <!----></div> <!----> <div id="submit-modal" tabindex="-1" role="dialog" aria-labelledby="kui-docs-example-modal-11label" class="modal fade"><div role="document" class="modal-dialog modal-sm"><div class="modal-content"><div class="modal-body">
                请确认所有驳回项全部修改完毕后在进行提交
            </div> <div class="modal-footer"><button type="button" data-dismiss="modal" class="btn btn-primary btn-stable">确定</button> <button type="button" data-dismiss="modal" class="btn btn-default btn-stable">取消</button></div></div></div></div></div>

    
      </div>
      <div class="footer">
        <div class="footer__line"></div>
        <div class="footer__main">
          <ul class="more-lists clearfix">
            <li class="item-list">
              <span class="item-list__list-name">用户帮助</span>
              <ul class="item-list__list-details">
                <li>
                  <em class="i-point"></em><a href="">常见问题</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="">用户反馈</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="">诚信举报</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="">线上体验店</a>
                </li>
              </ul>
            </li>
            <li class="item-list">
              <span class="item-list__list-name">获取更新</span>
              <ul class="item-list__list-details">
                <li>
                  <em class="i-point"></em><a href="">iPhone/Android</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="">美团外卖新浪微博</a>
                </li>
                <li>
                  <em class="i-point"></em>公众号：美团外卖
                </li>
              </ul>
            </li>
            <li class="item-list">           
              <span class="item-list__list-name">商务合作</span>
              <ul class="item-list__list-details">
                <li>
                  <em class="i-point"></em><a href="">我要开店</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="">配送合作申请入口</a>
                </li>
              </ul>
            </li>
            <li class="item-list">
              <span class="item-list__list-name">公司信息</span>
              <ul class="item-list__list-details">
                <li>
                  <em class="i-point"></em><a href="">关于美团</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="">媒体报道</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="">加入我们</a>
                </li>
              </ul>
            </li>
            <li class="item-list">
              <div class="item-list__hot-link">
                <em class="i-hot-link"></em>
                <span class="telephone">客服电话</span>
                <strong class="telephone-num">4008507777</strong>
                <span class="time">周一到周日9:00-23:00 </span>
                <span class="telephone">客服不受理商务合作</span>
              </div>
            </li>
          </ul>
          <div class="copy-right">©2012 meituan.com 京ICP证070791号 京公网安备110105002099号</div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="./js/jquery.js"></script>
    <script type="text/javascript" src="./js/kangarooui.js"></script>
    <script type="text/javascript" src="./js/vue2.js"></script>
    
    

         
      <script type="text/javascript"  src="./js/r.js"></script>
    
    <script type="text/javascript" src="./js/common.js"></script>
    <script>
      MT.FORMRENDER = {"settings":{"x-powered-by":true,"etag":"weak","env":"production","query parser":"extended","subdomain offset":2,"trust proxy":false,"views":"/opt/meituan/apps/waimai_e_kaidian_web/views","jsonp callback name":"callback","view cache":true,"view engine":"ejs","port":8222},"enrouten":{"routes":{}},"REFERRER":"","userid":-27310083,"username":"Hauser","title":"店铺信息","pagename":"base","navbar":{"icoClassArr":["","current","","",""]},"step":{"base":{"step":"base","stepText":"店铺信息","stepStatus":"needImprove_nowWrite","stepStatusText":"立即录入","data":{"address":"","contractName":"","contractTel":"","firstTag":0,"shopName":"","status":1,"tagId":0},"ico":"","color":"color-primary","disabled":false,"taskStatus":"needImprove","taskStatusText":"待完善","reject":null},"qualification":{"step":"qualification","stepText":"资质信息","stepStatus":"needImprove_noRecord","stepStatusText":"","ico":"","color":"","disabled":true,"taskStatus":"needImprove","taskStatusText":"待完善","reject":null},"account":{"step":"account","stepText":"收款信息","stepStatus":"needImprove_noRecord","stepStatusText":"","ico":"","color":"","disabled":true,"taskStatus":"needImprove","taskStatusText":"待完善","reject":null},"certification":{"step":"certification","stepText":"认证签约人","stepStatus":"needImprove_noRecord","stepStatusText":"","ico":"","color":"","disabled":true,"taskStatus":"needImprove","taskStatusText":"待完善","reject":null}},"pageData":{"address":"","contractName":"","contractTel":"","firstTag":0,"shopName":"","status":1,"tagId":0},"ticketId":"","userinfo":{"userid":-27310083,"username":"Hauser","usermobile":""},"taskId":"2350205","source":"1","query":{"taskId":"2350205","source":"1","status":"needImprove"},"_locals":{"userid":-27310083,"username":"Hauser"},"cache":true};//若ejs页面使用formRender模块渲染的则会有此字段数据
      delete MT.FORMRENDER._locals;
      delete MT.FORMRENDER.enrouten;
      delete MT.FORMRENDER.settings;
      delete MT.FORMRENDER.cache;
    </script>
  
<div class="amap-sug-result" style="visibility: hidden; left: 444px; top: -121px; min-width: 402px;"></div></body></html>

@endsection