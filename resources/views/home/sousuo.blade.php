@extends('layout.home.home')
@section('content')
        <div class="page-wrap">
            <div class="inner-wrap" style="width: 980px;">
                <div class="result-wrap">
                    <div class="result-change clearfix">
                        <a href="{{url('/home/search/dian')}}?inp={{$inp}}" class="result-sort fl " data-geoid="wx4spmkywufe">餐厅</a>
                        <a href="{{url('/home/search/caidan')}}?inp={{$inp}}" class="result-sort fl poi cur-sort food" data-geoid="wx4spmkywufe">美食</a>
                      </div>
                    <div class="result-content">
                        <h2>搜索&quot;<span class="keyWords cc-lightred-new"> {{$inp}} </span>&quot;的美食结果</h2>
                    @foreach($seller as $k=>$v)
                        <div class="result-list">
                            <div class="poi-info clearfix">
                                <div class="name clearfix">
                                    <h3 class="fl"><a href="#" target="_blank">{{$v->exname}}</a></h3>
                                    <div class="discount fl">
                                        <i class="icon i-pay fl"></i>
                                        <!-- 是否支持代金券 -->
                                        <!-- 返 -->
                                    </div>
                                </div>
                                <div class="info-content clearfix">
                                    <span class="rank fl"> <span class="star-ranking fl"> <span class="star-score" style="width: 65px"></span> </span> <span class="rank-grades ct-lightgrey fl">4.4</span> </span>
                                    <span class="total cc-syellow fl"> 月售214单 </span>
                                    <span class="fl ct-b5gray">|</span>
                                    <span class="price fl ct-lightgrey"> <span class="start-price">{{$v->odelfee}}元起送</span> <span class="send-price"> {{$v->ofee}}元配送费 </span> </span>
                                </div>
                            </div>
                       
                            <ul class="food-list">
                            @foreach($data as $m=>$n)
                            <!-- $data的结果为: 
                                    array:2 [▼
                                          0 => array:1 [▼
                                            2 => Goods {#471 ▶}
                                          ]
                                          1 => array:1 [▼
                                            2 => Goods {#472 ▶}
                                          ]
                                        ]
                            -->
                                @if($v->sid == array_keys($n)[0] )
                                <li class="clearfix" data-poiname="星期八烧烤" data-poiid="144840123951394028" data-foodid="143407286">
                                    <a href="" class="food fl">
                                        <p class="details fl "> <span class="food-name ">{!! array_values($n)[0]->gname !!}</span> </p>
										<span class="food-price fl" style="width:120px">单价￥{!! array_values($n)[0]->gprice !!}元</span>
										<span class="food-total fl  ct-middlegrey"> 月售{!! array_values($n)[0]->gcount !!}单 </span>
										
										<span class="buy fl"> 购买 </span> </a>
                                </li>
                                @endif
                             @endforeach   
                            </ul>
                        </div>
                         @endforeach
                       

                    </div>
                </div>
            </div>
        </div>
@endsection