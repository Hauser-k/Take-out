<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>找回密码</title>
    <!-- <meta name="description" content="这是一个 index 页面"> -->
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />

    <link rel="icon" type="image/png" href="{{asset('assets/i/favicon.png')}}">
    <link rel="apple-touch-icon-precomposed" href="{{asset('assets/i/app-icon72x72@2x.png')}}">
    <!-- <meta name="apple-mobile-web-app-title" content="Amaze UI" /> -->
    <link rel="stylesheet" href="{{asset('assets/css/amazeui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/amazeui.datatables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('assets/css/app.css')}}">
    <script src="{{asset('assets/js/jquery.min.js')}}"></script>
	<style>
		ul,li{
			margin:0px;
			padding:0px;
			list-style:none;
		}
		li{
			float:left;
			background:#ccc;
			width:45px;
			height:20px;
			margin-right:5px;
			text-align: center;
			line-height: 20px;
			font-size: 12px;
			color:#666;
		}
		span{
			font-size: 12px;
			color:#666;
		}
	</style>
</head>

<body data-type="login">
    <script src="{{asset('assets/js/theme.js')}}"></script>
    <div class="am-g tpl-g">
        <!-- 风格切换 -->
        <div class="tpl-skiner">
            <div class="tpl-skiner-toggle am-icon-cog">
            </div>
            <div class="tpl-skiner-content">
                <div class="tpl-skiner-content-title">
                    选择主题
                </div>
                <div class="tpl-skiner-content-bar">
                    <span class="skiner-color skiner-white" data-color="theme-white"></span>
                    <span class="skiner-color skiner-black" data-color="theme-black"></span>
                </div>
            </div>
        </div>

        <div class="tpl-login">
            <div class="tpl-login-content">
            <div class="am-btn-block tpl-btn-bg-color-success" style="width:100px">重置密码</div>
                     @if (count($errors) > 0)
	                    <div class="mark" style="color:red">
	                        <ul>
	                            @if(is_object($errors))
	                                @foreach ($errors->all() as $error)
	                                <ol><center>{{ $error }}</center></ol>
	                                @endforeach
	                            @else
	                                <ol><center>{{ $errors }}</enter></ol>
	                            @endif
	                        </ul>
	                    </div>
	                @endif
                <form class="am-form tpl-form-line-form" method="post" action="{{url('/seller/dosreset')}}" id="myform">  
                {{csrf_field()}}
                <input type="hidden" value="{{$user->sid}}" name="sid">
                	<div class="am-form-group">
                        <input type="text" class="tpl-form-input" id="" name="" value="{{$user->sname}}" disabled="disabled">
                    </div>
                    <div class="am-form-group">
                        <input type="password" class="tpl-form-input" id="spwd" name="spwd" value="" placeholder="请输入您的密码6-18位"><span></span><br>
                        <ul>
							<li>弱</li>
							<li>中</li>
							<li>强</li>
							
						</ul>
                    </div>
                    <div class="am-form-group">
                        <input type="password" class="tpl-form-input" id="respwd" name="respwd" value="" placeholder="请再次输入您的密码"><span></span>
                    </div>
                    <div class="am-form-group">
                         <input type="submit"  class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn" value="提交">

                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="{{asset('assets/js/amazeui.min.js')}}"></script>
    <script src="{{asset('assets/js/app.js')}}"></script>
    <script src="{{asset('assets/js/denglutijiao.js')}}"></script>
    <script type="text/javascript">
        function re_captcha() {
            $asset = "{{ asset('/code/captcha') }}";
            $asset = $asset + "/" + Math.random();
            document.getElementById('127ddf0de5a04167a9e427d883690ff6').src = $asset;
        }
    </script>
<script>
	
	var span = document.getElementsByTagName('span');
	var li = document.getElementsByTagName('li');
	var s1 = s2 = null;
	$('#spwd').keyup(function(){
	var arr = [];
	// 1.获取输入的值
	var val = this.value;
	var preg1 = /[0-9]+/g;
	var preg2 = /[a-z]+/g;
	var preg3 = /[A-Z]+/g;
	var preg4 = /[\W_]+/g;
	if(preg1.test(val)){
		arr.push('数字');
	}
	if(preg2.test(val)){
		arr.push('小写字母');
	}
	if(preg3.test(val)){
		arr.push('大写字母');
	}
	if(preg4.test(val)){
		arr.push('特殊字符');
	}

	// 1.所有的li标签都变成灰色
	for(var i = 0;i<li.length;i++){
		li[i].style.background = '';
	}
	// 2.然后让指定的li标签变色
	switch(arr.length){
		case 1:
			li[0].style.background = 'red';
			break;
		case 2:
			li[1].style.background = 'green';
			break;
		case 3:
			li[2].style.background = 'yellowgreen';
			break;
		case 4:
			li[3].style.background = 'green';
			break;
	}

})
	//检测密码长度
	spwd.onblur = function(){
		if(spwd.value.length >= 6 && spwd.value.length<=18){
			span[3].innerHTML = '<font color="green">恭喜密码可用</font>';
			s1 = true;
			return s1;
		}else{

		span[3].innerHTML = '<font color="red">密码长度不符要求</font>';
			s1 = false;
			return s1;
		}
	}
	
	$('#myform').submit(function(){
		if($('#spwd').val() != $('#respwd').val()){
			return false;
		}
		if(s1 ){
			return true;
		}
		return false;
	}) 

</script>
</body>

</html>