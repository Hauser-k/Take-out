<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class OrderDist extends Model
{
    //关联数据表
    protected $table = 'order_dist';
    //设置主键
    protected $primaryKey = 'odid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
