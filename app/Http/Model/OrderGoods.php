<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class OrderGoods extends Model
{
    //关联数据表
    protected $table = 'order_goods';
    //设置主键
    protected $primaryKey = 'ogid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
