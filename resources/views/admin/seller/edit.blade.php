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
            <span>商家修改</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('admin/seller').'/'.$data->sid}}" method="post">
                <input type="hidden" name="_method" value="put">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商家名</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="sname" value="{{$data->sname}}">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-list">
                            <input type="radio" name="status" @if($data->status==1) checked @endif value="1">待审核
                            <input type="radio" name="status" @if($data->status==2) checked @endif value="2">审核通过
                            <input type="radio" name="status" @if($data->status==3) checked @endif value="3">审核未通过
                        </div>

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