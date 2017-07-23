<!DOCTYPE HTML>
<!--[if IE 9]><html class="ie9"><![endif]-->
<!--[if IE 8]><html class="ie8"><![endif]-->
<!--[if IE 7]><html class="ie7"><![endif]-->
<!--[if IE 6]><html class="ie6"><![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--><html><!--<![endif]-->
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
      <meta name="baidu-site-verification" content="Qu9OzfSVVJ" />
      <meta name="keywords" content="外卖">
      <meta name="description" content="外卖网上订餐服务。">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="initial-scale=1.0, user-scalable=no, width=device-width">
      <title>外卖送餐</title>

      <link rel="shortcut icon" type="image/vnd.microsoft.icon" href="/static/img/favicon_1.ico">
      <link rel="icon" href="/static/img/favicon_1.ico" size="16x16 32x32">
      <link rel="stylesheet" href="{{ asset('home/css/map-n.css') }}" />
      <script src="{{asset('assets/js/jquery.min.js')}}"></script>
      <script src="{{asset('home/js/home.js')}}"></script>
      {{--<script type="text/javascript" src="{{ asset('home/js/c2866a784a0f41a1bccf3b7f12f20e9d.js') }}"></script>--}}
      <script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=867e44f0ea66a3b4cf241d3ae8528ed3&plugin=AMap.CitySearch,AMap.Scale,AMap.OverView,AMap.Autocomplete,AMap.PlaceSearch,AMap.Geocoder"></script>
      <script type="text/javascript" src="http://cache.amap.com/lbs/static/addToolbar.js"></script>
      <style>
          .button-group .button {
              height: 28px;
              line-height: 28px;
              background-color: #0D9BF2;
              color: #FFF;
              border: 0;
              outline: none;
              padding-left: 5px;
              padding-right: 5px;
              border-radius: 3px;
              margin-bottom: 4px;
              cursor: pointer;
          }
          .button-group {
              position: absolute;
              bottom: 10px;
              left: 10px;
              font-size: 12px;
              padding: 10px;
              z-index: 9;
          }
          #panel {
              position: absolute;
              background-color: white;
              max-height: 100%;
              overflow-y: auto;
              top: 30%;
              right: 0px;
              width: 280px;
          }
      </style>
	</head>
	<body>
<div class="top-wrap">
    <div class="top-bg"></div>
    <div class="top-banner">
        <div class="logo fl"><img src="picture/logo-n.png"></div>
        <div class="userbar fr">
    @if(empty(session('home_user')))
    <span id="dis-login" class="top-disloginbar fl">
        <a class="j-register register-btn fl" href="{{ url('/home/register') }}" rel="nofollow">注册</a>
        <span class="lg-divide fl">|</span>
        <a class="j-login login-btn fl" href="{{ url('/home/login') }}" rel="nofollow">登录</a>
    </span>
    @elseif(!empty(session('home_user')))
    <span id="dis-login" class="top-disloginbar fl">
        <a class="j-login login-btn fl" href="{{ url('/home/mynumber') }}" rel="nofollow">{{ session('home_user')['uname'] }}</a>
        <i class="icon i-top-yarrow"></i>
    </span>
    @endif
        <!-- <a class="j-download download-btn fl" href="http://waimai.meituan.com/mobile/download/default" target="_blank"><img src="picture/phone.svg">下载手机版</a> -->
        </div>
    </div>
    <div class="map" id="map">
        <div class="top">
            <!-- 引导显示图标 -->
            <div class="guider" style="visibility: hidden;height: 120px;" id="guider">
                <div class="bg">
                    <a href="javascript:;" class="cross" id="tipclose"></a>
                    <div class="title clearfix">
                        <span class="s-1">1.选城市</span>
                        <span class="s-2">2.搜位置</span>
                        <span class="s-3">3.叫外卖</span>
                        <span class="s-4">4.享美食</span>
                        <span class="s-5">5.来评价</span>
                    </div>

                    <div class="choose-city"></div>
                    <div class="choose-poi"></div>
                    <div></div>
                </div>
            </div>

            <!-- 输入具体的地址调用地图接口 -->
            <div class="address clearfix m-shadow" id="address" data-epr2t="true">

                <div class="fl current-city">
                    <a href="javascript:;" class="city" id="citylist" data-ispoi="0" data-cid="110100" data-cityid="110100" data-pinyin="">
                        <span>北京</span>
                        <b class="triangle-down"></b><span class="dvd-line"></span>
                    </a>
                </div>
                <div class="fl address-input">
                    <div class="input-container clearfix">
                        <form action="{{ asset('home/index') }}" method="gett" id="art_form">
                            <input type="text" id="searchKeywords" name="searchKeywords" placeholder="输入详细地址搜索附近商家" class="fl" value="" />
                            <input type="hidden" id="excoorx" name="excoorx" value="">
                            <input type="hidden" id="excoory" name="excoory" value="">
                            <a href="javascript:;" class="fl" id="search" onclick="addrSearch()">选好啦</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="result hidden" id="result">
            <div class="loading">

            </div>
        </div>
        <div class="container" id="container" style="display:none;top:30%">
            <div class="button-group">
                <input type="button" class="button" value="显示当前城市" onclick="showCityInfo()"/>
            </div>
            {{--<div id="tip"></div>--}}
        </div>
        <div id="panel"></div>


    </div>
