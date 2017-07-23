@extends('layout.admin.index')

@section('content')
    <div class="mws-panel grid_8">
        <div class="mws-panel-header">         
            <!-- <span>修改密码</span>  -->
         @if (count($errors) > 0)
            <div class="mark" style="color:red">
                <ul>
                    @if(is_object($errors))
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    @else
                        <li>{{ $errors }}</li>
                    @endif
                </ul>
            </div>
        @endif
        </div>

        <div class="mws-panel-body no-padding">
              <form class="mws-form" action="{{url('admin/update').'/'.$data->aid}}" method="post">
                <input type="hidden" name="_method" value="put">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">旧密码</label>
                        <div class="mws-form-item">
                            <input type="password"   name="password" style="width:250px">
                            <span>请输入原始密码</span>
                        </div>
                        <label class="mws-form-label">新密码</label>
                        <div class="mws-form-item">
                            <input type="password"  name="apwd" value="" style="width:250px">
                            <span>
                                新密码6-20位
                            </span>
                        </div>
                        <label class="mws-form-label">确认密码</label>
                        <div class="mws-form-item">
                            <input type="password"  name="apassword"  style="width:250px">
                            <span>请再次输入新密码</span>
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