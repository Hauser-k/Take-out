@extends('layout.seller.seller')

@section('title')
订单-商品列表
@endsection

@section('content')
        <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">订单-商品列表</div>


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
                                <!--   <form action="{{url('seller/order')}}" method="get">
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                        <input type="text" name="keywords" placeholder="请输入订单号" class="am-form-field " value="{{ $request['keywords'] or ''}}">
                                        <span class="am-input-group-btn">
            <input class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="submit"  value="搜索">
          </span>
                                    </div>
                                </form> -->
                                </div>

                                <div class="am-u-sm-12">
                                    <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
                                        <thead>
                                            <tr>
                                                <th>序号</th>
                                                <th>订单号</th>
                                                <th>商品</th>
                                                <th>数量</th>
                                                <th>口味</th>
                                                <th>单价</th>
                                                <th>小计</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($data as $k=>$v)
                                            <tr class="gradeX">
                                                <td>{{$k+1}}</td>
                                                <td>{{$v->oid}}</td>
                                                <td>{{$v->gname}}</td>
                                                <td>{{$v->onum}}</td>
                                                <td>{{$v->otaste}}</td>
                                                <td>{{$v->oprice}}</td>
                                                <td>{{($v->onum)*($v->oprice)}}</td>
                                            </tr>
                                        @endforeach
                                            <!-- more data -->
                                        </tbody>
                                    </table>
                                     {!! $data->render() !!}
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