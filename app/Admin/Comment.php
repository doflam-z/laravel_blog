<?php

namespace App\Admin;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //评论模型
    protected $table='comment';
    public $timestamps=false;
    protected $fillable=['id','comment_content','comment_time','username','article_id'];

}

