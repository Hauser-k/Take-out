@extends('layout.home.home')
@section('content')
<div class="page-wrap">
    <div class="inner-wrap" style="width: 980px;">

    <div class="result-wrap">
        <div class="result-change clearfix">
            <a href="{{url('/home/search/dian')}}?inp={{$inp}}" class="result-sort fl poi cur-sort" data-geoid="wx4spmkywufe">餐厅</a>
            <a href="{{url('/home/search/caidan')}}?inp={{$inp}}" class="result-sort fl food" data-geoid="wx4spmkywufe">美食</a>
        </div>
  <!-- 商店查询页 -->
        <div class="result-content">
            <h2>搜索"<span class="keyWords cc-lightred-new">{{$inp}}</span>"的餐厅结果</h2>
                <ul class="clearfix">
                    @foreach($data as $k=>$v)
                        <li class="rest-list fl row-last">  <a href="javascript:;" target="_blank">
                            <div class="content">
                                <p class="name"> {{$v->exname}} </p>
                                <p class="price ct-lightgrey">
                                    <span class="start-price">{{$v->sdelfee}}元起送</span>
                                    <span class="send-price">{{$v->sfee}}元配送费
                                    </span>
                                </p>
                                @if($v->status == 1)
                                    <p class="status-rest">休息中</p>
                                @else
                                <p class="rank clearfix">
                                    <span class="star-ranking fl">
                                        <span class="star-score" style="width: 66px"></span>
                                    </span>
                                    <span class="total fl cc-lightred-new">月售605单</span>
                                </p>
                                <p class="send-time ct-lightgrey">
                                    平均送餐时间：34分钟
                                </p>
                                <p class="status-rest">营业中</p>
                            </div>
                                 @endif
                        </li>
                    @endforeach
                </ul>
        </div>
<!--商家页结束  -->


    </div>
  </div>
</div>

@endsection