<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Links extends Model
{
    //关联数据表
    protected $table = 'links';
    //设置主键
    protected $primaryKey = 'lid';

    protected $guarded = [];
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
