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
            <form class="mws-form" action="{{url('admin/examine').'/'.$data->sid}}" method="post">
                <input type="hidden" name="_method" value="put">
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
                    <div class="mws-form-row">
                        <label class="mws-form-label">状态</label>
                        <div class="mws-form-list">
                            <input type="radio" name="status" @if($all->status==1) checked @endif value="1">待审核
                            <input type="radio" name="status" @if($all->status==2) checked @endif value="2">审核通过
                            <input type="radio" name="status" @if($all->status==3) checked @endif value="3">审核未通过
                            <input type="radio" name="status" @if($all->status==4) checked @endif value="4">歇业
                            <input type="radio" name="status" @if($all->status==5) checked @endif value="5">商家资料未提交
                        </div>
                    </div>
                </div>
                <div class="mws-button-row">
                    <input type="submit" value="审核" class="btn btn-danger">
                    <input type="reset" value="重置" class="btn ">
                </div>

                {{ csrf_field() }}
            </form>
        </div>
    </div>
@endsection