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
            <span>商家详情</span>
        </div>
        <div class="mws-panel-body no-padding">
            <form class="mws-form" action="{{url('admin/user')}}" method="post">
                <div class="mws-form-inline">
                    <div class="mws-form-row">
                        <label class="mws-form-label">商家名:</label>
                        <div class="mws-form-item">
                            <p class="small" name="exname" >{{ $data->exname}}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">联系人:</label>
                        <div class="mws-form-item">
                            <p class="small" name="contacts" >{{$data->contacts}}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">外卖电话:</label>
                        <div class="mws-form-item">
                            <p class="small" name="extel" >{{$data->extel}}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">商家类别:</label>
                        <div class="mws-form-item">
                            <p class="small" name="csid" >{{$data->csid}}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">门店地址:</label>
                        <div class="mws-form-item">
                            <p class="small" name="exaddr" >{{$data->exaddr}}</p>
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">门店图片:</label>
                        <div class="mws-form-item">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">营业执照:</label>
                        <div class="mws-form-item">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">餐饮许可:</label>
                        <div class="mws-form-item">
                            <img src="" alt="">
                        </div>
                    </div>
                    <div class="mws-form-row">
                        <label class="mws-form-label">门店区域:</label>
                        <div class="mws-form-item">
                            <p class="small" name="exarea" >{{$data->exarea}}</p>
                        </div>
                    </div>
                </div>
                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection