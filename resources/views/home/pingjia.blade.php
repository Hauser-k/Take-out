@extends('layout.home.home')

@section('css')
<link rel="stylesheet" href="{{url('/home/css/comment_17e6056f.css')}}">
<link rel="stylesheet" href="{{url('/home/css/body.css')}}">
@endsection


@section('content')


      </div>
      <div class="page-wrap">
        <div class="inner-wrap">


<div class="rest-info">

    <div class="right-bar fr clearfix ct-lightgrey">

      <div class="fl average-speed">
          <div class="desc">平均送餐时间</div>
          <div class="nu">
                  <strong>{{$ptime}}</strong>分钟
          </div>
      </div>

        <div class="fl ack-ti">
            <div class="desc">起送</div>
            <div class="nu">
                  <strong>20</strong>元
            </div>
        </div>


      <div class="fl in-ti">
          <div class="desc">配送费</div>
          <div class="nu">
              <strong>5</strong>元
          </div>

      </div>
    </div>
  <div class="details">
    <div class="up-wrap clearfix">
      <div class="avatar fl">
        <img class="scroll-loading" src="http://p0.meituan.net/120.0/xianfu/69edb5a80e5ba2cea4d0c3a8c093e4284266.jpeg" data-src="http://p0.meituan.net/120.0/xianfu/69edb5a80e5ba2cea4d0c3a8c093e4284266.jpeg" data-max-width="106" data-max-height="80" style="width: 106px; height: 79.5px;">
      </div>
      <div class="list">
        <div class="na">
          <a href="/restaurant/144924000377172669">
            <span>{{$re['exname']}}</span><i class="icon i-triangle-dn"></i>
          </a>
        </div>
        <div class="stars clearfix" style="margin-top:14px;">
            <span class="star-ranking fl">
                    <span class="star-score" style="width: 71px"></span>
              </span>
            <span class="fl mark ct-middlegrey">4.9</span> <br>
        </div>
      </div>
    </div>
    <div class="rest-info-down-wrap" style="">
      <svg style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><symbol id="icon-Shape-Copy" viewBox="0 0 32 32"><path d="M25.387 21.12l-8.32 10.453c-0.64 0.853-1.707 0.853-2.347 0l-8.32-10.453c-1.92-2.133-3.2-5.12-3.2-8.32 0-7.040 5.76-12.587 12.8-12.587s12.8 5.547 12.8 12.587c0 3.2-1.28 5.973-3.413 8.32v0zM16 6.187c-3.627 0-6.4 2.773-6.4 6.4 0 3.413 2.773 6.4 6.4 6.4s6.4-2.773 6.4-6.4c0-3.413-2.773-6.4-6.4-6.4v0z"></path></symbol><symbol id="icon-Fill-2" viewBox="0 0 32 32"><path d="M7.467 2.133c-1.493 0-5.333 2.773-5.333 5.547 0 7.68 13.867 22.187 22.4 22.187 2.347 0 5.333-2.56 5.333-5.547 0-1.067-6.187-5.547-7.467-5.547-1.493 0-2.56 1.28-3.84 1.28s-6.827-5.76-6.827-7.040c0-1.493 1.28-2.133 1.28-3.627-0.213-0.853-4.053-7.253-5.547-7.253z"></path></symbol><symbol id="icon-Combined-Shape" viewBox="0 0 32 32"><path d="M16 2.133c-7.68 0-13.867 6.187-13.867 13.867s6.187 13.867 13.867 13.867 13.867-6.187 13.867-13.867-6.187-13.867-13.867-13.867zM22.4 23.893l-7.467-6.827v-10.667h2.133v9.173l6.827 6.827-1.493 1.493z"></path></symbol></defs></svg>
      <div class="clearfix sale-time">
        <p class="poi-detail-left"><svg class="icon-Combined-Shape"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-Combined-Shape"></use></svg><span>营业时间</span></p>
        <p class="poi-detail-right"><span class="info-detail">{{$re['stime']}}-{{$re['stime']}}</span></p>
      </div>

        <div class="rest-info-thirdpart poi-address">
        <p class="poi-detail-left"><svg class="icon-Shape-Copy"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-Shape-Copy"></use></svg><span class="poi-address-title">商家地址</span></p>
        <p class="poi-detail-right">{{$re['exaddr']}}</p>
        </div>
        <div class="telephone">
            <p class="poi-detail-left"><svg class="icon-Fill-2"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-Fill-2"></use></svg>商家电话</p>
            <p class="poi-detail-right">{{$re['extel']}}</p>
        </div>

    </div>
  </div>
  <div class="save-up-wrapper">
    <a href="javascript:;" class="save-up j-save-up " data-poiid="144924000377172669">
      <p class="ct-black">收藏本店</p>
      <i class="icon i-heart-22"></i>
    </a>
    <p class="cc-lightred-new j-save-up-people"></p>
  </div>
