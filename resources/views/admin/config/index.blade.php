@extends('layout.admin.index')
@section('css')
    <config rel="stylesheet" type="text/css" href="/admin/css/page_page.css">
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
        <form action="/admin/config" method="get">
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

     <form action="{{url('admin/config/changecontent')}}" method="post">
     <table class="mws-datatable-fn mws-table dataTable" id="DataTables_Table_1" aria-describedby="DataTables_Table_1_info"> 
      <thead> 
       <tr role="row"> 
            <tr>
                <th class="tc" style="width:300px;">排序</th>
                <th class="tc">ID</th>
                <th>标题</th>
                <th>名称</th>
                <th>内容</th>
                <th>操作</th>
            </tr>
            {{csrf_field()}}
       </tr> 
      </thead> 
      <tbody role="alert" aria-live="polite" aria-relevant="all"> 
       @foreach($data as $k=>$v)
       <tr> 
            <td class="tc" >
            <input type="text" value="{{$v->conorder}}" style="width:50px;" onchange="changeOrder(this,{{$v->conid}})">
            </td>                                                 
            <td>                                          
              <a href="#">{{$v['conid']}}</a>
            </td>
            <td>{{ $v['contitle']}}</td>
            <td>{{ $v['conname']}}</td>
            <td>
                <input type="hidden" name="conid[]" value="{{$v->conid}}" >
                {!! $v->content !!}
            </td>
            
            
            <td>
                <a href="{{url('admin/config/'.$v->conid.'/edit')}}">修改</a>
                <a href="javascript:;" onclick="DelUser('{{$v->conid}}')">删除</a>
              
            </td>
       </tr> 
       @endforeach
      </tbody> 
     </table> 
      <div class="mws-button-row"> 
      <input type="submit" value="提交" class="btn btn-danger" /> 
     
     </div>
     </form>
     <div class="" id="page_page">
      
    </div>
    </div> 
   </div> 
  </div>
 </body>
</html>

<script>


       function changeOrder(obj,conid){
//            获取修改后的排序号
             var conorder =  $(obj).val();
             $.post('{{url('admin/config/changeorder')}}',{'_token':"{{csrf_token()}}",'conid':conid,'conorder':conorder},function(data){
                 if(data.status == 0){
                     location.href = location.href;
                     layer.msg(data.msg, {icon: 6});
                 }else{
                     location.href = location.href;
                     layer.msg(data.msg, {icon: 5});
                 }
             })
        }


    function DelUser(conid)
    {
        
    layer.confirm('是否确认删除?', {
      btn: ['确定','取消'] //按钮
    }, function(){
       $.post(
        "{{'config'}}/"+conid,
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

