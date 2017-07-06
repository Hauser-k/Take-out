@extends('layout.seller.seller')

@section('title')
	我的评价
@endsection

@section('content')
<div class="widget am-cf">
    <div class="widget-head am-cf">
        <div class="widget-title am-fl">订单详情</div>
        <div class="widget-function am-fr">
            <a href="javascript:;" class="am-icon-cog"></a>
        </div>
    </div>
    <div class="widget-body  widget-body-lg am-fr">

        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>商品名称</th>
                    <th>数量</th>
                    <th>单价</th>
                    <th>配送费</th>
                    
                </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)  
                <tr class="gradeX">
                    <td>1</td>
                    <td>{{$v->uid}}</td>
                    <td>{{substr($v->econtent,0,21)}}...</td>
                    <!-- <td>{{$v->econtent}}</td> -->
                    <td><a href="{{url('/seller/eval/'.$v->order)}}">{{$v->order}}</a></td>
                    <div class="yinchangkuang" style="display: none">
                        dfafd
                    </div>
                    <td>{{date('Y-m-d H:i:s',$v->etime)}}</td>
                    <td>{{$v->escore}}</td>
                    <td>
                        <div class="tpl-table-black-operation">
                            <a href="{{url('/seller/eval/'.$v->eid.'/edit')}}">
                                <i class="am-icon-pencil"></i> 评论详情
                            </a>
                            <a>
                                @if($v->ereply == '')
                                未回复
                                @else
                                已回复
                                @endif
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
                <!-- more data -->
            </tbody>
        </table>
    </div>
</div>
@endsection