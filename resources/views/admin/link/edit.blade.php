@extends('layout.admin.index')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">         
            <span>分类添加</span>
        </div>

        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('/admin/link/'.$data->lid)}}" method="post">
                <input type="hidden" name="_method" value="put">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">修改链接名称</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="lname" value="{{$data->lname}}" style="width:250px">
                        </div>
                    </div>

                     <div class="mws-form-row">
                        <label class="mws-form-label">修改链接路由</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="lurl" value="{{$data->lurl}}" style="width:250px">
                        </div>
                    </div>
                   
                {{ csrf_field() }}
                <div class="mws-button-row">
                    <input type="submit" value="提交" class="btn btn-danger">
                </div>
            </form>
        </div>
    </div> 
@endsection