</div>

<div class="merchant-join">
    <div class="content">
        <h3>商家入驻</h3>
        <p>平台优势，成单量更有保障</p>
    </div>
    <a class="join-btn" href="{{ url('/home/seller/ruzhu') }}">立即入驻 &gt;</a>
</div>

<div id="map-footer" class="map-footer">
    <div class="map-footer-inner">
        <div class="map-footer-entry">
            <a class="map-footer-link kaidian_address" href="{{ url('/home/seller/ruzhu') }}">我要开店</a>
            <i class="map-footer-separator">|</i>
            <a class="map-footer-link" href="javascript:;" >配送加盟</a>
        </div>
        <div class="map-footer-copyright">&copy;2015 meituan.com <a  href="#">京ICP证070791号</a> 京公网安备11010502025545号</div>
    </div>
</div>
    <script type="text/javascript" data-main="/static/js/page/map/seedsnew" src="{{ url('home/js/r.js') }}"></script>


<script type="text/javascript">
    var map = new AMap.Map("container", {
        resizeEnable: true,
        center: [116.39, 39.9],
        zoom: 13
    });

    //输入提示
    var autoOptions = new AMap.Autocomplete({
        input: "searchKeywords",
        citylimit: true,
    });
    var cityPY = document.getElementById('citylist').getAttribute('data-pinyin');
    autoOptions.city = cityPY;
    var placeSearch = new AMap.PlaceSearch({
        map: map,
        pageSize: 1,
        citylimit: true,
    });  //构造地点查询类

    map.on('click', function(e) {
//        alert('您在[ '+e.lnglat.getLng()+','+e.lnglat.getLat()+' ]的位置点击了地图！');
        lnglatXY = [e.lnglat.getLng(), e.lnglat.getLat()]; //已知点坐标
        function regeocoder() {  //逆地理编码
            var geocoder = new AMap.Geocoder({
                radius:1000, //范围，默认：500
                extensions: "all",
            });
//            alert(lnglatXY[0]);
            geocoder.getAddress(lnglatXY, function(status, result) {
                if (status === 'complete' && result.info === 'OK') {
                    geocoder_cb(result);
                }
            });
            var marker = new AMap.Marker({  //加点
                map: map,
                position: lnglatXY,
            });
            map.setFitView();
        }
        regeocoder();
        function geocoder_cb(data) {
            var address1 = data.regeocode.formattedAddress; //返回地址描述
//            alert(address1);
            document.getElementById("searchKeywords").value = address1;
            document.getElementById("excoorx").value = lnglatXY[0];
            document.getElementById("excoory").value = lnglatXY[1];
            document.getElementById("container").style = 'display:block;top:30%';
        }
    });

    //获取用户所在城市信息
    function showCityInfo() {
        //实例化城市查询类
        var citysearch = new AMap.CitySearch();
        //自动获取用户IP，返回当前城市
        citysearch.getLocalCity(function(status, result) {
            if (status === 'complete' && result.info === 'OK') {
                if (result && result.city && result.bounds) {
                    var cityinfo = result.city;
                    var citybounds = result.bounds;
//                    alert(citybounds);
//                  document.getElementById('tip').innerHTML = '您当前所在城市：'+cityinfo;
                    document.getElementById('citylist').children[0].innerHTML = cityinfo;
                    document.getElementById('autoaddr').innerHTML = cityinfo;
                    document.getElementById("container").style = 'display:block;top:30%';
                    //地图显示当前城市
                    map.setBounds(citybounds);
                }
            } else {
                document.getElementById('tip').innerHTML = result.info;
                document.getElementById("container").style = 'display:block;top:30%';
            }
        });
    }
    AMap.event.addListener(autoOptions, "select", select);//注册监听，当选中某条记录时会触发
    function select(e) {
//        alert(e.poi.name);
//        alert(e.poi.adcode);
        placeSearch.setCity(cityPY);
//        placeSearch.city(e.poi.adcode);
        placeSearch.search(e.poi.name);  //关键字查询查询
        var geocoder = new AMap.Geocoder({
            radius:1000, //范围，默认：500
            extensions: "all",
        });
        //地理编码,返回地理编码结果
        geocoder.getLocation(e.poi.name, function(status, result) {
            if (status === 'complete' && result.info === 'OK') {
                geocoder_CallBack(result);
            }
        });
    }
    //地理编码返回结果展示
    function geocoder_CallBack(data) {
        var resultStr = "";
        var excoorx = "";
        var excoory = "";
        var exaddr = "";
        //地理编码结果数组
        var geocode = data.geocodes;
        for (var i = 0; i < geocode.length; i++) {
            //拼接输出html
            excoorx += geocode[i].location.getLng();
            excoory += geocode[i].location.getLat();
            exaddr += geocode[i].formattedAddress;
            resultStr += "<span style=\"font-size: 12px;padding:0px 0 4px 2px; border-bottom:1px solid #C1FFC1;\">" + "<b>地址</b>：" + geocode[i].formattedAddress + "" + "&nbsp;&nbsp;<b>的地理编码结果是:</b><b>&nbsp;&nbsp;&nbsp;&nbsp;坐标</b>：" + geocode[i].location.getLng() + ", " + geocode[i].location.getLat() + "" + "<b>&nbsp;&nbsp;&nbsp;&nbsp;匹配级别</b>：" + geocode[i].level + "</span>";
//            addMarker(i, geocode[i]);
        }
        map.setFitView();
//        alert(resultStr);
        console.log(geocode[i]);
//        document.getElementById("result").innerHTML = resultStr;
        document.getElementById("excoorx").value = excoorx;
        document.getElementById("excoory").value = excoory;
        document.getElementById("searchKeywords").value = exaddr;
        document.getElementById("container").style = 'display:block;top:30%';
    }

    function addrSearch(){
            var search = document.getElementById('searchKeywords').value;
            var excoorx = document.getElementById("excoorx").value;
            var excoory = document.getElementById("excoory").value;
            if(search == ''){
                alert('地址不可以为空');
                return false;
            }else if(excoorx == '' || excoory == ''){
                alert('地址不符合规则');
                return false;
            }else{
                document.getElementById('art_form').submit();
            }

    }

    function setCity(cityName){
//        var cityName = document.getElementById('cityName').value;
        if (!cityName) {
            cityName = '北京市';
        }
        map.setCity(cityName);
    }




</script>
<div class="tangram-suggestion-main" id="tangram-suggestion--TANGRAM__2-main" data-guid="TANGRAM__2" style="position: absolute; display: none; left: 399px; top: 316px; width: 510px;">
    <div id="tangram-suggestion--TANGRAM__2" class="tangram-suggestion" style="position:relative; top:0px; left:0px">

    </div>
</div>
@include('home/addr/select')
<script type="text/javascript">
        $(function(){
            $('#citylist').click(function(){
    //        alert($);
                $(".dialog-citylist").slideToggle('normal',function(){
                    showCityInfo();
                });
            });
            $('.city-target').click(function(){
                var cityid = $(this).attr("data-cityid");
                var pinyin = $(this).attr("data-pinyin");
                var value = $(this).text();
                $('#citylist').attr({'data-cityid':cityid,"data-pinyin":pinyin});
                $('#citylist span').eq(0).text(value);
                $(".dialog-citylist").slideToggle();
//                alert(value);
                setCity(value);
            });
            $(document).keydown(function(event){
                if(event.keyCode==13){
                    alert('不能点回车键哦');
                }
            });
        });
</script>
	</body>
</html>
