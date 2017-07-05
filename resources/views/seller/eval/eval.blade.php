@extends('layout.seller.seller')

@section('title')
	我的评价
@endsection

@section('content')
<div class="widget am-cf">
    <div class="widget-head am-cf">
        <div class="widget-title am-fl">斑马线</div>
        <div class="widget-function am-fr">
            <a href="javascript:;" class="am-icon-cog"></a>
        </div>
    </div>
    <div class="widget-body  widget-body-lg am-fr">

        <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black " id="example-r">
            <thead>
                <tr>
                    <th>文章标题</th>
                    <th>作者</th>
                    <th>时间</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <tr class="gradeX">
                    <td>Amaze UI 模式窗口</td>
                    <td>张鹏飞</td>
                    <td>2016-09-26</td>
                    <td>
                        <div class="tpl-table-black-operation">
                            <a href="javascript:;">
                                <i class="am-icon-pencil"></i> 编辑
                            </a>
                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                <i class="am-icon-trash"></i> 删除
                            </a>
                        </div>
                    </td>
                </tr>
                <!-- more data -->
            </tbody>
        </table>

    </div>
</div>
@endsection