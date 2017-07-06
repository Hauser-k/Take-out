@extends('layout.seller.seller')

@section('title')
	我的评价
@endsection

@section('content')
<div class="widget am-cf">
    <div class="widget-head am-cf">
        <div class="widget-title am-fl">我的评价</div>
        <div class="widget-function am-fr">
            <form action="{{url('seller/eval')}}"　method="get">
                时间：<select name="shijian" id="">
                    <option selected value ="">全部</option>
                    <option value ="1">一天内</option>
                    <option value ="2">三天内</option>
                    <option value ="3">七天内</option>
                </select>
                <input type="submit" value="查询">
            </form>
        </div>
    </div>
    <div class="widget-body  widget-body-lg am-fr">

        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>评价者</th>
                    <th>对我评价</th>
                    <th>订单号</th>
                    <th>评价时间</th>
                    <th>分数</th>
                    <th>操作</th>
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
        {!! $data->render(new \App\AmazeuiThreePresenter($data)) !!}
    </div>
</div>
@endsection