</div>

<div class="comments fl" id="comments" data-pid="144924000377172669">
  <div class="tab-link">
    <div class="tab-link-inner clearfix">
      <a href="/restaurant/144924000377172669" class="tab-item ">菜单</a>
      <a href="#" class="tab-item  active">评价</a>
        <a href="/qualification/144924000377172669" class="tab-item ">食品安全档案</a>
    </div>
  </div>
  <div class="title clearfix">
    <label class="fr "><input type="checkbox" checked="checked" class="has-cont" id="has-cont"><span class="ct-lightgrey">有内容的评价</span></label>
    <div class="clearfix filters ct-deepgrey j-filters">
        <label class="chose fl"><input type="radio" checked="checked" class="filter"><span>全部评价 <em>(1)</em></span></label>
    </div>
  </div>
  <div class="list">
    <div class="loading" style="display: none;"></div>
    <div class="comment-list-wrapper"><ul>  <li class="reply-field">    <div class="reply-user-avatar"><img class="user-avatar-img" src="https://img.meituan.net/avatar/8af1d5983c9b26d6f8a64bdcd170d40729472.jpg"> </div>    <div class="info clearfix">    <span class="fr time">2017-07-10</span>      <span class="name">H***3</span>             <span class="star-ranking">         <span class="star-score" style="width: 75px"></span>       </span>      <span class="feel">好评</span>    </div>    <div class="user-reply">#上品肥牛饭套餐#套餐里面的汤不怎么样，肥牛饭特好吃，可以单点！饼一般吧#香酥饼#</div>  </li>   
    </ul></div>
 
</div>

<div class="rank fr">
  <div class="title">总体评分</div>
  <div class="head clearfix">
    <strong class="fl">4.9</strong>
    <span class="star-ranking fl">
      <span class="star-score" style="width: 138px"></span>
    </span>
  </div>
  <div class="detail">
      <div class="field clearfix">
        <span class="fl score-num">
            5分
        </span>
        <span class="fl bar"><i style="width: 85%;"></i></span>
        <span class="fr percent">85%</span>
      </div>
      <div class="field clearfix">
        <span class="fl score-num">
            4分
        </span>
        <span class="fl bar"><i style="width: 10%;"></i></span>
        <span class="fr percent">10%</span>
      </div>
      <div class="field clearfix">
        <span class="fl score-num">
            3分
        </span>
        <span class="fl bar"><i style="width: 3%;"></i></span>
        <span class="fr percent">3%</span>
      </div>
      <div class="field clearfix">
        <span class="fl score-num">
            2分
        </span>
        <span class="fl bar"><i style="width: 1%;"></i></span>
        <span class="fr percent">1%</span>
      </div>
      <div class="field clearfix">
        <span class="fl score-num">
            1分
        </span>
        <span class="fl bar"><i style="width: 1%;"></i></span>
        <span class="fr percent">1%</span>
      </div>
  </div>
</div>

<div class="clear"></div>

      </div>
    </div>
@endsection