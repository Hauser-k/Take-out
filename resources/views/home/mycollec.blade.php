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
      <li><a href="{{url('home/mycollec')}}" class="borderradius-1 my-favorite "><i></i>我的收藏</a></li>
    </ul>
  </span>
                </div>

                {{csrf_field()}}
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
                                    <a href="javascript:;"  onclick="DelUser({{$vv['sid']}})" style="display:block" class="un-favorite j-save-up"  title="取消收藏">
                                        <i class="icon i-poi-fav1" ></i>
                                    </a>
                                </div>
                            </div>
                        </li>
                    @endforeach
                        <script>

                            function DelUser(id){
                                //询问框

                                layer.confirm('取消收藏', {
                                    btn: ['确定','取消'] //按钮
                                }, function(){

                                    $.post("{{url('home/index')}}/"+id,{'_method':'DELETE','_token':"{{csrf_token()}}"}, function(data){

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


                        <li class="rest-separate j-rest-se  parate loading" id="loading">



                <div id="anti_token" data-token="NjVwLbnCWUTqVPcjluiLHaz/qJjMfDOADifO7uV6CfNHjjgG52lbm5qi5DwP5iiX"></div>
            </div>
        </div>
@endsection