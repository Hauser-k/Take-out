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
            <span>管理员修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('admin/adminuser').'/'.$data->aid}}" method="post">
                <input type="hidden" name="_method" value="put">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                    <label class="mws-form-label">用户名</label>
                    <div class="mws-form-item">
                        <input type="text" class="small" name="aname" value="{{$data->aname}}">
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">权限</label>
                        <div class="mws-form-item">
                            <input type="radio" name="auth" @if ($data->auth==1) checked @endif value="1">普通管理
                            <input type="radio" name="auth"  @if ($data->auth==2) checked @endif  value="2">超级管理
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