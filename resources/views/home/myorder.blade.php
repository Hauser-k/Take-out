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

      <div class="order-header"><span class="oh-content">订单内容</span>
        <span class="oh-phone">商家电话</span><span class="oh-money">支付金额</span><span class="oh-operate">操作</span></div>






  @foreach($data as $v)
<div data-sid="0" class="order-v" data-orderphone="13752095573" data-viewid="1497680712954283" data-status="9" data-shipping="" data-qid="">
  <div class="brief-intro j-toggle-content ">

    <div class="brief-intro-topconsole fr">
        <div class="clearfix">
          <a href="javascript:;" class="fr order-another j-order-another" data-viewid="1497680712954283">再来一单</a>
        </div>
    </div>

    <a href="{{url('home/myorder'.'/'.+$v['oid'])}}" target="_blank" class="avatar fl">
      <img class="scroll-loading" src="{{url('/uploads/')}}/{{ $v['slogo']}}" data-src="{{url('/uploads/')}}/{{ $v['slogo']}}" data-max-height="70" />
    </a>
    <div class="content">
      <div class="rest-name clearfix">
        <a target="_blank" href="{{url('home/myorder'.'/'.+$v['oid'])}}" class="ca-deepgrey j-poi-name">
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

</div>
    @endforeach



  </div>
</div>
<div id="anti_token" data-token="NjVwLbnCWUTqVPcjluiLHaz/qJjMfDOADifO7uV6CfNHjjgG52lbm5qi5DwP5iiX"></div>


      </div>
    </div>
@endsection