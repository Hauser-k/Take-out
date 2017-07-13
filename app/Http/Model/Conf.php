<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Conf extends Model
{
    //关联数据表
    protected $table = 'conf';
    //设置主键
    protected $primaryKey = 'conid';
    protected $guarded = [];
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
