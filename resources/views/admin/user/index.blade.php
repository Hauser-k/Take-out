@extends('layout.admin.index')

@section('css')
    <link rel="stylesheet" type="text/css" href="/admin/css/page_page.css">
@endsection

@section('content')
    <html>
    <head></head>
    <body>
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span><i class="icon-table"></i> 用户列表</span>
        </div>
        <div class="mws-panel-body no-padding">
            <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
                <div id="DataTables_Table_1_length" class="dataTables_length">
                    <form action="/admin/user/index" method="get">
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
                        <th>用户名</th>
                        <th>邮箱</th>
                        <th>手机</th>
                        <th>余额</th>
                        <th>注册时间</th>
                        <th>操作</th>
                    </tr>
                    </thead>
                    <tbody role="alert" aria-live="polite" aria-relevant="all">
                    @foreach($data as $k=>$v)
                        <tr>
                            <td>{{ $v['uid'] }}</td>
                            <td>{{ $v['uname'] }}</td>
                            <td>{{ $v['uemail'] }}</td>
                            <td>{{ $v['utel'] }}</td>
                            <td>{{ $v['umoney'] }}</td>
                            <td>{{ date('Y-m-d H:i:s',$v['utime']) }}</td>
                            <td>
                                <a href="/admin/user/delete/{{ $v['uid'] }}" title="删除" style="color:#000;font-size:20px;margin-right:15px;"><i class="icon-trash"></i></a>
                                <a href="/admin/user/edit/{{ $v['uid'] }}" title="修改" style="color:#000;font-size:20px;margin-right:15px;"><i class="icon-pencil-2"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>


                <div class="" id="page_page">
                    {!! $data->appends($request)->render() !!}
                </div>
            </div>
        </div>
    </div>
    </body>
    </html>


@endsection