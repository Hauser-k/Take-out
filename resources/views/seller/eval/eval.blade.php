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
                回复情况：<select name="status" id="">
                    <option @if(empty($request['status']))  selected @endif value ="">全部</option>
                   <option value="1" @if(!empty($request['status']) && $request['status'] == 1)  selected @endif>已回复</option>
                    <option value="2" @if(!empty($request['status']) && $request['status'] ==2)  selected @endif>未回复</option>
                    
                </select>
                时间：<select name="shijian" id="">
                    <option @if(empty($request['shijian']))  selected @endif value ="">全部</option>
                   <option value="1" @if(!empty($request['shijian']) && $request['shijian'] == 1)  selected @endif>一天内</option>
                    <option value="3" @if(!empty($request['shijian']) && $request['shijian'] == 3)  selected @endif>三天内</option>
                    <option value="7" @if(!empty($request['shijian']) && $request['shijian'] == 7)  selected @endif>七天内</option>
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
                    <td>{{($k+1)}}</td>
                    <td>{{$v->uname}}</td>
                    <td>{{substr($v->econtent,0,21)}}...</td>
                    <!-- <td>{{$v->econtent}}</td> -->
                    <td>{{$v->order}}</td>
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
       {!! $data->appends($request)->render(new \App\AmazeuiThreePresenter($data)) !!}
    </div>
</div>
@endsection