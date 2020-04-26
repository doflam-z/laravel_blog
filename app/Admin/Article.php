<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Article extends Model
{
    //文章管理模型
    protected $table='article';
    //定义禁止操作时间
    public $timestamps=false;
    //设置允许写入的字段
    protected $fillable=['id','cate_name','article_editor','article_content','article_views','comment_num','article_time','article_title'];

}
