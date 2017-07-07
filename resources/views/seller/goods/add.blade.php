@extends('layout.seller.seller')

@section('title')
	增加美食
@endsection

@section('content')
<form class="am-form tpl-form-line-form" method="post" id="art_form" action="/seller/goods">
  {{csrf_field()}}
    <div class="am-form-group">
        <label for="user-name" class="am-u-sm-3 am-form-label">美食名称</label>
        <div class="am-u-sm-9">
            <input type="text" minlength="6" maxlength="12" class="tpl-form-input" id="gname" placeholder="请输入美食名称" name="gname">
            <small>请填写美食名称必须是汉字</small>
        </div>
    </div>


    <div class="am-form-group">
        <label for="user-email" class="am-u-sm-3 am-form-label">菜品所属类</label>
        <div class="am-u-sm-9">
			<select name="gcid">
				<option value="" selected disabled="">请选择</option>
                @foreach($data as $k=>$v)
				    <option value="{{$v->gcid}}" >{{$v->cname}}</option>
                @endforeach
			</select>
            <!-- <small>发布时间为必填</small> -->
        </div>
    </div>
    <div class="am-form-group">
        <label class="am-u-sm-3 am-form-label">单价 </label>
        <div class="am-u-sm-9">
            <input type="number" min="0.01" step="0.01" placeholder="输入单价" name="gprice" id="gprice">
            <small>请输入单价,最多两位小数</small>
        </div>
    </div>
    <div class="am-form-group">
        <label for="user-weibo" class="am-u-sm-3 am-form-label">美食图片</label>
        <div class="am-u-sm-9">
            <div class="am-form-group">
                
                    <img name="" id="pic" style="width:80px;height: 80px;display:none;">
                    <input type="file" name="file_upload" id="file_upload" value="">
                    <input type="hidden" name="gpic" id="gpic" >
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
                                   alert("上传成功");
                                            $('#pic').attr('src','/'+data);
                                            $('#pic').show();
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
    <div> <img src="" alt="" name="gpic" id="gpic" style="width:100px;display:none;" ></div>
    <div class="am-form-group">
        <label for="user-weibo" class="am-u-sm-3 am-form-label">添加规格 </label>
        <div class="am-u-sm-9">
            <input type="text" id="gstandard" placeholder="格式为: 大份,小份," name="gstandard">
            <small>格式为: 大份,小份,</small>
            <div>
            </div>
        </div>
    </div>
	<div class="am-form-group">
        <label for="user-weibo" class="am-u-sm-3 am-form-label">添加口味 </label>
        <div class="am-u-sm-9">
            <input type="text" id="gtaste" placeholder="格式为: 孜然,胡椒," name="gtaste">
            <small>格式为 :孜然,胡椒,</small>
            <div>
            </div>
        </div>
    </div>
    
    <div class="am-form-group">
        <div class="am-u-sm-9 am-u-sm-push-3">
            <button type="button" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
        </div>
    </div>
</form>
<script>
    var caimin = false;
    var danjian = false;
    var guige = false;
    var kouwei = false;
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
                    layer.msg(data.msg,{icon:1});
                    caidan = true;
                }
            })
        };
       
    });
    $('#gstandard,#gtaste,#gprice').blur(function(){
        var res = /(.+?,)+/;
        var gstandard = $('#gstandard').val();
        var gstandard = $('#gtaste').val();
        if(gstandard=='' || gstandard==''|| gprice==''){
            layer.msg('内容不能为空',{icon:6});
            return false;
        }
    });
</script>
@endsection
