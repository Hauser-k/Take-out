@extends('layout.admin.index')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">         
            <span>分类添加</span>
        </div>

        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('/admin/link')}}" method="post">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">链接名称</label>
                        <div class="mws-form-item">
                            <input type="text"  class="small" name="lname" style="width:250px">
                        </div>
                        <label class="mws-form-label">Url</label>
                        <div class="mws-form-item">
                            <input type="text" class="small" name="lurl" value="http://" style="width:500px">
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