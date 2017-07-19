@extends('layout.home.home')
@section('content')
    <div class="page-wrap">
        <div class="inner-wrap" style="width:980px;">

            <div class="orders-cont clearfix">

                <div class="orders-tab fl">
  <span href="javascript:;" class="tab">
    <ul>
      <li><a href="{{url('home/myorder')}}" class="borderradius-1 order-today active"><i></i>我的订单</a></li>
    </ul>
  </span>
                    <span href="javascript:;" class="tab">
    <ul>
      <li><a href="{{url('home/mynumber')}}" class="borderradius-1 my-account "><i></i>我的账号</a></li>
      <li><a href="#" class="borderradius-1 my-favorite "><i></i>我的收藏</a></li>
    </ul>
  </span>
                </div>
                <div class="setting-box" id="setting-box">
                    <div class="user-info clearfix ct-commonblack">
                        <div class="user-info-item"><span class="ui-title">我的头像：</span><i class="icon i-user-circle"></i></div>
                        <div class="user-info-item"><span class="ui-title">用户&nbsp;&nbsp;I&nbsp;D：</span><span class="source-label">DTQ488649750</span></div>
                        <div class="user-info-item"><span class="ui-title">手机号码：</span><span class="source-label"></span></div>
                        <a href="http://www.meituan.com/account/settings" target="_blank" class="s-btn j-modify-info">修改</a>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <div class="page-footer">
        <div class="footer-wrap">
            <div class="column fl corp">
                <ul>
                    <li><a href="http://kd.waimaie.meituan.com/open_store/welcome" class="kaidian_address" target="_blank">我要开店</a></li>
                    <li><a href="http://page.peisong.meituan.com/apply/join" target="_blank">配送加盟</a></li>
                    <li><a href="/help/agent" target="_blank">城市代理</a></li>
                    <li><a href="http://kaidian.waimai.meituan.com/zhaoshang/pages/WMInvest.html" target="_blank">零售加盟</a></li>
                </ul>
            </div>
            <div class="column fl info">
                <ul>
                    <li><a href="http://developer.meituan.com?applyFrom=waimai_c_pc_contact" target="_blank">开放平台</a></li>
                    <li><a href="http://www.meituan.com/about/" target="_blank" rel="nofollow">关于美团</a></li>
                    <li><a href="http://www.meituan.com/about/press" target="_blank" rel="nofollow">媒体报道</a></li>
                    <li><a href="/help/rule" target="_blank" rel="nofollow">平台制度</a></li>
                </ul>
            </div>
            <div class="column fl ques">
                <ul>
                    <li><a href="/help/faq" target="_blank" rel="nofollow">常见问题</a></li>
                    <li><a href="/help/feedback" target="_blank" rel="nofollow">用户反馈</a></li>
                    <li><a href="/help/inform" target="_blank" rel="nofollow">诚信举报</a></li>
                    <li><a href="/help/job" target="_blank" rel="nofollow">加入我们</a></li>
                </ul>
            </div>
            <div class="column fl service">
                <div class="details">
                    <p class="w2">1010-9777</p>
                    <!-- <p class="w2">4008508888</p> -->
                    <!-- <p class="w2">010-56652722</p> -->

                    <p class="w3">周一至周日 9:00-23:00</p>

                    <p class="w3">客服不受理商务合作</p>
                </div>
            </div>
            <div class="QRcode fl">
                <div class="footer-qrcode fl"></div>
                <div class="fl">
                    <p class="qr-text1">小程序下单</p>
                    <p class="qr-text2">更多商家，更多优惠</p>
                </div>
            </div>
            <div class="clear"></div>
        </div>
    </div>
    <div class="copyright-wrap">
        <span class="sp-ft">
          <a target="_blank" title="备案信息" href="http://www.hd315.gov.cn/beian/view.asp?bianhao=010202011122700003" class="record"></a>
        </span>
        <span class="copyright">&copy;2015 meituan.com <a target="_blank" href="http://www.miibeian.gov.cn/">京ICP证070791号</a> 京公网安备11010502025545号</span>
    </div>
    </div>

    <script type="text/javascript">
        //全局违禁词规定
        var forbiddenWords = ['习大大', '习达达', '习哒哒', '习近平', '彭麻麻','彭妈妈', '彭丽媛'];
    </script>

    <script type="text/javascript" data-main="http://xs01.meituan.net/waimai_web/js/page/account/setting_a57a33c2" src="http://xs01.meituan.net/waimai_web/js/lib/r.js"></script>

    </body>
    </html>
@endsection