@extends('layout.home.home')

@section('css')
<link rel="stylesheet" href="{{url('/home/css/comment_17e6056f.css')}}">
<link rel="stylesheet" href="{{url('/home/css/body.css')}}">
@endsection


@section('content')



      </div>
      <div class="page-wrap">
        <div class="inner-wrap">




<!--#---->



<div id="anti_token" data-token="+ZwGS3D+RLuA0T4Q5MV9HENDhRERzRFAbVVZ68xewGDCuZLMD70Nxr4kOYa4UYap"></div>

<div class="breadcrumb">
  <a class="ca-brown" href="/restaurant/144903354471052315">嘉和一品粥(昌平西关店)</a><i>&gt;</i><span>确认购买</span>
</div>

<div class="clearfix order-confirm" id="j-order-confirm">


  <div class="order-info-wrapper j-order-info-wrapper clearfix">
    <div class="fl address">

      <table class="standard-table dishes-table">
        <thead>
        @foreach($array as $k=>$v)
          <tr class="bot-border">
            <th class="left" width="240"><div class="th-inner align-left">菜品</div></th>
            <th class="right" colspan="2"><div class="th-inner align-right">价格/份数</div></th>
          </tr>
        </thead>
        <tbody>
              <tr class="">
                <td class="left">
                  <div class="td-inner align-left" title=" {{$v->gname}}">
                    <div>    {{$v->gname}}
    
