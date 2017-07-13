@extends('layout.admin.index')

@section('content')
  <div class="mws-panel grid_8"> 
   <div class="mws-panel-header"> 
    <span>Inline Form</span> 
   </div> 
   <div class="mws-panel-body no-padding"> 
    <form class="mws-form" action="{{url('/admin/config')}}" method="post">
     <div class="mws-form-inline"> 
          <div class="mws-form-row"> 
           <label class="mws-form-label">标题</label> 
           <div class="mws-form-item"> 
            <input type="text" class="small" name="contitle" style="width:250px"/> 

           </div> 
      </div> 
          <div class="mws-form-row"> 
           <label class="mws-form-label">名称</label> 
           <div class="mws-form-item"> 
            <input type="text" class="medium" name="conname" style="width:250px"/> 
           </div> 
      </div> 

      <div class="mws-form-row"> 
       <label class="mws-form-label">类型</label> 
       <div class="mws-form-item clearfix"> 
        <ul class="mws-form-list inline"> 
         <li><input type="radio"  name="contype" checked value="input" onclick="showTr()"/> <label>input</label></li> 
         <li><input type="radio"  name="contype" value="textarea" onclick="showTr()"/> <label>textarea</label></li> 
         <li><input type="radio"  name="contype" value="radio" onclick="showTr()" /> <label>radio</label></li>
        </ul> 
       </div> 
      </div> 
        
            
       <div  class="convalue">
      <div class="mws-form-row"> 
           <label class="mws-form-label">类型值</label> 
           <div class="mws-form-item"> 
            <input type="text"  name="convalue"  value="1|开启,0|关闭" style="width:250px"/> 
              <span><i class ="fa fa-exclamation-circle yellow ">类型值只有在radio的情况下才需要配置,格式1|开启,0|关闭</i></span>
           </div> 
      </div> 
      </div>

      <div class="mws-form-row"> 
           <label class="mws-form-label">排序</label> 
           <div class="mws-form-item "> 
            <input type="text" class="large" name="conorder" style="width:250px" /> 
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
 
 <script>
    showTr();
    function showTr()
    {
        if($('input[name=contype]:checked').val() == 'radio'){
              $('.convalue').show();
        }else{
              $('.convalue').hide();
        }
    }
 </script>
@endsection