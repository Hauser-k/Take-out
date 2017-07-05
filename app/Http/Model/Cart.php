<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    //关联数据表
    protected $table = 'cart';
    //设置主键
    protected $primaryKey = 'cid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
