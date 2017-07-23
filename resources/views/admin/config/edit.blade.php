@extends('layout.admin.index')

@section('content')
<html>
 <head></head>
 <body>
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>Inline Form</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
       <form class="mws-form" action="{{url('/admin/config/'.$data->conid)}}" method="post">
            <input type="hidden" name="_method" value="put">
     <div class="mws-form-inline"> 
          <div class="mws-form-row"> 
           <label class="mws-form-label">标题</label> 
           <div class="mws-form-item"> 
            <input type="hidden" name="conid" value="{{$data->conid}}">
            <input type="text" class="small" name="contitle"  value="{{$data->contitle}}"  style="width:250px"/> 
           </div> 
      </div> 
          <div class="mws-form-row"> 
           <label class="mws-form-label">名称</label> 
           <div class="mws-form-item"> 
            <input type="text" class="medium" name="conname"  value="{{$data->conname}}" style="width:250px"/> 
           </div> 
      </div> 

     <div class="mws-form-row"> 
       <label class="mws-form-label">类型</label> 
       <div class="mws-form-item clearfix"> 
        <ul class="mws-form-list inline"> 
         <li><input type="radio"  name="contype" @if($data->contype == 'input') checked @endif value="input" onclick="showTr()"/> <label>input</label></li> 
         <li><input type="radio"  name="contype" @if($data->contype == 'textarea') checked @endif value="textarea" onclick="showTr()"/> <label>textarea</label></li> 
         <li><input type="radio"  name="contype" @if($data->contype == 'radio') checked @endif value="radio" onclick="showTr()" /> <label>radio</label></li>
        </ul> 
       </div> 
      </div> 


        <div  class="field_value">
      <div class="mws-form-row"> 
           <label class="mws-form-label">类型值</label> 
           <div class="mws-form-item"> 
            <input type="text"  name="convalue"  value="{{$data->convalue}}" style="width:250px"/> 
              <span><i class ="fa fa-exclamation-circle yellow ">类型值只有在radio的情况下才需要配置,格式1|开启,0|关闭</i></span>
           </div> 
      </div> 
      </div>


      <div class="mws-form-row"> 
           <label class="mws-form-label">排序</label> 
           <div class="mws-form-item "> 
            <input type="text" class="large" name="conorder"  value="{{$data->conorder}}" style="width:250px" /> 
           </div> 
      </div> 

      <div class="mws-form-row"> 
       <label class="mws-form-label">说明</label> 
       <div class="mws-form-item"> 
        <textarea rows="" cols="" class="large" name="contips" style="width:500px"></textarea> 
       </div> 
      </div> 
       {{ csrf_field() }}  
     </div> 
     <div class="mws-button-row"> 
      <input type="submit" value="提交" class="btn btn-danger" /> 
     
     </div> 
    </form> 
   </div> 
  </div>
 </body>
</html>
 <script>
    showTr();
    function showTr()
    {
      // var l = $('.inp').val();
      // alert(l);
        if($('input[name=contype]:checked').val() == 'radio'){
              $('.field_value').show();
        }else{
              $('.field_value').hide();
        }
    }
 </script>


@endsection