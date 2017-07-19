<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <link rel="stylesheet" type="text/css" href="{{asset('home/css/style1.3.28.4.css')}}" />

   <!-- 地图输入表单样式和城市联动样式 start -->
    <style type="text/css">
       #container {
           position: relative;
           width: 710px;
           height: 340px;
       }
       .bs-glyphicons .glyphicon {
           margin-top: 5px;
           margin-bottom: 10px;
           font-size: 24px;
       }
       .glyphicon {
           position: relative;
           top: 1px;
           display: inline-block;
           font-family: 'Glyphicons Halflings';
           font-style: normal;
           font-weight: 400;
           line-height: 1;
           -webkit-font-smoothing: antialiased;
           -moz-osx-font-smoothing: grayscale;
       }
       input[type="file"] {
            opacity: 1 !important;
            filter: alpha(opacity=1);
        }
    </style>
   <!-- 地图输入表单样式和城市联动样式 end -->

     <!-- 地图输入表单搜索图标应用 start -->

    <!-- 最新版本的 Bootstrap 核心 CSS 文件  -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

     <!-- 可选的 Bootstrap 主题文件（一般不用引入） -->
    <link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- 最新的 Bootstrap 核心 JavaScript 文件 -->
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    <!-- 地图输入表单搜索图标应用 end  -->

    <script async="" src="{{asset('home/js/saved_resource')}}"></script>
    <script async="" src="{{asset('home/js/analytics.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/maps')}}"></script>
    <script id="amap_main_js" src="{{asset('home/js/main')}}" type="text/javascript"></script>

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
    
    <!-- 按需引入 -->
    <!-- <script src="//webapi.amap.com/maps?v=1.3&key=b160c213706218568605440194a24be4"></script> -->

    <link rel="stylesheet" href="{{asset('home/css/kangarooui.css')}}">

     <link rel="stylesheet" href="{{asset('home/css/base.css')}}">
    <!-- - 高德地图引入 start  -->
<script type="text/javascript" src="http://webapi.amap.com/maps?v=1.3&key=867e44f0ea66a3b4cf241d3ae8528ed3&plugin=AMap.Geocoder,AMap.Autocomplete,AMap.PlaceSearch"></script>
<script type="text/javascript" src="http://cache.amap.com/lbs/static/addToolbar.js"></script>
     <!-- 高德地图引入  -->

</head>

