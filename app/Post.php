<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // 可填字段白名单
    protected $fillable = [
        'content',
        'user_id',
        'title'
    ];

    /**
     * 一篇文章有多个评论
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    /**
     * 获取这篇文章的评论以parent_id来分组
     * @return static
     */
    public function getComments()
    {
        return $this->comments()->with('owner')->get()->groupBy('parent_id');
    }
}
