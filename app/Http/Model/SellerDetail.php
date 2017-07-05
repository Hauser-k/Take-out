<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class SellerDetail extends Model
{
    //关联数据表
    protected $table = 'seller_dstail';
    //设置主键
    protected $primaryKey = 'sdid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
