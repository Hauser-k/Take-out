<?php
require('header.php');
?>
      <div class="page-wrap">
        <div class="inner-wrap" style="width:980px;">

<!-- <script type="text/template" id="lngLat-info">
{
  "lng": 116.334411,
  "lat": 40.102434
}
</script>

<script type="text/template" id="store-info">
{
  "id": "895829",
  "hasFirst" : 1,
  "token" : "7F1878252A85409EA010D68CE923EA05",
  "cannotEditAddress" : false,
  "city" : "昌平区"
}
</script>

<script type="text/template" id="arrival-times">
    立即送出,
      16:20,
      16:40,
      17:00,
      17:20,
      17:40,
      18:00,
      18:20,
      18:40,
      19:00,
      19:20,
      19:40,
      20:00,
      20:20,
      20:40,
      21:00,
      21:20,
      21:40,
      22:00,
      22:20,
      22:40,
      23:00,
      23:20,
      23:59,
</script> -->
<div id="anti_token" data-token="eRqMfrl7+k7m7sl3EAz4PSkco2Fb2Im7DPzgOGgI7IxQkdWrUrDaSaF0dqBK9zGy"></div>

<div class="breadcrumb">
  <a class="ca-brown" href="#">三多烤肉拌饭</a><i>&gt;</i><span>确认购买</span>
</div>

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
              <tr class="" >
                <td class="left">
                  <div class="td-inner align-left" title="培根花甲粉+小豆包+果汁">
                    <div>    培根花甲粉+小豆包+果汁
    
