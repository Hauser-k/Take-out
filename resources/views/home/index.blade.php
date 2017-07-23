@extends('layout.home.home')
@section('content')
<div class="page-wrap">
<div class="inner-wrap" style="width:980px;">
<div class="inner-bg">
    <div class="rest-banner">
      <div class="imgsort-wrapper">

        <span class="imgsort-filter-title">商家分类</span>
        <ul class="clearfix imgsort-content">

          <li class="fl selected">
            <a href="{{url('home/index')}}" data-cate="cate_all" class="imgsort-list" title="全部">
              <span class="imgsort-info">全部</span>
            </a>
          </li>
            @foreach($data as $v)
            <li class="fl " >
              <a class="imgsort-list" title="{{$v['csname']}}" href="{{url('home/index'.'/?csid='.+$v['csid'])}}" data-cate="940">
                <span class="imgsort-info">{{$v['csname']}}</span>
              </a>
            </li>
            @endforeach

        </ul>
      </div>
        <div class="rest-filter clearfix" style="border: none;">



        </div>
      <div class="divider"></div>

    </div>
  <div class="rest-list">
    <ul class="list clearfix">
        @foreach($gooder as $kk=>$vv)
        <li class="fl rest-li" >
            <div class="j-rest-outer rest-outer transition ">
      <div data-title="北京麦当劳育知东路餐厅" data-bulletin="" data-poiid="144838878410737716" class="restaurant" data-all="1"
            data-invoice="1"
        data-minpricelevel="1">
        <a class="rest-atag" href="javascript:;" target="_blank">
          <div class="top-content">
            <div class="preview">
              <img data-rid="144838878410737716" data-index="0" class="scroll-loading" src="{{url('/uploads/')}}/{{ $vv['slogo']}}" data-max-width="208" data-max-height="156"  />
              <div class="rest-tags">
              </div>
            </div>
            <div class="content">
              <div class="name">
                <span title="北京麦当劳育知东路餐厅">
                        {{$vv['exname']}}

                </span>
              </div>
                <div class="rank clearfix">
                  <span class="star-ranking fl">
                    <!-- 5颗星60px长度，算此时星级的长度 -->
                    <!-- 算出空白填充的部分长度 -->
                    <span class="star-score" style="width: 68px"></span>
                  </span>
                  <span class="score-num fl">4.6分</span>
                  <!--
                  <span class="total cc-lightred-new fr               ">
月售829单
                  </span>
                  -->
                </div>
              <div class="price">
                <span class="start-price">起送:￥{{$vv['ofee']}}元</span>
                <span class="send-price">
                  配送费:￥{{$vv['odelfee']}}元
                </span>

              </div>
            </div>

            <div class="clear"></div>

          </div>


        </a>
          <a href="javascript:;"  onclick="DelUser({{$vv['sid']}})" style="display:block" class="un-favorite j-save-up"  title="收藏商家">
            <i class="icon i-poi-fav1" ></i>
          </a>
      </div>
    </div>
</li>
        @endforeach
          <script>

              function DelUser(id){
                  //询问框

                  layer.confirm('确认收藏', {
                      btn: ['确定','取消'] //按钮
                  }, function(){

                      $.get("{{url('home/index')}}/"+id,function(data){

                          if(data.status == 0){
                             location.href = location.href;
                              layer.msg(data.msg, {icon: 6});
                          }else if(data.status == 403){
                              location.href = location.href;
                              layer.msg(data.msg, {icon: 5});
                          }else{
                              layer.msg(data.msg, {icon: 5});
                          }
                      });


                  }, function(){

                  });

              }


          </script>

      <li class="rest-separate j-rest-separate loading" id="loading">
          <div class="isloading">点击加载更多商家</div>
      </li>
    </ul>
  </div>


  <style>
      .banner-qrcode {
          position:fixed;
          width: 100%;
          height: 114px;
          background: rgba(0,0,0,.7);
          left: 0;
          bottom: 0;
          z-index:1000;
      }

      .baner-content {
          width: 450px;
          height: 100%;
          margin:0 auto;
          overflow: hidden;
      }

      .qrcode-img {
          width: 78px;
          height: 78px;
          float: left;
          margin-top:20px;
          background: url("../static/img/home/banner_qrcode.png") no-repeat;
          background-size: 100%;
      }

      .banner-text {
          float: right;
      }

      .banner-text p {
          font-size: 32px;
          color:#fff;
          margin-top:20px;
      }
      .banner-text p em {
          color:#ff0000;
          font-style:normal;
      }
      p.advice {
          font-size: 20px;
          margin-top:6px;
          font-weight:lighter;
      }

      .close {
          position: absolute;
          right: 5px;
          top: 0;
          color:#a2a2a2;
          font-size: 18px;
          display:inline-block;
          width:30px;
          height:30px;
          line-height:35px;
          text-align:center;
          cursor:pointer;
          font-size: 14px;
      }

  </style>

</div>

      </div>
    </div>
@endsection

