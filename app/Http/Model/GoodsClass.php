<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class GoodsClass extends Model
{
    //关联数据表
    protected $table = 'goods_class';
    //设置主键
    protected $primaryKey = 'gcid';
    /**
     * 不可被批量赋值的属性。
     *
     * @var array
     */
    protected $guarded = [];
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
}
