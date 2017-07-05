<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{
    //关联数据表
    protected $table = 'admin';
    //设置主键
    protected $primaryKey = 'aid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
