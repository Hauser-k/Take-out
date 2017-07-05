<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Addr extends Model
{
    //关联数据表
    protected $table = 'addr';
    //设置主键
    protected $primaryKey = 'did';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;

}