</div>
                    <div class="dish-sku">
    龙口粉丝
    
                        原汤&nbsp;
                        不忌口&nbsp;
                    </div>
                  </div>
                </td>
                <td class="right" colspan="2">
                    <div class="td-inner align-right">
                      &yen;28.8
                    </div>
                </td>
              </tr>
            <tr class="packing-cost ">
              <td class="left"><div class="td-inner align-left">餐盒费</div></td>
              <td class="right" colspan="2"><div class="td-inner align-right">&yen;1</div></td>
            </tr>
            <tr class="delivery-cost bot-border">
              <td class="left"><div class="td-inner align-left">配送费</div></td>
              <td class="right" colspan="2"><div class="td-inner align-right">&yen;4</div></td>
            </tr>
            <tr class="total" data-total="33.8">
              <td colspan="3" class="clearfix middle">
                <div class="td-inner clearfix">
                  <span class="t-total fl">合计</span>
                  <span class="t-number fr">&yen;33.8</span>
                </div>
              </td>
            </tr>
        </tbody>
      </table>

        <div class="privilege">
          <div class="operation clearfix">
            <div class="fr si-input">
              <input type="text" class="pri-input sprite" id="privilegeInput" value="选择优惠券" data-cid="0" readonly />
              <a href="javascript:;" class="drop" id="dropTicket"><i class="icon i-triangle-dn"></i></a>
              <div class="select">
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
            <a id="address-new" class="address-new"><i class="order-icon i-add-addr"></i>添加新地址</a>
          <h3 class="address-title">
              送餐详情
          </h3>
        </div>

        <form id="orderForm" class="order-form">
          <div id="address-list" class="address-list">
              <div id="address-list-wrap" class="address-list-wrap low-height">
                <div id="address-list-inner" class="address-list-inner">

                    <div class="j-address-box address-box address-checked"
                         data-aid="132899338" data-flag="1" >
                      <p class="address-line">
                        <span>
                            贾
                            女士
                            ：
                          13711111111
                        </span>
                        <span class="box-modify fr">
                          <a class="j-modify-address address-operation cc-lightred-new" href="javascript:;">修改</a>
                          <a class="j-delete-address address-operation cc-lightred-new" href="javascript:;">删除</a>
                        </span>
                      </p>
                      <p class="address-line">北京市育荣实验学校停车场&nbsp;&nbsp;3楼</p>
                      
                                            <i class="order-icon i-addr-check"></i>

                      <!-- <script type="text/html" class="j-address-data">
                        {
                        "aid" : "132899338",
                        "name" : "贾",
                        "address" : "",
                        "phone" : "13711111111",
                        "gender" : "女士",
                        "house_number" : "3楼",
                        "latitude" : "40101848",
                        "longitude" : "116335180",
                        "gd_addr_type" : "交通设施服务;停车场;公共停车场",
                        "his_addr_flag" : "1" 
                        }
                      </script> -->
                    </div>

                      <input type="hidden" name="addressID" value="132899338" />
                      <input type="hidden" name="customer" value="贾" />
                      <input type="hidden" name="address" value="北京市育荣实验学校停车场" />
                      <input type="hidden" name="mobile" value="13711111111" />
                      <input type="hidden" name="gender" value="女士" />
                      <input type="hidden" name="house_number" value="3楼" />
                      <input type="hidden" name="latitude" value="40101848" />
                      <input type="hidden" name="longitude" value="116335180" />
                      <input type="hidden" name="gd_addr_type" value="交通设施服务;停车场;公共停车场" />

                </div>
              </div>

          </div>

          <input type="hidden" name="poiid" value="895829" />
          <input type="hidden" name="token" value="7F1878252A85409EA010D68CE923EA05" />
          <input type="hidden" name="buildingid" value="" />

          <div class="field clearfix leave-message-short">
            <label for="message">给商家留言：</label>
            <input class="show-tags sprite" type="text" name="message" placeholder="不要辣，多放盐等口味要求" maxlength="100" value=""/>
            <input type="text" style="display:none" />
          </div>

            <div class="field  clearfix">
              <label for="message">发票信息：</label>
              <input class="cheque sprite " type="text" name="cheque"  value="" maxlength="50" />
              <!-- <script type="text/template" id="chequeData">
              {
                "cheques" : [
                ]
              }
              </script> -->
            </div>

            <div class="pay-field clearfix">
              <label class="fl" for="pay-method">付款方式：</label>
              <div class="fl pay-option clearfix">
                    <a href="javascript:;" data-method="1" class="fl sprite option  option-unavail j-show-tips" data-tips="该餐厅不支持餐到付款">餐到付款</a>
                    <a href="javascript:;" data-method="2" class="fl sprite option option-margin selected ">在线支付</a>
              </div>
            </div>
        </form>

       <!--  <script type="text/template" id="addressDialog">
          <div class="add"><a href="javascript:;" class="add-address">+ 添加新地址</a></div>
          <ul>
              <li data-aid="132899338" class="address-132899338 clearfix">
                <i class="icon i-hook-20 fl"></i>
                <div class="address-wrap fl">
                  <div class="actions fr">
                    <a href="javascript:;" class="modify cc-lightred-new">修改</a>
                    <a href="javascript:;" class="delete cc-lightred-new" data-aid="132899338">删除</a>
                  </div>
                  <span class="item fl address">北京市育荣实验学校停车场</span>
                  <span class="item fl phone">13711111111</span>
                  <span class="item fl name">贾</span>
                  <span class="item fl cornet"></span>
                </div>
              </li>
          </ul>
          <div class="btns clearfix">
            <a class="s-btn fr select-address"><span class="s-btn">确认</span></a>
            <span class="error-info fr"></span>
          </div>
        </script> -->
      </div>
        <div class="pre-order field">
          <span>期望送达时间：</span>
          <a href="javascript:;" id="preorder-time"></a>
          <span class="pre-order-tip"><span class="error-tips"></span></span>
        </div>

      <div class="pay-area">
        <div id="order-address-warning" class="order-address-warning" style="display: none"></div>
          <div class="first-order-tip borderradius-5 fr j-first-order-tip">
            <a href="#">
              <div class="left-tip-wrap fl">
                  <p>使用App下单</br>享更多优惠</p>
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
 
          <a class="s-btn yellow-btn fr " id="confirmOrder"><span class="s-btn ">去付款</span></a>
        <div class="tips ct-black">
            您需支付&nbsp;<span class="price cc-lightred-new">&yen;<span id="totalPrice">33.8</span>
              <span  class="nodiscount-tip borderradius-2">
                您今日优惠已用完，本单不再享受优惠
                <i class="icon i-discountip"></i>
              </span>
              <span  class="nodiscount-tip borderradius-2">
                您今日优惠已用完，使用<a href="#" target="_blank">手机客户端</a>可享更多优惠
                <i class="icon i-discountip"></i>
              </span>
            </span>
          <span id="endfix" class="ct-black hidden">，饭到当面付款</span><br/>

        </div>
      </div>
    </div>
  </div>
</div>

      </div>
    </div>
<?php
require('footer.php');
?>
