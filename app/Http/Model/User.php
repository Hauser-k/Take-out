<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    //关联数据表
    protected $table = 'user';
    //设置主键
    protected $primaryKey = 'uid';
    //指定是否模型应该被戳记时间。
    public $timestamps = false;
    public function evals()
	{
	    return $this->belongsTo('App\Http\Model\evals','sid','uid');
	}
}
