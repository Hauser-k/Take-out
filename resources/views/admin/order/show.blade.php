@extends('layout.admin.index')

@section('title')
订单商品
@endsection

@section('css')
<link rel="stylesheet" href="/admin/css/page.css" type="text/css">
@endsection

@section('content')


    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid">
        <div id="DataTables_Table_1_length" class="dataTables_length">
    <form action="{{url('/admin/order/{$id}')}}" method="get">
            <label>展示 
                <select size="1" name="count" aria-controls="DataTables_Table_1">
                    <option value="2" @if(!empty($request['count']) && $request['count'] == 2)  selected @endif>2</option>
                        <option value="20" @if(!empty($request['count']) && $request['count'] == 20)  selected @endif>20</option>
                        <option value="30" @if(!empty($request['count']) && $request['count'] == 30)  selected @endif>30</option>
                </select>
             条目</label>
            </div>
        <div class="dataTables_filter" id="DataTables_Table_1_filter">
      <label>订单号: <input type="text" name="search1" value="{{ $request['search'] or ''}}" /></label>
      <label>商品名称: <input type="text" name="search2" value="{{ $request['search'] or ''}}" /></label>
      <button>搜索</button>

    </div>
    </form>
    <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info">
         <thead>
             <tr role="row">
                 <th class="sorting_asc" role="columnheader" tabindex="0" aria-controls="   DataTables_Table_1" rowspan="1" colspan="1" aria-sort="ascending" aria  -label="Rendering engine: activate to sort column descending" style="   width: 170px;">商品名称
                 </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Browser: activate to sort column ascending" style="width: 224px;">订单号
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Platform(s): activate to sort column ascending" style="width: 209px;">订单数
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="Engine version: activate to sort column ascending" style="width: 148px;">订单价格
                </th>
                <th class="sorting" role="columnheader" tabindex="0" aria-controls="DataTables_Table_1" rowspan="1" colspan="1" aria-label="CSS grade: activate to sort column ascending" style="width: 111px;">口味
                </th>
            </tr>
         </thead>
            @foreach($data as $k => $v)
                   <tr>
                       <td>{{ $v -> gname }}</td>
                       <td>{{ $v -> order }}</td>
                       <td>{{ $v -> onum }}</td>
                       <td>{{ $v -> oprice }}</td>
                       <td>{{ $v -> otaste }}</td>
                   </tr>       
               @endforeach
        </table>
            <div class="dataTables_info" id="DataTables_Table_1_info">  
          <div class="" id="page_page">
        {!! $data->appends(['count'=>$count])->render() !!}
     </div>
</div>

@endsection