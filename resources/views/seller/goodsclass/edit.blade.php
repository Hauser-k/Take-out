@extends('layout.seller.seller')

@section('title')
    商品分类
@endsection

@section('content')
            <div class="row-content am-cf">


                <div class="row">

                    <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                        <div class="widget am-cf">
                            <div class="widget-head am-cf">
                                <div class="widget-title am-fl">菜品分类修改</div>
                                @if(session('error'))
                                    <p style="background:#f0ad4e">  {{session('error')}}</p>
                                @endif
                                <div class="widget-function am-fr">
                                    <a href="javascript:;" class="am-icon-cog"></a>
                                </div>
                            </div>
                            <div class="widget-body am-fr">

                                <form class="am-form tpl-form-line-form" action="{{url('seller/goodsclass/'.$date->gcid)}}" method="post">
                                    {{csrf_field()}}
                                    <div class="am-form-group">
                                        <label for="user-name" class="am-u-sm-3 am-form-label">菜品分类 <span class="tpl-form-line-small-title">Title</span></label>
                                        <div class="am-u-sm-9">
                                            <input type="hidden" name="_method" value="put">
                                            <input type="text" class="tpl-form-input" id="user-name" name="cname" value="{{ $date->cname }}" placeholder="请输入分类名">
                                            <small>请修改分类名6个字以内。</small>
                                        </div>
                                    </div>

                                    <div class="am-form-group">
                                        <div class="am-u-sm-9 am-u-sm-push-3">
                                            <input type="submit" value="提交" class="am-btn am-btn-primary tpl-btn-bg-color-success "/>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>



            </div>
        </div>
@endsection