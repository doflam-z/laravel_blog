<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    /*用户表模块*/
    //关联user数据表
    protected $table='user';
    //定义禁止操作时间
    public $timestamps=false;
    //设置允许写入的字段
    protected $fillable=['id','user_name','user_passwd','user_email','user_type'];
    //新增
/*    public function add(){

    }
    //查询
    public function select(){

    }
    //修改
    public function update(){

    }
    //删除
    public function delete(){

    }*/
}
