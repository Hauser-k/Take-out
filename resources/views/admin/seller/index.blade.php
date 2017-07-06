@extends('layout.admin.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="/admin/css/page_page.css">
@endsection

@section('content')

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 商家列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <form action="{{url('admin/seller')}}" method="get">
                        <label>显示 <select size="1" name="count" >
                                <option value="10" @if(!empty($request['count']) && $request['count'] == 10)  selected @endif>10</option>
                                <option value="20" @if(!empty($request['count']) && $request['count'] == 20)  selected @endif>20</option>
                                <option value="30" @if(!empty($request['count']) && $request['count'] == 30)  selected @endif>30</option>
                            </select> 条</label>
                </div>
                <div class="dataTables_filter" id="DataTables_Table_1_filter">
                    <label>关键字: <input type="text" name="search" value="{{ $request['search'] or ''}}" /></label>
                    <button>搜索</button>
                </div>
                </form>
                <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
                    <thead>
                    <tr>
                        <th>ID</th>
                        <th>商家</th>
                        <th>状态</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($data as $k=>$v)
                        <tr>
                            <td>{{ $v->sid}}</td>
                            <td>{{ $v->sname }}</td>
                            <td>{{ $v->status }}</td>
                            <td>
                                <a href="{{url('admin/seller/'.$v->sid)}}" title="商家详情" style="color:#000;font-size:20px;margin-right:40px;"><input type="hidden" name="_method" value="put">商家详情</a>
                                <a href="javascript:;" title="删除" onclick="DelUser({{$v->sid}})" style="color:#000;font-size:20px;margin-right:10px;"><i class="icon-trash"></i></a>
                                <a href="{{url('admin/seller/'.$v->uid.'edit')}}" title="修改" style="color:#000;font-size:20px;margin-right:10px;"><i class="icon-pencil-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
                <script>

                    function DelUser(id){
                        //询问框
                        layer.confirm('是否确认删除？', {
                            btn: ['确定','取消'] //按钮
                        }, function(){

                            $.post("{{url('admin/seller/')}}/"+id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
                                if(data.status == 0){
                                    location.href = location.href;
                                    layer.msg(data.msg, {icon: 6});
                                }else{
                                    location.href = location.href;
                                    layer.msg(data.msg, {icon: 5});
                                }
                            });


                        }, function(){

                        });

                    }


                </script>


                <div class="" id="page_page">
                    {!! $data->appends($request)->render() !!}
                </div>
            </div>
        </div>
    </div>


@endsection