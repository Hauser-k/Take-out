@extends('layout.admin.index')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">         
            <span>分类添加</span>
        </div>

        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('/admin/sellerclass/'.$data->csid)}}" method="post">
                <input type="hidden" name="_method" value="put">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">修改商家分类</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="csname" value="{{$data->csname}}" style="width:250px">
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