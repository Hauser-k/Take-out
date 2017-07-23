@extends('layout.home.home')

@section('css')
<link rel="stylesheet" href="{{url('/home/css/body.css')}}">
@endsection


@section('content')
    <div class="body">
      <div class="page-wrap body">
        <div class="inner-wrap" style="width:980px;background-color:#F5F5F5;;">

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
                  <strong>30</strong>分钟
          </div>
      </div>

        <div class="fl ack-ti">
            <div class="desc">起送</div>
            <div class="nu">
                  <strong>{{$re['odelfee']}}</strong>元
            </div>
        </div>


      <div class="fl in-ti">
          <div class="desc">配送费</div>
          <div class="nu">
              <strong>{{$re['ofee']}}</strong>元
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

    <div class="ori-foodtype-nav clearfix">
      <ul class="clearfix" id="">
          @foreach($data as $a=>$b)
        <li class="active">
          <a href="javascript:;" class="type" data-anchor="0" title="{{$b->cname}}">
            <span class="name">
                {{$b->cname}}

            </span>
          </a>
        </li>
          @endforeach
      </ul>
    </div>
  </div>


<div class="food-nav">
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
      <img src="{{ url('uploads') }}/{{ $s->gpic }}" data-src="" class="food-shape scroll-loading">
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

    {{--购物车--}}
    <div class="shopping-cart clearfix" data-status="1" data-poiname="{{ $re['exname'] }}" data-poiid="144807817220792597">
        <form method="post" action="/order/shoppingcart" id="shoppingCartForm">
            {{ csrf_field() }}
            <div id="cart_top1" class="first-to-app clearfix j-first-to-app" style="top: -{{ $other['top1'] }}px;">
                <span class="fl">电脑下单不享优惠了哦，优惠活动手机专享~</span>
            </div>
            @if(!empty($cart))
            <div id="cart_top" class="order-list" style="top: -{{ $other['top'] }}px;">
            @elseif (empty($cart))
            <div id="cart_top" class="order-list" style="display:none">
            @endif
                <div class="title">
                    <span class="fl buy-title">购物车</span>
                    <span class="fr dishes">
                        <a href="javascript:;" class="clear-cart" id="clear-cart" data-sid="{{ $re['sid'] }}"><i></i>清空菜品</a>
                    </span>
                </div>
                <ul id="cart_shop" style="height: auto; overflow: visible;">
                    @if(!empty($cart))
                    @foreach($cart as $k=>$v)
                    <li class="clearfix  food-273225321_297952697" data-fid="273225321" data-fkey="273225321_297952697">
                        <div class="fl na clearfix" title="{{ $v['gname'] }}">
                            <div class="">{{ $v['gname'] }}</div>
                            <div class="na-attr">{{ $v['gstandard'] }}</div>
                        </div>
                        <div class="fl modify clearfix">
                            <a href="javascript:;" gid_minus="{{ $v['gid'] }}" class="fl minus">-</a>
                            <input type="text" disabled  gid_onum="{{ $v['gid'] }}" class="fl txt-count" value="{{ $v['onum'] }} " maxlength="2">
                            <a href="javascript:;" gid_plus="{{ $v['gid'] }}" class="fl plus">+</a>
                        </div>  <div class="fr pri ">
                            <span>¥{{ $v['gprice'] }}</span>
                        </div>
                    </li>
                    @endforeach
                    @endif
                </ul>
                <div class="other-charge">
                    {{--<div class="clearfix packing-cost hidden">--}}
                        {{--<span class="fl">包装盒</span>--}}
                        {{--<span class="fr boxtotalprice">¥0</span>--}}
                    {{--</div>--}}
                    <div class="clearfix delivery-cost">
                        <span class="fl">配送费(不计入起送价)</span>
                        <span class="fr shippingfee">¥{{ $re['ofee'] }}</span>
                    </div>
                </div>
                <div class="privilege hidden"></div>


                <div class="total">共<span class="totalnumber" id="totalnumber">{{ count($cart) }}</span>份，总计<span class="bill" id="bill">¥{{ $other['sum'] }}</span></div>
                {{--<div class="total">共<span class="totalnumber" id="totalnumber">{{ count($cart) }}</span>份，总计<span class="bill" id="bill">¥{{ $other['sum']+$re['ofee'] }}</span></div>--}}
            </div>


            <div class="footer clearfix">
                <div class="logo icon fl"></div>
                <div class="brief-order fl" style="display: none;">
                    <span class="count">1</span>
                    <span class="price"><i>¥</i>56</span>
                </div>
                <div class="fr">
                    <a class="ready-pay borderradius-2" href="javascript:;" @if($other['sum']<$re['odelfee'])style="display: inline-block;"@elseif($other['sum']>=$re['odelfee'])style="display: none;"@endif>差<span data-left="20" class="margintominprice">@if(empty($other['pay'])){{ $re['odelfee'] }}@elseif(!empty($other['pay'])){{ $other['pay'] }}@endif</span>元起送</a>
                    <input class="go-pay borderradius-2" type="submit" value="立即下单" @if($other['sum']>=$re['odelfee'])style="display: inline-block;"@elseif($other['sum']<$re['odelfee'])style="display: none;"@endif >
                    <input type="hidden" value="{{ $re['sid'] }}" class="order-data" name="shop_cart">
                </div>
            </div>
        </form>
    </div>
    {{--<div id="carts"></div>--}}
    {{--<script type="text/javascript">--}}
        {{--$.ajaxSetup({--}}
            {{--headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }--}}
        {{--});--}}
    {{--</script>--}}
