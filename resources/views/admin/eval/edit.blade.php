@extends('layout.admin.index')

@section('title')
留言详情
@endsection

@section('css')
<link rel="stylesheet" href="/admin/css/page.css" type="text/css">
@endsection

@section('content')

<div class="mws-panel grid_8">
                  <div class="mws-panel-header">
                      <span>留言详情</span>
                    </div>
                    <div class="mws-panel-body no-padding">
                      <form class="mws-form" action="form_layouts.html">
                        <div class="mws-form-inline">
                          <div class="mws-form-row">
                            <label class="mws-form-label">订单号</label>
                            <div class="mws-form-item">
                              <input type="text" class="small" value="{{$data->order}}" readonly>
                            </div>
                          </div>
                          
                          <div class="mws-form-row">
                            <label class="mws-form-label">评价内容</label>
                            <div class="mws-form-item">
                              <textarea readonly rows="" cols="" class="large">{{$data->econtent}}</textarea>
                            </div>
                         
                            </div>
                            <div class="mws-form-row">
                            <label class="mws-form-label">回复内容</label>
                            <div class="mws-form-item">
                              <textarea readonly rows="" cols="" class="large">{{$data->ereply}}</textarea>
                            </div>
                         
                            </div>
                            <div><button class="btn btn-primary"><a href="{{url('admin/eval')}}">返回</a></button></div>
                          </div>
                      </form>
                    </div>      
                </div>

@endsection