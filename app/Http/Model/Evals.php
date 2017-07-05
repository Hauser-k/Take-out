<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Evals extends Model
{
    //关联数据表
    protected $table = 'eval';
    //设置主键
    protected $primaryKey = 'eid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
