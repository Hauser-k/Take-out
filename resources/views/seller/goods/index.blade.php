@extends('layout.seller.seller')

@section('title')
	美食列表
@endsection

@section('content')
<div class="widget am-cf">
    <div class="widget-head am-cf">
        <div class="widget-title am-fl">我的美食</div>
        <div class="widget-function am-fr">
            <!-- <form action="{{url('seller/eval')}}"　method="get">
                回复情况：<select name="huifu" id="">
                    <option @if(empty($request['huifu']))  selected @endif value ="">全部</option>
                   <option value="1" @if(!empty($request['huifu']) && $request['huifu'] == 1)  selected @endif>未回复</option>
                    <option value="2" @if(!empty($request['huifu']) && $request['huifu'] ==2)  selected @endif>已回复</option>
                    
                </select>
                时间：<select name="shijian" id="">
                    <option @if(empty($request['shijian']))  selected @endif value ="">全部</option>
                   <option value="1" @if(!empty($request['shijian']) && $request['shijian'] == 1)  selected @endif>一天内</option>
                    <option value="3" @if(!empty($request['shijian']) && $request['shijian'] == 3)  selected @endif>三天内</option>
                    <option value="7" @if(!empty($request['shijian']) && $request['shijian'] == 7)  selected @endif>七天内</option>
                </select>
                <input type="submit" value="查询">
            </form> -->
        </div>
    </div>
    <div class="widget-body  widget-body-lg am-fr">

        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
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
                    <td>1</td>
                    <td>{{$v->gname}}</td>
                    <td><img src="/{{$v->gpic}}" style="width:60px;height: 60px" alt=""></td>
                    <td>{{$v->cname}}</td>
                    <td>{{$v->gprice}}</td>
                    <td>{{$v->gstandard}}</td>
                    <td>{{$v->gtaste}}</td>
                    <td>{{$v->gcount}}</td>
                    <td>{{$v->gstatus}}</td>
                    <td>
                        <div class="tpl-table-black-operation">
                            <a href="{{url('/seller/goods/'.$v->gid.'/edit')}}">
                                <i class="am-icon-pencil"></i> 修改
                            </a>
                            <a href="javascript:;" onclick="Del({{$v->gid}})">
                               <i class="am-icon-pencil"></i> 删除
                            </a>
                        </div>
                    </td>
                </tr>
            @endforeach
			
            </tbody>
        </table>
        {!! $data->appends($request)->render(new \App\AmazeuiThreePresenter($data)) !!}
    </div>
</div>

<script>		
        function Del(user_id){
            //询问框
            layer.confirm('是否确认删除？', {
                btn: ['确定','取消'] //按钮
            }, function(){
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


            }, function(){

            });

        }


    </script>

@endsection