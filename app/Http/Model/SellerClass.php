<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class SellerClass extends Model
{
    //关联数据表
    protected $table = 'seller_class';
    //设置主键
    protected $primaryKey = 'csid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