<script type="text/javascript">
$(function(){
//    增加商品
  $('.i-addcart').click(function(){
      var a = $('.i-addcart').index(this);
      var b = $('.inp').eq(a).val();
      $.get('/home/shangjia/addcart',{gid:b},function(data){
          var dataObj=eval(data);
          if(dataObj.code == 1){
            var carts = '';
            $.each(dataObj.cart , function(i, item){
                  carts += '<li class="clearfix  food-273225321_297952697" data-fid="273225321" data-fkey="273225321_297952697"><div class="fl na clearfix" title="'+item["gname"]+'"><div class="">'+item["gname"]+'</div><div class="na-attr">'+item["gstandard"]+'</div></div><div class="fl modify clearfix"><a href="javascript:;" gid_minus="'+item["gid"]+'" class="fl minus">-</a><input type="text" disabled gid_onum="'+item['gid']+'" class="fl txt-count" value="'+item["onum"]+'" maxlength="2"><a href="javascript:;" gid_plus="'+item["gid"]+'" class="fl plus">+</a></div><div class="fr pri "><span>¥'+item["gprice"]+'</span></div></li>';
            });
            console.log(dataObj.cart);
              $('#cart_top').attr('style','display:block;top: -'+dataObj.other.top+'px;');
              $('#cart_top1').attr('style','top: -'+dataObj.other.top1+'px;');
              $('#cart_shop').html(carts);
              $('#totalnumber').text(dataObj.other.num);
              $('#bill').text(dataObj.other.sum);
              if(dataObj.other.pay == 'yes'){
                  $('.ready-pay').attr('style','display: none;');
                  $('.go-pay').attr('style','display: inline-block;');
              }else{
                  $('.margintominprice').text(dataObj.other.pay);
              }
          }else if(dataObj.code == 3){
//              console.log(dataObj);
              $("input[gid_onum='"+dataObj.gid+"']").val(dataObj.onum);
              $('#bill').text(dataObj.other.sum);
              if(dataObj.other.pay == 'yes'){
                  $('.ready-pay').attr('style','display: none;');
                  $('.go-pay').attr('style','display: inline-block;');
              }else{
                  $('.margintominprice').text(dataObj.other.pay);
              }
          }else{
              alert('添加失败');
          }
      },'json');
  })
//增加数量
  $(".plus").click(function (){
      var gid_plus = $(this).attr('gid_plus');
      $.get('/home/shangjia/addcart',{gid:gid_plus},function(dataObj){
          if(dataObj.code == 1){
             alert('不明操作');
          }else if(dataObj.code == 3){
              console.log(dataObj);
              $("input[gid_onum='"+dataObj.gid+"']").val(dataObj.onum);
              $('#bill').text(dataObj.other.sum);
              if(dataObj.other.pay == 'yes'){
                  $('.ready-pay').attr('style','display: none;');
                  $('.go-pay').attr('style','display: inline-block;');
              }else{
                  $('.margintominprice').text(dataObj.other.pay);
              }
          }else{
              alert('增加失败');
          }
      },'json');
  });
  function goods_plus(i){
      console.log(i);
  }
//减少数量
    $(".minus").click(function (){
        var gid_minus = $(this).attr('gid_minus');
        $.get('/home/shangjia/reducegoods',{gid:gid_minus},function(dataObj){
            if(dataObj.code == 1){
                var carts = '';
                $.each(dataObj.cart , function(i, item){
                    carts += '<li class="clearfix  food-273225321_297952697" data-fid="273225321" data-fkey="273225321_297952697"><div class="fl na clearfix" title="'+item["gname"]+'"><div class="">'+item["gname"]+'</div><div class="na-attr">'+item["gstandard"]+'</div></div><div class="fl modify clearfix"><a href="javascript:;" id="minus" gid_minus="'+item["gid"]+'" class="fl minus">-</a><input type="text" disabled gid_onum="'+item['gid']+'" class="fl txt-count" value="'+item["onum"]+'" maxlength="2"><a href="javascript:;" id="plus" gid_plus="'+item["gid"]+'" class="fl plus">+</a></div><div class="fr pri "><span>¥'+item["gprice"]+'</span></div></li>';
                });
                $('#cart_top').attr('style','display:block;top: -'+dataObj.other.top+'px;');
                $('#cart_top1').attr('style','top: -'+dataObj.other.top1+'px;');
                $('#cart_shop').html(carts);
                $('#totalnumber').text(dataObj.other.num);
                $('#bill').text(dataObj.other.sum);
                if(dataObj.other.pay == 'yes'){
                    $('.ready-pay').attr('style','display: none;');
                    $('.go-pay').attr('style','display: inline-block;');
                }else{
                    $('.margintominprice').text(dataObj.other.pay);
                }
            }else if(dataObj.code == 3){
                console.log(dataObj);
                $("input[gid_onum='"+dataObj.gid+"']").val(dataObj.onum);
                $('#bill').text(dataObj.other.sum);
                if(dataObj.other.pay == 'yes'){
                    $('.ready-pay').attr('style','display: none;');
                    $('.go-pay').attr('style','display: inline-block;');
                }else{
                    $('.margintominprice').text(dataObj.other.pay);
                }
            }else{
                alert('减少失败');
            }
        },'json');
    });
//清空购物车
  $('#clear-cart').click(function(){
        var a = $(this).attr('data-sid');
        $.get('/home/shangjia/rmgoods',{sid:a},function(data){
            console.log(data);
            if(data.code == 1){
                $('#cart_shop').html('');
                $('#cart_top').attr('style','top:0');
                $('#cart_top1').attr('style','top:-45');
                confirm('清除购物车成功');
            }else{
                alert('清除失败');
            }
        })
    })

})
</script>
    {{--<li class="clearfix  food-273225321_297952697" data-fid="273225321" data-fkey="273225321_297952697"><div class="fl na clearfix" title="'+item['gname']+'"><div class="">'+item['gname']+'</div><div class="na-attr">'+item['gstandard']+'</div></div><div class="fl modify clearfix"><a href="javascript:;" id="minus" class="fl minus">-</a><input type="text" class="fl txt-count" value="'+item['onum']+'" maxlength="2"><a href="javascript:;" id="plus" onclick="" class="fl plus">+</a></div><div class="fr pri "><span>¥'+item['gprice']+'</span></div></li>--}}

@endsection

