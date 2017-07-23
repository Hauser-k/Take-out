@extends('layout.home.home')
@section('content')

@section('cssstyle')
    <style>
        .ul_1,.li_1{
            margin:0px;
            padding:0px;
            list-style:none;
        }
        .li_1{
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
@endsection
@section('content')
                @if (count($errors) > 0)
                    <div class="mark" style="color:red">
                        <ul>
                            @if(is_object($errors))
                                @foreach ($errors->all() as $error)
                                    <li><center>{{ $error }}</center></li>
                                @endforeach
                            @else
                                <li><center>{{ $errors }}</enter></li>
                            @endif
                        </ul>
                    </div>
                @endif
                <form class="am-form tpl-form-line-form" id="myform" method="post" action="{{url('/home/mynumber/'.$data->uid)}}">
                    {{csrf_field()}}
                    <input type="hidden" name="_method" value="put">
                    <div class="am-form-group">
                        <label for="user-name" class="am-u-sm-3 am-form-label">账号</label>
                        <div class="am-u-sm-9">
                            <input type="text" style="width:200px;border: none;" disabled readonly value="{{$data->uname}}" class="tpl-form-input" id="user-name">
                            <input type="hidden" class="hid" value="{{$data->uid}}" name="sid">

                        </div>
                    </div>
                    <div class="am-form-group">
                        <label class="am-u-sm-3 am-form-label">原密码</label>
                        <div class="am-u-sm-9">
                            <input type="password" style="width:200px" class="yupwd" name="yupwd" value=""	placeholder="请输入您的原密码"><span></span><br>
                        </div>
                    </div>
                    <div class="am-form-group">
                        <label class="am-u-sm-3 am-form-label">新密码</label>
                        <div class="am-u-sm-9">
                            <input type="password" style="width:200px" id="newspwd" name="newspwd" value=""	placeholder="请输入您的密码6-18位"><span></span>
                        </div>
                        <span class="am-u-sm-9" >
                            <ul class="ul_1" style="margin:10px 0px 0px 600px;height:30px">
                                <li class="li_1">弱</li>
                                <li class="li_1">中</li>
                                <li class="li_1">强</li>

                            </ul>
                        </span>
                    </div>


                    <div class="am-form-group" style="heigit:40px">
                        <label class="am-u-sm-3 am-form-label">确认密码</label>
                        <div class="am-u-sm-9">
                            <input type="password" style="width:200px" name="respwd" id="respwd" value=""	placeholder="请再次输入您的新密码"><span class="spa"></span><br>
                        </div>
                    </div>

                    <div class="am-form-group">
                        <div class="am-u-sm-9 am-u-sm-push-3">
                            <button id="sub" class="am-btn am-btn-primary tpl-btn-bg-color-success">提交</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script>

        var span = document.getElementsByClassName('spa');
        var li = document.getElementsByClassName('li_1');
        var newspwd = document.getElementById('newspwd');
        var yupwd = document.getElementById('yupwd');
        var s1 = s2 = s3 = null;
        //验证原密码
        $('.yupwd').blur(function(){
            var inp = $('.yupwd').val();
            var hid = $('.hid').val();
            $.get('/home/pwd',{inp:inp,hid:hid},function(data){
                // layer.alert(data.msg);
                $('.spa').html('<font color="red">'+data.msg+'</font>');
                if(data.status == 0){
                    s3 = false;return;
                }else{
                    s3 = true;return;
                }

            })

        })
        //验证新密码
        $('#newspwd').keyup(function(){
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
        $('#newspwd').blur(function(){
            if($('#newspwd').val().length >= 6 && $('#newspwd').val().length <=18){
                $('.spa').html('<font color="green">恭喜密码可用</font>') ;
                s1 = true;
                return s1;
            }else{
                $('.spa').html('<font color="red">密码长度不符要求</font>');
                s1 = false;
                return s1;
            }
        })

        $('#myform').submit(function(){
            if($('#newspwd').val() != $('#respwd').val()){
                $('.spa').html('<font color="red">确认密码与新密码不一致</font>');
                return false;
            }
            if(s1==true && s3==true){
                return true;
            }
            return false;
        })

    </script>

@endsection