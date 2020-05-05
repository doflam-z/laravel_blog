<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /*用户表模块*/
    //关联user数据表
    protected $table='users';
    //定义禁止操作时间
    public $timestamps=false;
    //设置允许写入的字段
    protected $fillable=['name','passwd','email'];

}
