@extends('layout.seller.seller')

@section('title')
订单列表
@endsection

@section('content')
   
        <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">订单列表</div>


                            </div>
                            <div class="widget-body  am-fr">

                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                    <div class="am-form-group">
                                        <div class="am-btn-toolbar">
                                            
                                        </div>
                                    </div>
                                </div>
                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                    <div class="am-form-group tpl-table-list-select">



                                    </div>
                                </div>
                                  <form action="{{url('seller/order')}}" method="get">
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3" style="width: 500px">
                                   <div style="float:left;margin-top:5px 0px;height:32px;line-height: 32px;width:50px;"><span style="font-color:white;">状态&nbsp;&nbsp;&nbsp;</span></div>
                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p" style="float:left;width: 200px;padding-left: 3px;">
                                    
                                        <select name="ostatus"  id="">
                                            <option  value ="">全部</option>
                                           @foreach($arr as $k=>$v)
                                                @if($data[0]['ostatus'] == $k)
                                                    <option selected value ="{{$k}}">{{$v}}</option>
                                                @else
                                                    <option value ="{{$k}}">{{$v}}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>
                                     <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p"  style="float:left;width: 200px;margin-left: 20px">
                                        <input type="text" name="keywords" placeholder="请输入订单号" class="am-form-field " value="{{ $request['keywords'] or ''}}">
                                        <span class="am-input-group-btn">
                                        <input class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit"  value="搜索">
                                        </span>
                                    </div>
                                </form>
                                </div>

                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>
                                            <tr>
                                                <th>序号</th>
                                                <th>订单号</th>
                                                <th>订单状态</th>
                                                <th>下单时间</th>
                                                <th>接单时间</th>
                                                <th>送达时间</th>
                                                <th>操作</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k=>$v)
                                            <tr class="gradeX">
                                                <td>{{$k+1}}</td>
                                                <td>{{$v->order}}</td>
                                                <td>{{$arr[$v->ostatus]}}</td>
                                                <td>{{date('Y-m-d H:i:s',$v->otime)}}</td>
                                                @if($v->gtime == 0)
                                                    <td>/</td>
                                                @else
                                                    <td>{{date('Y-m-d H:i:s',$v->gtime)}}</td>
                                                @endif        
                                                @if($v->ftime == 0)
                                                    <td>/</td>
                                                @else
                                                    <td>{{date('Y-m-d H:i:s',$v->ftime)}}</td>
                                                @endif  
                                              
                                                <td>
                                                    <div class="tpl-table-black-operation">
                                                        <a href="{{url('/seller/order/'.$v->order)}}">
                                                            <i class="am-icon-pencil"></i>订单详情
                                                        </a>
                                                        <a href="{{url('/seller/order/'.$v->oid.'/edit')}}">
                                                            <i class="am-icon-pencil"></i>配送单
                                                        </a>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                            <!-- more data -->
                                        </tbody>
                                    </table>
                                    {!! $data->appends(['count'=>$count])->render() !!}
                                </div>
                                <div class="am-u-lg-12 am-cf">

                                    <div class="am-fr">
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection