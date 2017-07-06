@extends('layout.admin.index')

@section('content')

    @if (count($errors) > 0)
        <div class="mws-form-message error">
            <font size="5">添加失败</font>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>用户添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('admin/user')}}" method="post">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商户名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="uname" value="{{ old('uname') }}">
                        </div>
                    </div>

                    <div class="mws-form-row">
                        <label class="mws-form-label">确认密码</label>
                        <div class="mws-form-item">
                            <input type="password" class="small" name="repassword" value="{{ old('repassword') }}">
                        </div>
                    </div>
                {{ csrf_field() }}
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-danger">
                    <input type="reset" value="重置" class="btn ">
                </div>
            </form>
        </div>
    </div>
@endsection