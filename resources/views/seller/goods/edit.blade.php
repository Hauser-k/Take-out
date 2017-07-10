@extends('layout.seller.seller')

@section('title')
	增加美食
@endsection

@section('content')
<div class="widget am-cf">
    <div class="widget-head am-cf">
        <div class="widget-title am-fl">修改美食</div>
        <div class="widget-function am-fr">
        </div>
    </div>
    <div class="widget-body  widget-body-lg am-fr">
<form class="am-form tpl-form-line-form" method="post" id="art_form" action="{{url('/seller/goods/'.$data->gid)}}">
<input type="hidden" name="_method" value="put">
  {{csrf_field()}}
    <div class="am-form-group">
        <label for="user-name" class="am-u-sm-3 am-form-label">美食名称</label>
        <div class="am-u-sm-9">
            <input type="text" minlength="1" maxlength="12" class="tpl-form-input" id="gname" value='{{$data->gname}}' name="gname">
            <small>请填写美食名称12字以内</small>
        </div>
    </div>


    <div class="am-form-group">
        <label for="user-email" class="am-u-sm-3 am-form-label">菜品所属类</label>
        <div class="am-u-sm-9">
			<select name="gcid" id="aa">
				
                @foreach($goodsclass as $k=>$v)
                    @if($data->gcid == $v->gcid)
				        <option selected value="{{$v->gcid}}">{{$v->cname}}</option>
                    @else
                        <option value="{{$v->gcid}}">{{$v->cname}}</option>
                    @endif 
                @endforeach
			</select>
            <!-- <small>发布时间为必填</small> -->
        </div>
    </div>
    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label">单价 </label>
        <div class="am-u-sm-9">
            <input type="number" min="0.01" step="0.01" value="{{$data->gprice}}" name="gprice" id="gprice">
            <small>请输入单价,最多两位小数最大为9999</small>
        </div>
    </div>
    <div class="am-form-group">
        <label for="user-weibo" class="am-u-sm-3 am-form-label">美食图片</label>
        <div class="am-u-sm-9">
            <div class="am-form-group">
                
                    <img name="" src="/{{$data->gpic}}" id="pic" style="width:80px;height: 80px;">
                    <input type="file" name="file_upload" id="file_upload" value="">
                    <input  type="hidden" name="gpic" id="gpic" value="">
                    
                    <script type="text/javascript">
                                $(function () {
                                    $("#file_upload").change(function () {
                                        uploadImage();
                                    });
                                });
                                function uploadImage() {
//                            判断是否有选择上传文件
                                    var imgPath = $("#file_upload").val();
                                    if (imgPath == "") {
                                        alert("请选择上传图片！");
                                        return;
                                    }
                                    //判断上传文件的后缀名
                                    var strExtension = imgPath.substr(imgPath.lastIndexOf('.') + 1);
                                    if (strExtension != 'jpg' && strExtension != 'gif'
                                        && strExtension != 'png' && strExtension != 'bmp') {
                                        alert("请选择图片文件");
                                        return;
                                    }

                                    var formData = new FormData($('#art_form')[0]);

                                    $.ajax({
                                        type: "POST",
                                        url: "/seller/upload",
                                        data: formData,
                                        async: true,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
//                                    console.log(data);
                                   // alert("上传成功");
                                            $('#pic').attr('src','/'+data);
                                            $('#gpic').val(data);

                                        },
                                        error: function(XMLHttpRequest, textStatus, errorThrown) {
                                            alert("上传失败，请检查网络后重试");
                                        }
                                    });
                                }

                            </script>
                
            </div>
        </div>
	
    </div>
    
    <div class="am-form-group">
        <label for="user-weibo" class="am-u-sm-3 am-form-label">添加规格 </label>
        <div class="am-u-sm-9">
            <input type="text" id="gstandard" value="{{$data->gstandard}}" name="gstandard">
            <small>格式为: 大份,小份,</small>
            <div>
            </div>
        </div>
    </div>
	<div class="am-form-group">
        <label for="user-weibo" class="am-u-sm-3 am-form-label">添加口味 </label>
        <div class="am-u-sm-9">
            <input type="text" id="gtaste" value="{{$data->gtaste}}" name="gtaste">
            <small>格式为 :孜然,胡椒,</small>
            <div>
            </div>
        </div>
    </div>
    
    <div class="am-form-group">
        <div class="am-u-sm-9 am-u-sm-push-3">
            <button id="sub" class="am-btn am-btn-primary tpl-btn-bg-color-success">提交</button>
        </div>
    </div>
</form>
<div>
<div>
<script>
    var caidan = false;
    var danjia = false;
    var guige = false;
    var kouwei = false;
    var fenlei = false;
    $('#gname').blur(function(){
       
        
        var gname = $('#gname').val();
        if(gname==''){
            layer.msg('内容不能为空',{icon:6});
            return false;
        }else{
            $.get('/seller/gnameajax',{gname:gname},function(data){
        //     // alert(data);
                if(data.status==0){
                    layer.msg(data.msg,{icon:2});
                    return false;
                }
                if(data.status==1){
                    
                    return caidan = true;
                }
            })
        };
       
    });
    $('#gprice').blur(function(){
        var gprice = $('#gprice').val();
        if(gprice==''){
            layer.msg('内容不能为空或格式不正确',{icon:2});
            return false;
        }else{
            return danjia = true;
        }
    });
    $('#gstandard').blur(function(){
        var gstandard = $('#gstandard').val();
        if(gstandard==''){
            layer.msg('内容不能为空',{icon:2});
            return false;
        }else{
            return guige = true;
        }
    });
    $('#gtaste').blur(function(){
        var gtaste = $('#gtaste').val();
        if(gtaste==''){
            layer.msg('内容不能为空',{icon:2});
            return false;
        }else{
            return kouwei = true;
        }
    });
    //验证下拉框
    if($('#aa').val()=="0"){
        return fenlei = false;
    }else{
        return  fenlei = true;
    }
    $('#sub').click(function(){
        if(caidan == true && danjia == true && guige == true && kouwei == true && fenlei == true){
            // alert(1);
            return true;
        } else{
            layer.msg('信息未填完整',{icon:5});
            return false;
        }
    });
</script>
@endsection
