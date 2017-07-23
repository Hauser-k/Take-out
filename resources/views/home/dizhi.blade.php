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



<div class="clearfix order-confirm" id="j-order-confirm">


  <div class="order-info-wrapper j-order-info-wrapper clearfix">
    <div class="fl address">

      <table class="standard-table dishes-table">
        <thead>

          <tr class="bot-border">
            <th class="left" width="240"><div class="th-inner align-left">菜品</div></th>
            <th class="right" colspan="2"><div class="th-inner align-right">价格/份数</div></th>
          </tr>
        </thead>
        <tbody>
@foreach($n as $a=>$b)
              <tr class="">
                <td class="left">
                  <div class="td-inner align-left" title="{{$b['gname']}}">
                    <div>   {{$b['gname']}}
    
</div>
                    <div class="dish-sku">
    {{$b['gstandard']}}
    
                    </div>
                  </div>
                </td>
                <td class="right" colspan="2">
                    <div class="td-inner align-right">
                      ¥{{$b['gprice']}}x{{$b['onum']}}
                    </div>
                </td>
                @endforeach
            <tr class="delivery-cost bot-border">
              <td class="left"><div class="td-inner align-left">配送费</div></td>
              <td class="right" colspan="2"><div class="td-inner align-right">¥{{$ofee}}</div></td>
            </tr>
            <tr class="total" data-total="{{$cou}}">
              <td colspan="3" class="clearfix middle">
                <div class="td-inner clearfix">
                  <span class="t-total fl">合计</span>
                
                  <span class="t-number fr">¥{{$cou}}</span>
                </div>
              </td>
            </tr>

        </tbody>
      </table>

        <div class="privilege">
          <div class="operation clearfix">
            <div class="fr si-input">
             
          
              <div class="select" style="display: none;">
                <ul>
                </ul>
              </div>
            </div>

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
                       @foreach($addr as $k => $v)
                    <div class="j-address-box address-box " data-aid="{{$v->did}}" data-flag="1">
                      
                      <p class="address-line blo">
                        <span class="span">
                           {{$v->dname}}:{{$v->dtel}}
                        </span>

                      </p>
          
                      <p class="address-line blo" ><span class="span">{{$v->daddr}}</span></p>
                    
                      </div>
                      
                    
                      @endforeach
                            <div>
                         <p class="address-line dis" style="display:none;"><input type="text" name="phone" value="" placeholder="请输入姓名：手机号" style="border:0px;"/></p> 
                         <p class="address-line dis" style="display:none;"><input type="text" name="addr" value="" placeholder="请输入地址" style="border:0px;"/></p>                 

                      
                    </div>




                   

                     

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
                    <a href="javascript:;" data-method="2" class="fl sprite option option-margin selected ">余额支付</a>
              </div>
            </div>
        </form>

       
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
 
          <a class="s-btn yellow-btn fr" id="confirmOrder" href="{{url('/home/fukuan')}}"><span class="s-btn">去付款</span></a>
        <div class="tips ct-black">
            您需支付&nbsp;<span class="price cc-lightred-new">¥<span id="totalPrice">{{$cou}}</span>


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
          $('.address-box').css('display','none');
          $('.blo').css('border','');
       })
       $('.address-box').click(function(){
          $('.address-box').css('border','');
          
          $(this).css('border','1px solid yellow');
          l =  $('.address-box').index(this);
          // alert(l);
       })
       $('.yellow-btn').click(function(){
         var mes = $('.show-tags').val();

         var addr = $('.address-box').eq(l).text();
        $.get('/home/suan',{'mes':mes,'addr':addr},function(data){

        })
       })
     })
    </script>
@endsection