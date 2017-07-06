@extends('layout.seller.seller')

@section('title')
	评价详情
@endsection

@section('content')
<form class="am-form tpl-form-border-form tpl-form-border-br" method="post" action="{{url('/seller/eval/'.$data->eid)}}"> 
<input type="hidden" name="_method" value="put">
{{csrf_field()}}
    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label" for="user-name">评价者</label>
        <div class="am-u-sm-9">
            <input type="text" id="user-name" readonly="" value="{{$data->uid}}" class="tpl-form-input">
        </div>
    </div>
    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label" for="user-name">评价时间</label>
        <div class="am-u-sm-9">
            <input type="text" id="user-name" readonly="" value="{{$data->etime}}" class="tpl-form-input">
        </div>
    </div>
    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label" for="user-name">订单号</label>
        <div class="am-u-sm-9">
            <input type="text" id="user-name" readonly="" value="{{$data->order}}" class="tpl-form-input">
        </div>
    </div>
    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label" for="user-name">用户打分</label>
        <div class="am-u-sm-9">
            <input type="text" id="user-name" readonly="" value="{{$data->escore}}" class="tpl-form-input">
        </div>
    </div>
    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label" for="user-name">对我评价</label>
        <div class="am-u-sm-9">
            <input type="text" id="user-name" readonly="" value="{{$data->econtent}}" class="tpl-form-input">
        </div>
    </div>
    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label" for="user-name">我想说:</label><br>
        <div class="am-u-sm-9">
        @if($data->ereply == '')
        <textarea name="ereply" id="" cols="30" rows="10">{{$data->ereply}}</textarea>
        @else
        <textarea name="ereply" id="" cols="30"  readonly="" rows="10">{{$data->ereply}}</textarea>
        @endif
	        <!-- <script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.config.js')}}"></script>
	    	<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/ueditor.all.min.js')}}"> </script>
			<script type="text/javascript" charset="utf-8" src="{{asset('ueditor/lang/zh-cn/zh-cn.js')}}"></script>
			<script id="editor" type="text/plain" style="width:700px;height:500px;"></script>
			<script type="text/javascript">
	   			var ue = UE.getEditor('editor');
	   		</script>
	   		<style>
	            .edui-default{line-height: 28px;}
	            div.edui-combox-body,div.edui-button-body,div.edui-splitbutton-body
	            {overflow: hidden; height:20px;}
	            div.edui-box{overflow: hidden; height:22px;}
	        </style> -->
	    </div>   
    </div>
    <div class="am-form-group">
        <div class="am-u-sm-9 am-u-sm-push-3">
        	@if($data->ereply == '')
            <button class="am-btn am-btn-primary tpl-btn-bg-color-success " type="submit">回复</button>
            @endif
        </div>
    </div>
</form>
@endsection