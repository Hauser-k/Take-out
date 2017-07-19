@extends('layout.home.home')

@section('css')
<link rel="stylesheet" href="{{url('/home/css/body.css')}}">
@endsection


@section('content')
    <div class="body">
      <div class="page-wrap body">
        <div class="inner-wrap">

<script type="text/template" id="foodtype-template">
<div class="foodtype-nav clearfix" style="display: none;">
  <i class="icon i-tagtop"></i>
  <ul>
    <li  class="active"  >
      <a href="javascript:;" class="type" data-anchor="0" title="小食">
        <span class="name">
    小食
    
        </span>
      </a>
    </li>
    
  </ul>
</div>
</script>
<script type="text/template" id="j-isBusy-flag">
{
  "busyFlag": 0
}
</script>
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
              <strong>6</strong>元
          </div>

      </div>
    </div>
  <div class="details">
    <div class="up-wrap clearfix">
      <div class="avatar fl">
        <img class="scroll-loading" src="http://p0.meituan.net/120.0/xianfu/c3f3937b2f104afcbfc7d3457d01779023959.jpg" data-src="http://p0.meituan.net/120.0/xianfu/c3f3937b2f104afcbfc7d3457d01779023959.jpg" data-max-width="106" data-max-height="80" style="width: 106px; height: 79.5px;">
      </div>

      <div class="list">
        <div class="na">
          <a href="/restaurant/144748254611096852">
            <span>{{$re['exname']}}</span><i class="icon i-triangle-dn"></i>
          </a>
        </div>
        <div class="stars clearfix" style="margin-top:14px;">
            <span class="star-ranking fl">
                    <span class="star-score" style="width: 70px"></span>
              </span>
            <span class="fl mark ct-middlegrey">4.8</span> <br>
        </div>
      </div>
    </div>
    <div class="rest-info-down-wrap" style="">
      <svg style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><symbol id="icon-Shape-Copy" viewBox="0 0 32 32"><path d="M25.387 21.12l-8.32 10.453c-0.64 0.853-1.707 0.853-2.347 0l-8.32-10.453c-1.92-2.133-3.2-5.12-3.2-8.32 0-7.040 5.76-12.587 12.8-12.587s12.8 5.547 12.8 12.587c0 3.2-1.28 5.973-3.413 8.32v0zM16 6.187c-3.627 0-6.4 2.773-6.4 6.4 0 3.413 2.773 6.4 6.4 6.4s6.4-2.773 6.4-6.4c0-3.413-2.773-6.4-6.4-6.4v0z"></path></symbol><symbol id="icon-Fill-2" viewBox="0 0 32 32"><path d="M7.467 2.133c-1.493 0-5.333 2.773-5.333 5.547 0 7.68 13.867 22.187 22.4 22.187 2.347 0 5.333-2.56 5.333-5.547 0-1.067-6.187-5.547-7.467-5.547-1.493 0-2.56 1.28-3.84 1.28s-6.827-5.76-6.827-7.040c0-1.493 1.28-2.133 1.28-3.627-0.213-0.853-4.053-7.253-5.547-7.253z"></path></symbol><symbol id="icon-Combined-Shape" viewBox="0 0 32 32"><path d="M16 2.133c-7.68 0-13.867 6.187-13.867 13.867s6.187 13.867 13.867 13.867 13.867-6.187 13.867-13.867-6.187-13.867-13.867-13.867zM22.4 23.893l-7.467-6.827v-10.667h2.133v9.173l6.827 6.827-1.493 1.493z"></path></symbol></defs></svg>
      <div class="clearfix sale-time">
        <p class="poi-detail-left"><span>营业时间</span></p>
        <p class="poi-detail-right"><span class="info-detail">$re['stime']-$re['etime']</span></p>
      </div>

        <div class="rest-info-thirdpart poi-address">
        <p class="poi-detail-left"><span class="poi-address-title">商家地址</span></p>
        <p class="poi-detail-right">$re['exaddr']</p>
        </div>
        <div class="telephone">
            <p class="poi-detail-left">商家电话</p>
            <p class="poi-detail-right">$re['extel']</p>
        </div>

    </div>
  </div>
  <div class="save-up-wrapper">
    <a href="javascript:;" class="save-up j-save-up " data-poiid="144748254611096852">
      <p class="ct-black">收藏本店</p>
      <i class="icon i-heart-22"></i>
    </a>
    <p class="cc-lightred-new j-save-up-people"></p>
  </div>
</div>


<div class="food-list fl">

  <div class="cate-tab-area">
  <div class="tab-link">
    <div class="tab-link-inner clearfix">
      <a href="{{url('home/shangjia')}}" class="tab-item  active">菜单</a>
      <a href="{{url('home/shangjia/1')}}" class="tab-item ">评价</a>
        <a href="{{url('home/shangjia/create/1')}}" class="tab-item ">食品安全档案</a>
    </div>
  </div>
@foreach($data as $a=>$b)
    <div class="ori-foodtype-nav clearfix">
      <ul class="clearfix">
        <li class="active">
          <a href="javascript:;" class="type" data-anchor="0" title="{{$b->cname}}">
            <span class="name">
   {{$b->cname}}
    
            </span>
          </a>
        </li>
        
      </ul>
    </div>
  </div>

  <div class="food-nav">

    <div class="title-blank hidden" style="display: none;">
      <span class="tag-na">    {{$b->cname}}
    
</span>
    </div>
@endforeach

@foreach($data as $m=>$n)
      <div class="category">
        <h3 class="title title-0" title="{{$n->cname}}">

          <span class="tag-na">    {{$n->cname}}
    
</span>
        </h3>

              <div class="pic-food-cont clearfix">

  @foreach($good as $a=>$s)
    @if($s->gcid == $n->gcid )
  <div class="j-pic-food pic-food" id="224598803">
   
    <div class="avatar">
      <img src="" data-src="" class="food-shape scroll-loading">
    </div>

    <div class="np clearfix">
      <span class="name fl" title="{{$s->gname}}">
       {{$s->gname}}
      </span>
    </div>

    <div class="sale-info clearfix">
      <div class="sold-count ct-lightgrey">
          <span>月售 {{$s->gcount}}份</span>
      </div>
      <div class="zan-count">
      </div>

    </div>

    <div class="labels clearfix">
        <input type="hidden" class="inp" value="{{$s->gid}}">
        <a href="javascript:;" class="add fr icon i-addcart j-addcart" ></a>
          
        <span id="food224598803-cart-num" class="pic-food-cart-num fr" style="">3</span>

      <div class="price fl">
          <div class="only">¥{{$s->gprice}}</div>
      </div>
    </div>
  </div>
  @endif
 @endforeach

  



  </div>
          </div>
@endforeach
      </div>
  </div>
</div>


<div class="widgets fr">
</div><div class="clear"></div>

      </div>
    </div>


<script type="text/javascript">
$(function(){
  $('.i-addcart').click(function(){
      var a = $('.i-addcart').index(this);
      var b = $('.inp').eq(a).val();
      $.get('/home/shop',{gid:b},function(data){
          if(data){
            alert('添加成功');
          }else{
            alert('添加失败');
          }
      })
      
  })
})
</script>

@endsection

