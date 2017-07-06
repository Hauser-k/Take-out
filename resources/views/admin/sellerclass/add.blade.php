@extends('layout.admin.index')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">
            <span>分类添加</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('/admin/sellerclass')}}" method="post">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label"> 商家分类</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="uname" value="">
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