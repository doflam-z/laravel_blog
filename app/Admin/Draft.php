<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Draft extends Model
{
    //草稿箱
    protected $table='draft';
    //定义禁止操作时间
    public $timestamps=false;
    //设置允许写入的字段
    protected $fillable=['id','cate_name','article_editor','article_content','article_views','comment_num','article_time','article_title'];
}
