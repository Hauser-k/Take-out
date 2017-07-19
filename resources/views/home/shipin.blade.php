@extends('layout.home.home')

@section('css')
<link rel="stylesheet" href="{{url('/home/css/body.css')}}">
@endsection


@section('content')

      <div class="page-wrap">
        <div class="inner-wrap">


<div class="rest-info">

    <div class="right-bar fr clearfix ct-lightgrey">

      <div class="fl average-speed">
          <div class="desc">平均送餐时间</div>
          <div class="nu">
                  <strong>43</strong>分钟
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
              <strong>7</strong>元
          </div>

      </div>
    </div>
  <div class="details">
    <div class="up-wrap clearfix">
      <div class="avatar fl">
        <img class="scroll-loading" src="http://p1.meituan.net/120.0/xianfu/630520fcf12e10b7c85f2796d02a8bf236024.jpg" data-src="http://p1.meituan.net/120.0/xianfu/630520fcf12e10b7c85f2796d02a8bf236024.jpg" data-max-width="106" data-max-height="80" style="width: 106px; height: 79.5px;">
      </div>
      <div class="list">
        <div class="na">
          <a href="/restaurant/144869570258288116">
            <span>和合谷(昌平阳光店)</span><i class="icon i-triangle-dn"></i>
          </a>
        </div>
        <div class="stars clearfix" style="margin-top:14px;">
            <span class="star-ranking fl">
                    <span class="star-score" style="width: 69px"></span>
              </span>
            <span class="fl mark ct-middlegrey">4.8</span> <br>
        </div>
      </div>
    </div>
    <div class="rest-info-down-wrap" style="">
      <svg style="position: absolute; width: 0; height: 0; overflow: hidden;" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><symbol id="icon-Shape-Copy" viewBox="0 0 32 32"><path d="M25.387 21.12l-8.32 10.453c-0.64 0.853-1.707 0.853-2.347 0l-8.32-10.453c-1.92-2.133-3.2-5.12-3.2-8.32 0-7.040 5.76-12.587 12.8-12.587s12.8 5.547 12.8 12.587c0 3.2-1.28 5.973-3.413 8.32v0zM16 6.187c-3.627 0-6.4 2.773-6.4 6.4 0 3.413 2.773 6.4 6.4 6.4s6.4-2.773 6.4-6.4c0-3.413-2.773-6.4-6.4-6.4v0z"></path></symbol><symbol id="icon-Fill-2" viewBox="0 0 32 32"><path d="M7.467 2.133c-1.493 0-5.333 2.773-5.333 5.547 0 7.68 13.867 22.187 22.4 22.187 2.347 0 5.333-2.56 5.333-5.547 0-1.067-6.187-5.547-7.467-5.547-1.493 0-2.56 1.28-3.84 1.28s-6.827-5.76-6.827-7.040c0-1.493 1.28-2.133 1.28-3.627-0.213-0.853-4.053-7.253-5.547-7.253z"></path></symbol><symbol id="icon-Combined-Shape" viewBox="0 0 32 32"><path d="M16 2.133c-7.68 0-13.867 6.187-13.867 13.867s6.187 13.867 13.867 13.867 13.867-6.187 13.867-13.867-6.187-13.867-13.867-13.867zM22.4 23.893l-7.467-6.827v-10.667h2.133v9.173l6.827 6.827-1.493 1.493z"></path></symbol></defs></svg>
      <div class="clearfix sale-time">
        <p class="poi-detail-left"><svg class="icon-Combined-Shape"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-Combined-Shape"></use></svg><span>营业时间</span></p>
        <p class="poi-detail-right"><span class="info-detail">10:00-20:00</span></p>
      </div>

        <div class="rest-info-thirdpart poi-address">
        <p class="poi-detail-left"><svg class="icon-Shape-Copy"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-Shape-Copy"></use></svg><span class="poi-address-title">商家地址</span></p>
        <p class="poi-detail-right">昌平区府学路29号（阳光商厦B1层）</p>
        </div>
        <div class="telephone">
            <p class="poi-detail-left"><svg class="icon-Fill-2"><use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#icon-Fill-2"></use></svg>商家电话</p>
            <p class="poi-detail-right">4009009009 010-69741581</p>
        </div>

    </div>
  </div>
  <div class="save-up-wrapper">
    <a href="javascript:;" class="save-up j-save-up " data-poiid="144869570258288116">
      <p class="ct-black">收藏本店</p>
      <i class="icon i-heart-22"></i>
    </a>
    <p class="cc-lightred-new j-save-up-people"></p>
  </div>
</div>
<div class="qualification fl" data-pid="">
  <div class="tab-link">
    <div class="tab-link-inner clearfix">
      <a href="/restaurant/144869570258288116" class="tab-item ">菜单</a>
      <a href="/comment/144869570258288116" class="tab-item ">评价</a>
        <a href="/qualification/144869570258288116" class="tab-item  active">食品安全档案</a>
    </div>
  </div>
  <div class="content clearfix">


          <h2 class="q-title">食品安全监督公示</h2>
          <div class="new-zizhi">
               <div class="zizhi-img">
                   <img src="http://p0.meituan.net/xianfu/8f998e3b12264f92905a07392c805e4017191.jpg">
               </div>
               <div class="zizhi-info">
                                     <p>场所等级：
                                         <span>良好</span>
                                     </p>

                                   <p>管理等级：
                                       <span>良好</span>
                                   </p>



                      <p>检查日期：2016-09-27</p>

                        <p>单位名称：北京和合谷餐饮管理有限公司昌平餐饮分店</p>

                      <p>许可证号：(京食药)餐证字2015110114003358</p>

                      <p>法定代表人（负责人）：赵申</p>

                       <p>经营地址：府学路29号阳光商厦地下一层</p>

                       <p>主体业态：中型餐馆</p>

                       <p>经营项目：不含凉菜、不含裱花蛋糕、不含生食水产品</p>

                      <p>有效期：2020-10-27</p>


               </div>
           </div>

          <h2 class="q-title">商家资质信息公示</h2>
               <ul class="fl">
                 <p>营业执照</p>
  <li class="qualification-list fl">
    <div class="img-wrapper">
      <img src="http://p1.meituan.net/xianfu/fa99040f3d980556fed68d9cf170b031224504.jpg">
    </div>
  </li>
               </ul>
               <ul class="fl">
                 <p>餐饮服务许可证</p>
  <li class="qualification-list fl">
    <div class="img-wrapper">
      <img src="http://p1.meituan.net/xianfu/c6e79e3d731e0be57478d74d8965115253337.jpg">
    </div>
  </li>
               </ul>


  </div>


</div>


<div class="widgets fr">
</div>
<div class="clear"></div>


      </div>
    </div>
 
 @endsection