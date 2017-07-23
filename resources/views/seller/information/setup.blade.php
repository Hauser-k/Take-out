@extends('layout.seller.seller')

@section('title')
    账号设置
@endsection

@section('content')
    <div class="widget am-cf">
        <div class="widget-head am-cf">
            <div class="widget-title am-fl">账号设置</div>
            <div class="widget-function am-fr">
            </div>
        </div>
        <div class="widget-body  widget-body-lg am-fr">
            <form class="am-form tpl-form-line-form" method="post" id="art_form" action="{{url('/seller/setup/'.$data->sid)}}">
                <input type="hidden" name="_method" value="put">
                {{csrf_field()}}
                <div class="am-form-group">
                    <label for="user-name" class="am-u-sm-3 am-form-label">店铺名称</label>
                    <div class="am-u-sm-9">
                        <input type="text" minlength="1" maxlength="12" class="tpl-form-input" id="exname" value='{{ $data->exname }}' name="exname">
                        <small>请填写店铺名称12字以内</small>
                    </div>
                </div>

                <div class="am-form-group">
                    <label for="user-phone" class="am-u-sm-3 am-form-label">商家类别
                        <span class="tpl-form-line-small-title">Class</span>
                    </label>
                    <div class="am-u-sm-9" >
                        <select data-am-selected="{searchBox: 1}" style="display: none;" name="csid" id="csid">
                            @foreach($sellerclass as $k=>$v)
                                @if($data->csid == $v->csid)
                                    <option selected value="{{$v->csid}}">{{$v->csname}}</option>
                                @else
                                    <option value="{{$v->csid}}">{{$v->csname}}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="am-form-group">
                    <label class="am-u-sm-3 am-form-label">联系人</label>
                    <div class="am-u-sm-9">
                        <input type="text" value="{{ $data->contacts }}" name="contacts" id="contacts">
                        <small>请输入联系人姓名，六个字以内</small>
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-weibo" class="am-u-sm-3 am-form-label">商家logo</label>
                    <div class="am-u-sm-9">
                        <div class="am-form-group">
                            <img name="" src="{{url('/uploads')}}/{{ $data->slogo }}" id="pic" style="width:150px;">
                            <input type="file" name="file_upload" id="file_upload" value="">
                            <input  type="hidden" name="slogo" id="slogo" value="{{ $data->slogo }}">
                            <script type="text/javascript">
                                $(function () {
                                    $("#file_upload").change(function () {
                                        uploadImage1();
                                    });
                                });
                                function uploadImage1() {
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
                                        url: "/seller/setupajax",
                                        data: formData,
                                        async: true,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
//                                    console.log(data);
                                            // alert("上传成功");
                                            $('#pic').attr('src','/uploads/'+data);
                                            $('#slogo').val(data);
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
                    <label for="user-weibo" class="am-u-sm-3 am-form-label">门店图片</label>
                    <div class="am-u-sm-9">
                        <div class="am-form-group">
                            <img name="" src="/uploads/{{ $data->eximage }}" id="pic1" style="width:150px;">
                            <input type="file" name="file_upload1" id="file_upload1" value="">
                            <input  type="hidden" name="eximage" id="eximage" value="{{ $data->eximage }}">
                            <script type="text/javascript">
                                $(function () {
                                    $("#file_upload1").change(function () {
                                        uploadImage();
                                    });
                                });
                                function uploadImage() {
//                            判断是否有选择上传文件
                                    var imgPath = $("#file_upload1").val();
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
                                        url: "/seller/eximageajax",
                                        data: formData,
                                        async: true,
                                        cache: false,
                                        contentType: false,
                                        processData: false,
                                        success: function(data) {
//                                    console.log(data);
                                            // alert("上传成功");
                                            $('#pic1').attr('src','/uploads/'+data);
                                            $('#eximage').val(data);
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
                    <label for="user-weibo" class="am-u-sm-3 am-form-label">营业执照</label>
                    <div class="am-u-sm-9">
                        <div class="am-form-group">
                            <img name="" src="/uploads/{{ $data->licence1 }}" id="pic" style="width:150px;">
                        </div>
                    </div>
                </div>
                <div class="am-form-group">
                    <label for="user-weibo" class="am-u-sm-3 am-form-label">餐饮服务许可</label>
                    <div class="am-u-sm-9">
                        <div class="am-form-group">
                            <img name="" src="/uploads/{{ $data->licence2 }}" id="pic" style="width:150px;">
                        </div>
                    </div>
                </div>

                <div class="am-form-group">
                    <label class="am-u-sm-3 am-form-label">门店区域</label>
                    <div class="am-u-sm-9">
                        <input disabled type="text" value="{{$data->exarea}}" name="exarea" id="exarea">
                        <small></small>
                    </div>
                </div>
                <div class="am-form-group">
                    <label class="am-u-sm-3 am-form-label">门店地址</label>
                    <div class="am-u-sm-9">
                        <input disabled type="text" value="{{$data->exaddr}}" name="exaddr" id="exaddr">
                        <small></small>
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
                        var exname = true;
                        var contacts = true;
                        $('#exname').blur(function(){
//alert(1111111);
                            var exname = $('#exname').val();
                            if(exname==''){
                                layer.msg('内容不能为空',{icon:6});
                                return false;
                            }else{
                                $.get('/seller/exnameajax',{exname:exname},function(data){
//                                  alert(data);
                                    if(data.status==0){
                                        layer.msg(data.msg,{icon:2});
                                        return exname =  false;
                                    }
                                    if(data.status==1){

                                        return exname = true;
                                    }
                                })
                            };
                        });
                        $('#contacts').blur(function(){
                            var contacts = $('#contacts').val();
                            if(contacts==''){
                                layer.msg('内容不能为空或格式不正确',{icon:2});
                                return contacts =  false;
                            }else{
                                return contacts = true;
                            }
                        });
                        $('#sub').click(function(){
                            if(exname == true && contacts == true){
//                                alert(1);
                                return true;
                            } else{
                                layer.msg('信息未填完整',{icon:5});
                                return false;
                            }
                        });
                    </script>
@endsection
