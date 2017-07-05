<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Collection extends Model
{
    //关联数据表
    protected $table = 'colllection';
    //设置主键
    protected $primaryKey = 'coid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
