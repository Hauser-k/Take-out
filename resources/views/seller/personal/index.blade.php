@extends('layout.seller.seller')
@section('title')
	个人中心
@endsection

@section('content')

	<div class="widget am-cf">
        <div class="widget-head am-cf">
            <div class="widget-title am-fl">个人中心</div>
            <div class="widget-function am-fr">
            </div>
        </div>
	
        <div class="widget-body  widget-body-lg am-fr">
        <form action="" method="post" id="art_form">
	 	{{csrf_field()}}
			    <div class="am-form-group">
			        <div class="am-u-sm-9">
			            <div class="am-form-group">
			                	<div style="width:165px;float: left;margin-top: 35px"><label style="width: 70px" for="user-name" class="am-u-sm-3 am-form-label">头　像:</label></div>
			                    <div style="float:left"><img name="" src="/uploads/{{$pic}}" id="pic" style="width:80px;height: 80px;"></div>
			                    <div style="float:left;margin-left: 95px;margin-top: 35px"><input type="file" name="file_upload" id="file_upload" value=""></div><br><br>
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
			                                url: "/seller/face",
			                                data: formData,
			                                async: true,
			                                cache: false,
			                                contentType: false,
			                                processData: false,
			                                success: function(data) {
			//                                    console.log(data);
			                           		
			                                    $('#pic').attr('src','/uploads/'+data);
			                                    $('#gpic').val(data);
			                                    alert("修改成功");

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
			    </form>
                <div class="am-form-group">
                    <div class="am-u-sm-9">
                    	<label for="user-name" class="am-u-sm-3 am-form-label">账　号:</label>
                    	<input type="text" value="{{$data[0]['sname']}}" readonly style='border-left:0px;border-top:0px;border-right:0px;border-bottom:1px'>
                    </div>
                </div><br><br>
                <div class="am-form-group">
                    <div class="am-u-sm-9">
                   		<label for="user-name" class="am-u-sm-3 am-form-label">密　码:</label>
                   		<input type="" value="*********" disabled="disabled" style='border: none;'> 
                        <a href="{{ url('seller/personal/'.$data[0]['sid'].'/edit') }}" style="cursor:pointer;font-style:italic;">点击修改</a>
                    </div>
                </div><br><br>
				 <div class="am-form-group">
                    <div class="am-u-sm-9">
                   		<label for="user-name" class="am-u-sm-3 am-form-label">手机号:</label>
                   		<input type="" class="spa" name="" minlength="11" maxlength="11" value="{{$data[0]['stel']}}" disabled="disabled" style='border: none;'> 
                        <i class="ia" style="cursor:pointer">点击修改</i>
                    </div>
                </div><br><br>
                <div class="am-form-group">
                    <div class="am-u-sm-9">
                    	<label for="user-name" class="am-u-sm-3 am-form-label">邮　箱:</label>
                    	<input type="" class="spa" name="" value="{{$data[0]['semail']}}" disabled="disabled" style='border: none;'> 
                        <i class="ia" style="cursor:pointer">点击修改</i>
                    </div>
                </div>
   	
        <div>
    
	<div>

<script type="text/javascript">
$(function(){

	$('.ia').click(function(){
		l = $('.ia').index(this);
		txt = $('.spa').eq(l).val(); 
		
		//获取焦点 去掉只读 加上边框
		$('.spa').eq(l).removeAttr("disabled"); 
		$('.spa').eq(l).css("border",'10px');
		$('.spa').eq(l).trigger("focus");
		
		$(this).css('display','none');
	})
		//文本框失去焦点后提交内容，重新变为文本 
		$('.spa').blur(function() {
			
			$(this).attr("disabled","disabled"); 
			$(this).css("border",'none')
			$('.ia').css('display','inline'); 
			var newtxt = $(this).val();

			//手机号正则
			var tel = /^1(3|4|5|7|8)\d{9}$/;
			//验证邮箱正则
			var res = /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(.[a-zA-Z0-9_-])+/;

			
			//验证手机号
			if(tel.test(newtxt)){
				aa(newtxt,'tel');
                return;
            }
            //验证邮箱 
			if(res.test(newtxt)){
               aa(newtxt, 'email');
               return; 
            }
            if(!tel.test(newtxt) || !res.test(newtxt)){
            	layer.alert('您输入的信息格式不正确');
            	$('.spa').eq(l).val(txt);
            	
            }


		});

	
	function aa(msg,type){
		$.get('/seller/updateper',{msg:msg,type:type},function(data){
       		// console.log(data);
       		if(data.status == 500) return ;
       		layer.alert(data.msg);
       		if(!data.status){
       			var l = $('.ia').index(this);
       			var txt = $('.spa').eq(l).val(); 
    			$('.spa').eq(l).val(txt);
       		}
       }, 'json')	
	}

})

</script>

@endsection