<body>
<div class="wrapper">
    <div class="header">
        <div class="header-wrapper clearfix">
        
            <a href="" class="sitelogo"></a>
            <div class="openstore fl"><a href="">｜我要开店</a></div>
        
            <ul class="links fr clearfix">
                <li class="user-name">
                    <a href="javascript:;" class="user-info"><i class="i-user"></i>{{$seller_user->sname}}<i class="i-pulldown"></i></a>
                    <div><a href="{{url('/seller/quit')}}" class="logout J-logout">退出登录</a></div>
                </li>
            </ul>
        </div>
    </div>
    <!-- visibility:hidden为解决Vue载入前显示模板字符串“乱码”的问题 -->
    <div class="main-container">

        <div id="navbar" class="navbar">
            <!---->
            <div id="nav" class="nav">
                <ul class="wizard-steps align">
                    <li class="finish active"><a href=""><span class="caption">店铺信息</span></a></li>
                </ul>
            </div>
        </div>
        <div id="base-page" class="stepPage">
            
            <form class="no-margin form-horizontal" method="post" id="art_form" action="">
                {{csrf_field()}}
                <input type="hidden" name="sid" value="{{$seller_user->sid}}">
                <div class="form-group">
                    <label class="control-label col-sm-2"><em class="red">*</em>门店名称</label>
                    <div class="col-sm-6 has-error">
                        <input type="text" id="exname" name="exname" placeholder="请输入门店名称,不超过15个字" value="{{ old('exname') }}" style="width: 100%;height: 34px;    border-radius: 4px;border: 1px solid #d2d2d2;" class="" />
                        
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-2"><em class="red">*</em>联系人</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="请输入真实姓名,不能超过10个字" name="contacts" id="contacts" value="{{ old('contacts') }}" class="form-control" />
                        <span class="validate"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-2"><em class="red">*</em>外卖电话</label>
                    <div class="col-sm-6">
                        <input type="text" placeholder="请输入手机号"  value="{{ old('extel') }}" name="extel" id="extel" validate="notEmpty,number,phonenumber,minLen=11,maxLen=11" class="form-control" />
                        <span class="validate"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-2"><em class="red">*</em>经营品类</label>
                    <div class="col-sm-8">
                        <select name="csid" id="csid">
                             <option selected value="sel">---请选择---</option>
                            @foreach($data as $k=>$v)
                                <option value="{{$v->csid}}">{{$v->csname}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                 <!-- 城市三级联动 start -->
                <div class="line"></div>
                <div class="form-group">
                    <label for="" class="control-label col-sm-2"><em class="red">*</em>门店区域</label>
                    <div class="col-sm-8">
                        <div class="row">
                            <div  class="col-sm-3">
                                <select id="s_province" name="s_province" class="form-control"></select>
                            </div>
                            <div class="col-sm-3">
                                <select id="s_city" name="s_city" class="form-control"></select>
                            </div>
                            <div class="col-sm-3">
                                <select id="s_county" name="s_county" class="form-control"></select>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- 城市三级联动 end  -->
                <div class="form-group">
                    <label for="" class="control-label col-sm-2"><em class="red">*</em>门店地址</label>
                    <div class="col-sm-6">
                        <input type="text"  value="{{ old('exaddr') }}" name="exaddr" id="exaddr" placeholder="详细至门牌号, 与营业执照地址一致" validate="notEmpty,minLen=3,maxLen=50" class="form-control" />
                        <span class="validate" style="display: none;"></span>
                    </div>
                </div>
                 <!-- 高德地图动态获取输入地址的坐标 start -->
                <div class="form-group">
                    <label for="" class="control-label col-sm-2"><em class="red">*</em>门店坐标</label>
                    <div class="col-sm-9">
                        <div id="container">
                            <div id="autocomplate-container">
                                <input type="text" id="autocomplate-input" placeholder="输入门店详细地址,越详细定位越精准" value="">
                                <input type="hidden" id="excoorx" name="excoorx" value="">
                                <input type="hidden" id="excoory" name="excoory" value="">
                                <a class="btn search">
                                    <i aria-hidden="true" class="glyphicon glyphicon-search"></i>
                                </a>
                            </div>
                            <div id="tip">

                                <span id="result"></span>
                            </div>
                        </div>
                    </div>
                </div>
                 <!-- 高德地图动态获取输入地址的坐标 end -->
               
                <div class="line"></div>
                <div class="form-group">
                    <label class="control-label col-sm-2"><em class="red">*</em>门脸图</label>
                    <div class="col-sm-9">
                        <div validate="notEmpty" class="img-panel shop_front_url_panel">
                            <div class="row">
                                <div class="col-sm-5">
                                    <ul>
                                        <li>需拍出完整门匾、门框（建议正对门店2米处拍摄）</li>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="" refname="shop_front_url">
                                                <img name="" class="pic" style="max-width:150px;">
                                                <input type="file" class="file_upload" value="">
                                                <input  type="hidden" name="eximage" class="inp" value="">
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="validate" style="display: none;"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2"><em class="red">*</em>商家logo</label>
                    <div class="col-sm-9">
                        <div validate="notEmpty" class="img-panel shop_front_url_panel">
                            <div class="row">
                                <div class="col-sm-5">
                                    <ul>
                                        <li>您独一无二的logo</li>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="" refname="shop_front_url">
                                                <img name="" class="pic" style="max-width:150px;">
                                                <input type="file" class="file_upload" value="">
                                                <input type="hidden" name="slogo" class="inp" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="validate" style="display: none;"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2"><em class="red">*</em>营业执照</label>
                    <div class="col-sm-9">
                        <div validate="notEmpty" class="img-panel shop_front_url_panel">
                            <div class="row">
                                <div class="col-sm-5">
                                    <ul>
                                        <li>确保您的营业执照的时间在有效期内</li>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="" refname="shop_front_url">
                                                <img name="" class="pic" style="max-width:150px;">
                                                <input type="file" class="file_upload" value="">
                                                <input type="hidden" name="licence1" class="inp" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="validate" style="display: none;"></span>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-sm-2"><em class="red">*</em>餐饮服务许可证</label>
                    <div class="col-sm-9">
                        <div validate="notEmpty" class="img-panel shop_front_url_panel">
                            <div class="row">
                                <div class="col-sm-5">
                                    <ul>
                                        <li>确保您的许可证的时间在有效期内</li>
                                    </ul>
                                </div>
                                <div class="col-sm-7">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="" refname="shop_front_url">
                                                <img name="" class="pic" style="max-width:150px;">
                                                <input type="file" class="file_upload" value="">
                                                <input type="hidden" name="licence2" class="inp" value="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <span class="validate" style="display: none;"></span>
                    </div>
                </div>

                <div class="btns">
                <!-- <button id="sub" type="submit" class="btn btn-primary">提交并进入下一步</button> -->
                 <button id="sub" class="btn btn-primary">提交</button>
                <!---->
                <!---->
            </div>
            
             
            
            </form>
           
            <!---->
            <div id="submit-modal" tabindex="-1" role="dialog" aria-labelledby="kui-docs-example-modal-11label" class="modal fade">
                <div role="document" class="modal-dialog modal-sm">
                    <div class="modal-content">
                        <div class="modal-body">
                            请确认所有驳回项全部修改完毕后在进行提交
                        </div>
                        <div class="modal-footer">
                            <button type="button" data-dismiss="modal" class="btn btn-primary btn-stable">确定</button>
                            <button type="button" data-dismiss="modal" class="btn btn-default btn-stable">取消</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>


    </div>
      <div class="footer">
        <div class="footer__line"></div>
        <div class="footer__main">
          <ul class="more-lists clearfix">
            <li class="item-list">
              <span class="item-list__list-name">用户帮助</span>
              <ul class="item-list__list-details">
                <li>
                  <em class="i-point"></em><a href="javascript:;">常见问题</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="javascript:;">用户反馈</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="javascript:;">诚信举报</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="javascript:;">线上体验店</a>
                </li>
              </ul>
            </li>
            <li class="item-list">
              <span class="item-list__list-name">获取更新</span>
              <ul class="item-list__list-details">
                <li>
                  <em class="i-point"></em><a href="javascript:;">iPhone/Android</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="javascript:;">美团外卖新浪微博</a>
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
                  <em class="i-point"></em><a href="javascript:;">我要开店</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="javascript:;">配送合作申请入口</a>
                </li>
              </ul>
            </li>
            <li class="item-list">
              <span class="item-list__list-name">公司信息</span>
              <ul class="item-list__list-details">
                <li>
                  <em class="i-point"></em><a href="javascript:;">关于美团</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="javascript:;">媒体报道</a>
                </li>
                <li>
                  <em class="i-point"></em><a href="javascript:;">加入我们</a>
                </li>
              </ul>
            </li>
            <li class="item-list">
              <div class="item-list__hot-link">
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
    <script type="text/javascript" src="{{asset('home/js/jquery.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/kangarooui.js')}}"></script>
    <script type="text/javascript" src="{{asset('home/js/vue2.js')}}"></script>
    <script type="text/javascript"  src="{{asset('home/js/r.js')}}"></script>

 <!-- 城市联动 js代码 start  -->
<script class="resources library" src="{{asset('home/js/area.js')}}" type="text/javascript"></script>
<script type="text/javascript">_init_area();</script>
<script type="text/javascript">
    var Gid  = document.getElementById ;
    var showArea = function(){
        Gid('show').innerHTML = "<h3>省" + Gid('s_province').value + " - 市" +
            Gid('s_city').value + " - 县/区" +
            Gid('s_county').value + "</h3>"
    }
    Gid('s_county').setAttribute('onchange','showArea()');
</script>
 <!-- 城市联动 js代码 end -->

<!-- 获取坐标 js代码 start -->
<script type="text/javascript">
    var map = new AMap.Map("container", {
        resizeEnable: true
    });
    //输入提示
    var autoOptions = {
        input: "autocomplate-input"
    };
    var auto = new AMap.Autocomplete(autoOptions);
    var placeSearch = new AMap.PlaceSearch({
        map: map,
        pageSize: 1,
    });  //构造地点查询类
    AMap.event.addListener(auto, "select", select);//注册监听，当选中某条记录时会触发
    function select(e) {
//        alert(e.poi.name);
//        alert(e.poi.adcode);
        placeSearch.setCity(e.poi.adcode);
        placeSearch.search(e.poi.name);  //关键字查询查询
        var geocoder = new AMap.Geocoder({
            city: "010", //城市，默认：“全国”
            radius:1000 //范围，默认：500
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
        document.getElementById("autocomplate-input").value = exaddr;
    }
</script>
<!-- 获取坐标 js代码 end -->

    <script type="text/javascript" src="{{asset('home/js/common.js')}}"></script>
    <!-- <script>
      MT.FORMRENDER = {"settings":{"x-powered-by":true,"etag":"weak","env":"production","query parser":"extended","subdomain offset":2,"trust proxy":false,"views":"/opt/meituan/apps/waimai_e_kaidian_web/views","jsonp callback name":"callback","view cache":true,"view engine":"ejs","port":8222},"enrouten":{"routes":{}},"REFERRER":"","userid":-27310083,"username":"Hauser","title":"店铺信息","pagename":"base","navbar":{"icoClassArr":["","current","","",""]},"step":{"base":{"step":"base","stepText":"店铺信息","stepStatus":"needImprove_nowWrite","stepStatusText":"立即录入","data":{"address":"","contractName":"","contractTel":"","firstTag":0,"shopName":"","status":1,"tagId":0},"ico":"","color":"color-primary","disabled":false,"taskStatus":"needImprove","taskStatusText":"待完善","reject":null},"qualification":{"step":"qualification","stepText":"资质信息","stepStatus":"needImprove_noRecord","stepStatusText":"","ico":"","color":"","disabled":true,"taskStatus":"needImprove","taskStatusText":"待完善","reject":null},"account":{"step":"account","stepText":"收款信息","stepStatus":"needImprove_noRecord","stepStatusText":"","ico":"","color":"","disabled":true,"taskStatus":"needImprove","taskStatusText":"待完善","reject":null},"certification":{"step":"certification","stepText":"认证签约人","stepStatus":"needImprove_noRecord","stepStatusText":"","ico":"","color":"","disabled":true,"taskStatus":"needImprove","taskStatusText":"待完善","reject":null}},"pageData":{"address":"","contractName":"","contractTel":"","firstTag":0,"shopName":"","status":1,"tagId":0},"ticketId":"","userinfo":{"userid":-27310083,"username":"Hauser","usermobile":""},"taskId":"2350205","source":"1","query":{"taskId":"2350205","source":"1","status":"needImprove"},"_locals":{"userid":-27310083,"username":"Hauser"},"cache":true};//若ejs页面使用formRender模块渲染的则会有此字段数据
      delete MT.FORMRENDER._locals;
      delete MT.FORMRENDER.enrouten;
      delete MT.FORMRENDER.settings;
      delete MT.FORMRENDER.cache;
    </script> -->
<script>
// 上传图片

    var a = [];
    $('.file_upload').click(function(){
        var l = $('.file_upload').index(this);

            $(".file_upload").eq(l).change(function () {
                uploadImage();
                a.push(l+1);
            });
     
        function uploadImage() {
    //                            判断是否有选择上传文件
            var imgPath = $(".file_upload").eq(l).val();
            if (imgPath == "") {
                alert("请选择上传图片！");
                return;
            }
            //判断上传文件的后缀名
            var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
            if (strExtension != 'jpg' && strExtension != 'gif'
                && strExtension != 'png' && strExtension != 'bmp') {
                alert("请选择图片文件");
                return;
            }
            // formData = new FormData($('#art_form')[0]);
            // 创建一个空的formData
            formData = new FormData();
            var files = $(".file_upload").eq(l)[0].files[0];
            //往formData 中追加 files  否则就全部上传了
            formData.append('file_upload',files);
            formData.append('_token','{{csrf_token()}}');
            $.ajax({
                type: "POST",
                url: "/seller/upload",
                data: formData,
                async: true,
                cache: false,
                contentType: false,
                processData: false,
                success: function(data) {
    //                                    console.log(data);
                    // alert("上传成功");
                    $('.pic').eq(l).attr('src','/uploads/'+data);
                    $('.inp').eq(l).val(data);
                },
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert("上传失败，请检查网络后重试");
                }
            });
        }
    });
//结束上传图片
//验证表单
   
$('#sub').click(function(){
   
        var exname = $('#exname').val();
        if(exname==''){
            // layer.msg('店铺名必填',{icon:2});
            alert('店铺名必填');
            return false;
        }else{
            $.get('/seller/exnameajax',{exname:exname},function(data){
                if(data.status==0){
                    // layer.msg(data.msg,{icon:2});
                    alert('该店铺已存在,请换一个');
                    return false;
                }
                
            })
        };
    //验证联系人
        var contact = $('#contacts').val();
        if(contact==''){
            // layer.msg('联系人必填',{icon:2});
            alert('联系人必填');
            return false; 
        }
   
    //验证联系电话

       var res = /^1(3|4|5|7|8)\d{9}$/;
       var phone = $('#extel').val();
       if(phone==''){
           // layer.msg('手机号必填',{icon:2});
           alert('手机号必填');
           return phones = false;
       }else if(!res.test(phone)){
           // layer.msg('请输入正确的手机号码',{icon:2});
           alert('请输入正确的手机号码');
           return phones=false;
       }
     // 验证商家类别  
    if($('select[name="csid"]').val() == 'sel')
    {
        // layer.msg('商家类别必填',{icon:2});
        alert('商家类别必填');
        return false;
    }
    //验证省份
    if($('select[name="s_province"]').val() == '省份') 
    {
        // layer.msg('省名必选',{icon:2});
        alert('省名必选');
        return false;
    }
     if($('select[name="s_city"]').val() == '地级市') 
    {
        // layer.msg('地市必选',{icon:2});
        alert('地市必选');
        return false;
    }
     if($('select[name="s_county"]').val() == '市、县级市') 
    {
        // layer.msg('县市必选',{icon:2});
        alert('县市必选');
        return false;
    }
    //验证门店地址
        var exaddr = $('#exaddr').val();
        if(exaddr==''){
            // layer.msg('门店地址必填',{icon:2});
            alert('门店地址必填');
            return  false;
        }
    //验证门店坐标
        var excoor = $('#excoorx').val();
        var aut = $('#autocomplate-input').val();
        if(excoor=='' || aut==''){
            // layer.msg('门店地址必填',{icon:2});
            alert('门店坐标处必填');
            return  false;
        }
    //验证上传文件图片
    //对数组去重 
        var m = $.unique(a);
        console.log(m);
        if(m.length!=4){
            // layer.msg('您有未上传的图片',{icon:5});
            alert('您有未上传的图片');
            return false;
        }
    });

// 结束表单验证

 
</script>
<div class="amap-sug-result" style="visibility: hidden; left: 444px; top: -121px; min-width: 402px;"></div>
</body>
</html>