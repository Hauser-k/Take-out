@extends('layout.seller.seller')

@section('title')
商品分类
@endsection

@section('content')
            <div class="row-content am-cf">
                <div class="row">
                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title  am-cf">菜品列表</div>


                            </div>
                            <div class="widget-body  am-fr">

                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                                    <div class="am-form-group">
                                        <div class="am-btn-toolbar">
                                            <div class="am-btn-group am-btn-group-xs">
                                                <a href="{{ url('seller/goodsclass/create') }}" type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="am-u-sm-12 am-u-md-6 am-u-lg-3">
                                    <div class="am-form-group tpl-table-list-select">

                                    </div>
                                </div>
                                <form action="{{url('seller/goodsclass')}}" method="get">
                                <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                                    <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                                        <input type="text" name="keywords" class="am-form-field " value="{{ $request['keywords'] or ''}}">
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
                                                <th>订单ID</th>
                                                <th>订单号</th>
                                                <th>用户名称</th>
                                                <th>商家名称</th>
                                                <th>下单时间</th>
                                                <th>接单时间</th>
                                                <th>送达时间</th>
                                            </tr>
                                            @foreach($data as $k => $v)
                                               <tr>
                                                   <td>{{ $v -> oid }}</td>
                                                   <td>{{ $v -> order }}</td>
                                                   <td>{{ $v -> uname }}</td>
                                              
                                                   <td>{{ $v -> sname }}</td>
                                              
                                                   <td>{{date('Y-m-d H:i:s',$v->otime)}}</td>
                                                   <td>{{date('Y-m-d H:i:s',$v->gime)}}</td>
                                                   <td>{{date('Y-m-d H:i:s',$v->ftime)}}</td>
                                               </tr>       
                                             @endforeach
                                        </thead>
                                        <tbody>
                                    
                                            <tr class="gradeX">
                                                <td></td>
                                                
                               
                                            </tr>
                   
                                            <!-- more data -->
                                        </tbody>
                                    </table>
              
                                </div>
                                <div class="am-u-lg-12 am-cf">

                                    <div class="am-fr">
                                        {!! $data->appends(['count'=>$count])->render() !!}
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

@endsection