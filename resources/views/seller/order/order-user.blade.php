@extends('layout.seller.seller')

@section('title')
订单-配送单
@endsection

@section('content')
<div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title am-fl">买家配送单</div>
                  
                    <div class="widget-function am-fr">
                        <!-- <a href="javascript:;" class="am-icon-cog"></a> -->
                    </div>
                </div> 					
                <div class="widget-body am-fr">
					        @if(session('error'))
                                <center><p style="color:red"> {{session('error')}}</p></center>
                            @else(seeeion('success'))
                                <p style="background:green">  {{session('success')}}</p>
                            @endif
                    <form class="am-form tpl-form-border-form tpl-form-border-br" action="{{url('seller/order/'.$data->oid)}}" method="post">
                        {{csrf_field()}}
                        <input type="hidden" name="_method" value="put">
                        <input type="hidden" name="did" value="{{$data->did}}">
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">收货人:</label>
                            <div class="am-u-sm-9">
                                <input type="text" class="tpl-form-input" id="" name="dname" value="{{$data->dname}}" placeholder="">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">收货人电话:</label>
                            <div class="am-u-sm-9">
                                <input type="text" class="tpl-form-input" maxlength="11" minlength="11" id="dtel" name="dtel" value="{{$data->dtel}}" placeholder="">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">收货人地址:</label>
                            <div class="am-u-sm-9">
                                <input type="text" class="tpl-form-input" id="" name="daddr" value="{{$data->daddr}}" placeholder="">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">买家留言:</label>
                            <div class="am-u-sm-9">
								<textarea name="umsg" id="" cols="10" rows="4">{{$data->umsg}}</textarea>
                            </div>
                        </div>
                  
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">最终价格:</label>
                            <div class="am-u-sm-9">
                                <input type="text" readonly class="tpl-form-input" id="" name="endprice" value="{{$data->endprice}}" placeholder="">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">配送费:</label>
                            <div class="am-u-sm-9">
                                <input type="text" readonly class="tpl-form-input" id="" name="ofee" value="{{$data->ofee}}" placeholder="">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">优惠券:</label>
                            <div class="am-u-sm-9">
                                <input type="text" readonly class="tpl-form-input" id="" name="ocoupon" value="{{$data->ocoupon}}" placeholder="">
                            </div>
                        </div>
                        <div class="am-form-group">
                            <label for="user-name" class="am-u-sm-3 am-form-label">订单状态:</label>
                            <div class="am-u-sm-9">
                                <label><input name="ostatus" checked type="radio" value="3" />接单 </label>&nbsp;&nbsp;&nbsp; 
                                <label><input name="ostatus" type="radio" value="7" />拒单 </label> 
                            </div>
                        </div>
                        <div class="am-form-group">
                            <div class="am-u-sm-9 am-u-sm-push-3">
                            <button id="sub" class="m-btn am-btn-primary">提交</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(function(){
	$('#sub').click(function(){
	//验证联系电话
	   var res = /^1(3|4|5|7|8)\d{9}$/;
	   var phone = $('#dtel').val();
	   if(phone==''){
	       // layer.msg('手机号必填',{icon:2});
	       alert('手机号必填');
	       return  false;
	   }else if(!res.test(phone)){
	       // layer.msg('请输入正确的手机号码',{icon:2});
	       alert('请输入正确的手机号码');
	       return false;
	   }
	})
})

</script>
@endsection