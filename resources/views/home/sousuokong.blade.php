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
            <h2>搜索"<span class="keyWords cc-lightred-new">{{$inp}}</span>"的结果</h2>
               
            <h1>很遗憾,您搜索的结果不存在.</h1>
        </div>

    </div>
  </div>
</div>
@endsection