</div>
                    <div class="dish-sku">
    常规
    
                    </div>
                  </div>
                </td>
                <td class="right" colspan="2">
                    <div class="td-inner align-right">
                      ¥{{$v->gprice}}*2
                    </div>
                </td>
            <tr class="delivery-cost bot-border">
              <td class="left"><div class="td-inner align-left">配送费</div></td>
              <td class="right" colspan="2"><div class="td-inner align-right">¥6</div></td>
            </tr>
            <tr class="total" data-total="28">
              <td colspan="3" class="clearfix middle">
                <div class="td-inner clearfix">
                  <span class="t-total fl">合计</span>
                
                  <span class="t-number fr">¥28</span>
                </div>
              </td>
            </tr>
            @endforeach
        </tbody>
      </table>

        <div class="privilege">
          <div class="operation clearfix">
            <div class="fr si-input">
              <input type="text" class="pri-input sprite" id="privilegeInput" value="选择优惠券" data-cid="0" readonly="">
              <a href="javascript:;" class="drop" id="dropTicket"><i class="icon i-triangle-dn"></i></a>
              <div class="select" style="display: none;">
                <ul>
                </ul>
              </div>
            </div>
            <span class="tip fr">优惠券：</span>
          </div>
        </div>
      <div class="ticket-age"></div>

    </div>
    <div class="dishes">
      <div class="dishes-rap">
        <div class="address-head">
            <a id="address-new" class="address-new"></a>
          <h3 class="address-title">
              送餐详情
          </h3>
        </div>
        <div style="float:right;margin-top:-20px;margin-right:30px;"
        class="address-title addr"<h3>添加地址</h3></div>
        <form id="orderForm" class="order-form">
          <div id="address-list" class="address-list">
              <div id="address-list-wrap" class="address-list-wrap high-height">
                <div id="address-list-inner" class="address-list-inner">

                    <div class="j-address-box address-box address-checked" data-aid="583084547" data-flag="1">
                      <p class="address-line blo">
                        <span class="span">
                            请问
                            先生
                            ：
                          18240697756
                        </span>

                      </p>
                      <p class="address-line blo" ><span class="span">昌平区农委&nbsp;&nbsp;</span></p>
                      <div>
                        
                      </div>
                         <p class="address-line dis" style="display:none;"><input type="text" name="phone" value="" placeholder="请输入姓名：手机号" style="border:0px;"/></p> 
                         <p class="address-line dis" style="display:none;"><input type="text" name="addr" value="" placeholder="请输入地址" style="border:0px;"/></p>                 

                      
                    </div>

                    




                    <div>

                    </div>

                      <input type="hidden" name="addressID" value="583084547">
                      <input type="hidden" name="customer" value="请问">
                      <input type="hidden" name="address" value="昌平区农委">
                      <input type="hidden" name="mobile" value="18240697756">
                      <input type="hidden" name="gender" value="先生">
                      <input type="hidden" name="house_number" value="">
                      <input type="hidden" name="latitude" value="40220804">
                      <input type="hidden" name="longitude" value="116231254">
                      <input type="hidden" name="gd_addr_type" value="政府机构及社会团体;政府机关;区县级政府及事业单位">

                </div>
              </div>

                <div class="address-bottom">
                  
                  <i class="order-icon i-fold-text address-bottom-btn"></i>
                </div>
          </div>

          <input type="hidden" name="poiid" value="144903354471052315">
          <input type="hidden" name="token" value="EAC450B01ED64B92A0D776BA7E6B6222">
          <input type="hidden" name="buildingid" value="">

          <div class="field clearfix leave-message-short">
            <label for="message">给商家留言：</label>
            <input class="show-tags sprite" type="text" name="message" placeholder="不要辣，多放盐等口味要求" maxlength="100" value="">
            <input type="text" style="display:none">
          </div>



            <div class="pay-field clearfix">
              <label class="fl" for="pay-method">付款方式：</label>
              <div class="fl pay-option clearfix">
                    <a href="javascript:;" data-method="1" class="fl sprite option  option-unavail j-show-tips" data-tips="该餐厅不支持餐到付款">餐到付款</a>
                    <a href="javascript:;" data-method="2" class="fl sprite option option-margin selected ">在线支付</a>
              </div>
            </div>
        </form>

       
      </div>
        <div class="pre-order field">
          <span>期望送达时间：</span>
          <a href="javascript:;" id="preorder-time" class="select-input"><span>立即送出</span><i class="icon"></i></a>
          <span class="pre-order-tip"><span class="error-tips"></span></span>
        </div>

      <div class="pay-area">
        <div id="order-address-warning" class="order-address-warning" style="display: none"></div>
          <div class="first-order-tip borderradius-5 fr j-first-order-tip">
            <a href="/mobile/download/preview_toast">
              <div class="left-tip-wrap fl">
                  <p>使用App下单<br>享更多优惠</p>
              </div>
              <div class="vertical-line fl"></div>
              <div class="right-tip-wrap fl">
                <i class="icon i-phone fl"></i>
                去下载
              </div>
              <div class="code-wrapper qrcode">
                <div class="qrcode"></div>
              </div>
            </a>
          </div>
 
          <a class="s-btn yellow-btn fr" id="confirmOrder" href="{{url('home/create')}}"><span class="s-btn">去付款</span></a>
        <div class="tips ct-black">
            您需支付&nbsp;<span class="price cc-lightred-new">¥<span id="totalPrice">28</span>
              <span class="nodiscount-tip borderradius-2">
                您今日优惠已用完，本单不再享受优惠
                <i class="icon i-discountip"></i>
              </span>
              <span class="nodiscount-tip borderradius-2">
                您今日优惠已用完，使用<a href="/mobile/download/bonus_limited" target="_blank">手机客户端</a>可享更多优惠
                <i class="icon i-discountip"></i>
              </span>
            </span>
          <span id="endfix" class="ct-black hidden">，饭到当面付款</span><br>

              <span class="ct-lightgrey">* 由&nbsp;<img class="pay-thirdpart-pic" src="">嘉和一品&nbsp;提供外卖服务</span>
        </div>
      </div>
    </div>
  </div>
</div>

      </div>
    </div>

    <script>
     $(function(){
       $('.addr').click(function(){
          $('.dis').css('display','block');
          $('.blo').css('display','none');
       })
     })
    </script>
@endsection