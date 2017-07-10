@extends('layout.seller.seller')

@section('title')
    美食列表
@endsection

@section('content')
    <div class="row-content am-cf">
    <div class="row">
        <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
            <div class="widget am-cf">
                <div class="widget-head am-cf">
                    <div class="widget-title  am-cf">我的菜单</div>
                </div>
                <div class="widget-body  am-fr">

                    <div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                        <div class="am-form-group">
                            <div class="am-btn-toolbar">
                                <div class="am-btn-group am-btn-group-xs">
                                   <a href="{{ url('seller/goods/create') }}" type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <form action="{{url('seller/goods')}}"　method="get">
                   
                            菜类：<input type="text" value="" name="fenleiming" placeholder="请输入分类名">
                            状态：<select name="gstatus"  id="">
                                <option @if(empty($request['gstatus']))  selected @endif value ="">全部</option>
                               <option value="1" @if(!empty($request['gstatus']) && $request['gstatus'] == 1)  selected @endif>在售</option>
                                <option value="2" @if(!empty($request['gstatus']) && $request['gstatus'] ==2)  selected @endif>售罄</option>
                              </select>
                            <!-- <input type="text" class="am-form-field">
                            <span class="am-input-group-btn"> -->
                        <button class="am-btn-success" type="submit" style="height: 25px">查询</button>
                        </span>
                        
                   
                    </form>

                    <div class="am-u-sm-12">
                        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black ">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>菜名</th>
                                    <th>美图</th>
                                    <th>菜名所属类</th>
                                    <th>单价</th>
                                    <th>规格</th>
                                    <th>口味</th>
                                    <th>销量</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($data as $k=>$v)  
                                <tr class="gradeX">
                                    
                                    <td class="am-text-middle">{{$k+1}}</td>
                                    <td class="am-text-middle">{{$v->gname}}</td>
                                    <td class="am-text-middle"><img src="/{{$v->gpic}}" style="width:60px;height: 60px" alt=""></td>
                                    <td class="am-text-middle">{{$v->cname}}</td>
                                    <td class="am-text-middle">{{$v->gprice}}</td>
                                    <td class="am-text-middle">{{$v->gstandard}}</td>
                                    <td class="am-text-middle">{{$v->gtaste}}</td>
                                    <td class="am-text-middle">{{$v->gcount}}</td>
                                    <td class="am-text-middle">
                                        @if($v->gstatus == 1) 
                                            <button id="btn" onclick="zaishou({{$v->gid}})" class="tpl-table-black-operation">在售</button>
                                        @else
                                            <button onclick="shouqing({{$v->gid}})" class="tpl-table-black-operation">售罄</button>
                                        @endif
                                    </td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="{{url('/seller/goods/'.$v->gid.'/edit')}}">
                                                <i class="am-icon-pencil"></i> 修改
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del" onclick="Del({{$v->gid}})">
                                               <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
            
                                <!-- more data -->
                            </tbody>
                        </table>
                         {!! $data->appends($request)->render(new \App\AmazeuiThreePresenter($data)) !!}
                    </div>
            </div>
        </div>
    </div>
</div>
<script>
   function Del(user_id){
            //询问框
        layer.confirm('是否确认删除？', {
            btn: ['确定','取消'] //按钮
        }, function()   {
            //           url ==> admin/user/{user}   http://project182.com/admin/user/2
                $.post("{{url('seller/goods/')}}/"+user_id,{'_method':'DELETE','_token':"{{csrf_token()}}"},function(data){
                    if(data.status == 0){
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    }else{
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 5});
                    }
                });
            }, function(){});
    }
    //更改状态为 售罄
    function zaishou(user_id){
            //询问框
        layer.confirm('是否更改状态为售罄？', {
            btn: ['确定','取消'] //按钮
        }, function()   {
                $.get("{{url('/seller/zaishou/')}}",{gid:user_id,status:2},function(data){
                    if(data.status == 0){
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    }else{
                        // location.href = location.href;
                        layer.msg(data.msg, {icon: 5});
                    }
                });
            }, function(){});
    }
    function shouqing(user_id){
            //询问框
        layer.confirm('是否更改状态为在售？', {
            btn: ['确定','取消'] //按钮
        }, function()   {
                $.get("{{url('/seller/zaishou/')}}",{gid:user_id,status:1},function(data){
                    if(data.status == 0){
                        location.href = location.href;
                        layer.msg(data.msg, {icon: 6});
                    }else{
                        // location.href = location.href;
                        layer.msg(data.msg, {icon: 5});
                    }
                });
            }, function(){});
    }
    
</script>
@endsection