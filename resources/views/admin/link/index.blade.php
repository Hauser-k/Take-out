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
    <span> <i class="icon-table"> </i> Data Table with Numbered Pagination </span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <div id="DataTables_Table_1_wrapper" class="dataTables_wrapper" role="grid"> 
     <div id="DataTables_Table_1_length" class="dataTables_length"> 
        <form action="/admin/link" method="get">
      <label>显示列表<select size="1" name="count" > 
                        <option value="10">10</option>
                        <option value="20">20</option>
                        <option value="30">30</option> 
                    </select> 条</label> 
     </div> 
     <div class="dataTables_filter" id="DataTables_Table_1_filter"> 
      <!-- <label>关键字<input type="text" name="search" value="" /> </label>  -->
      <button>搜索</button>
     </div> 
     </form>
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row"> 
            <tr>
                <th>ID</th>
                <th>链接名称</th>
                <th>路由名称</th>
                <th>操作</th>

            </tr>
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all"> 
       @foreach($data as $k=>$v)
       <tr> 
            <td>{{ $v['lid']}}</td>
            <td>{{ $v['lname']}}</td>
            <td>{{ $v['lurl']}}</td>
            <td>
                <a href="{{url('admin/link/'.$v->lid.'/edit')}}">修改</a>
                <a href="javascript:;" onclick="DelUser('{{$v->lid}}')">删除</a>
              
            </td>
       </tr> 
       @endforeach
      </tbody> 
     </table> 
     <div class="" id="page_page">
    {!! $data->appends(['count'=>$count,'search'=>$search])->render() !!}
    </div>
    </div> 
   </div> 
  </div>
 </body>
</html>

<script>

    function DelUser(lid)
    {
        
    layer.confirm('是否确认删除?', {
      btn: ['确定','取消'] //按钮
    }, function(){
       $.post(
        "{{'link'}}/"+lid,
        {
          '_method':'DELETE',
          '_token':"{{csrf_token()}}"
        },
          function(data){
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

@endsection

