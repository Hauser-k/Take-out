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

                <div class="orders-list">

                    <div class="order-header"><span class="oh-content">订单内容</span><span class="oh-phone">商家电话</span><span class="oh-money">支付金额</span><span class="oh-operate">操作</span></div>






    @foreach($data as $k => $v)
    <div data-sid="3" class="order-v" data-orderphone="13711111111" data-viewid="5272911528310622" data-status="1" data-shipping="" data-qid="">
    <div class="brief-intro j-toggle-content ">

    <div class="brief-intro-topconsole fr">
    <div class="clearfix">
    <a href="javascript:;" class="fr order-another j-order-another" data-viewid="5272911528310622">再来一单</a>
    </div>
    </div>

    <a href="#" target="_blank" class="avatar fl">
    <img class="scroll-loading" src="{{url('/uploads/')}}/{{ $v['slogo']}}" data-src="" data-max-height="70" />
    </a>
    <div class="content">
    <div class="rest-name clearfix">
    <a target="_blank" href="#" class="ca-deepgrey j-poi-name">
    <span class="poi-name">{{$v['sname']}}</span>
    </a>
    <span class="order-total">{{$v['extel']}}</span>
    <span class="order-money-num">&yen; {{$v['endprice']}}</span>
    </div>
    <div class="rest-detail">
    <span class="order-total">{{date('Y-m-d H:i:s',($v['gtime']))}}</span>
    <span class="order-id">订单号：{{$v['order']}}</span>
    </div>
    </div>
    </div>

    <div class="detail-intro clearfix " id="j-shown-order">
    <div class="fl dishes dishes-higher" style="margin-left:0px;">
    <div class="dish-title">订单详情</div>
    <div class="list">
    <div class="dish-list">
    <!-- <script type="text/template" id="oflist-5272911528310622">
    {"216268358": {"name": "榴莲披萨92寸", "score": 0},"185626854": {"name": "超级至尊9寸", "score": 0},"185626547": {"name": "香薰培根9寸", "score": 0}}
    </script> -->

    @foreach($res as $vv)
    <div class="field clearfix">
    <div class="fl">
    <div class="food-na">    {{$vv['gname']}}

    </div>
    </div>
    <span class="food-count">{{$vv['onum']}}</span>
    <span class="fr food-pri"><i>&yen;</i>{{$vv['gprice']}}</span>
    </div>
      @endforeach
    <div class="field clearfix">
    <span class="fl classify">配送费：</span>
    <span class="fr delivery-cost">&yen; {{$v['ofee']}}</span>
    </div>







    </div>
    <div class="food-total-info">实际支付：<i>¥</i><span>{{$v['endprice']}}</span></div>

    </div>

    <div class="contact">
    <p>地址：{{$v['daddr']}}</p>
    <p>姓名：{{$v['uname']}}</p>
    <p>电话：{{$v['utel']}}</p>
    </div>


    </div>

    <div class="order-content">

    <div class="procedure">
    <div class="pro-order-status">订单状态</div>
    <div class="fl process-bar">


    <i class="icon i-orderok"></i>
    <i class="i-orderarrow higher"></i>
    <i class="icon i-orderetyok"></i>
    <i class="i-orderetyarrow"></i>
    <i class="icon i-orderetyok"></i>
    <i class="i-orderetyarrow"></i>
    <i class="icon i-orderetyok"></i>
    <i class="i-orderetyarrow"></i>
    <i class="icon i-orderetyok"></i>
    </div>


    <div class="fl tips" style="margin-left:0px;">
    <div class="step-1 larger">
    <span class="fr t-1">{{date('Y-m-d H:i:s',($v['gtime']))}}</span>
    <p class="bold">订单提交成功</p>

    <p class="btn-group">
    <a href="javascript:;" target="_blank" class="s-btn ord-pay" id="pay-5272911528310622" data-left="737" data-viewid="5272911528310622" data-phone="010-69797631" data-isapp="0"><span class="s-btn">继续付款</span></a>
    <a href="javascript:;" class="s-btn-white ord-cancel" data-oid="5272911528310622" data-phone="010-69797631"><span class="s-btn-white">取消订单</span></a>
    </p>
    </div>

    <div class="step-finish">
    <span class="fr t-finish"></span>
    <p class="bold">{{config('orederstatus')[$v['ostatus']]}}</p>
    </div>
    </div>

    </div>
    </div>
    </div>
    </div>
@endforeach

                </div>
            </div>
          <div id="anti_token" data-token="NjVwLbnCWUTqVPcjluiLHaz/qJjMfDOADifO7uV6CfNHjjgG52lbm5qi5DwP5iiX"></div>


        </div>
    </div>

@endsection
