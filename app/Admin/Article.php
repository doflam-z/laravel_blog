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

//---------------------------------------------------------------------------------------------------------------------------------------------
    //查看文章
    public function article_read($request){
        $data=$this->where('id','=',"$request->id")->select(['article_title','article_content'])->get();
        return $data;
    }
    //修改文章
    public function article_edit($request){
        $request->id;
        $data=Category::select(['cate_name'])->get();
        return $data;
    }

    //发布文章
    public function article_add($request){
        $time=time();
        $article_content=$request->mark;
        $article_content=$this->articleChang($article_content);
        $result=$this->insert(['article_title'=>"$request->article_title",'article_content'=>"$article_content",'cate_name'=>"$request->category",'article_time'=>"$time"]);
        return $result;
    }

    //删除文章
    public function article_delete(){

    }

    //转化引号
    function articleChang($article_content)
    {
        $patterns= "/\'/";
        $keywords="\'";
        return $str=preg_replace($patterns,$keywords,$article_content);
    }
}
