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
    public function article_select($request){
        $data=$this->where('id','=',"$request->id")->select(['article_title','article_content'])->get();
        return $data;
    }
/*    //输出文章到markdown编辑器
    public function article_edit($request){
        $data=$this->where('id','=',"$request->id")->select(['article_content','article_title'])->get();
        return $data;
    }*/

    //发布、修改文章
    public function article_add($request){
        $time=time();
        $article_content = $request->mark;
        $article_content = $this->articleChang($article_content);
        if ($request->publish='edit'){
            $result= $this-> where('id','=',"$request->id")->update(['article_title' => "$request->article_title", 'article_content' => "$article_content", 'cate_name' => "$request->category", 'article_time' => "$time"]);
        }elseif ($request->publish='publish') {
            $result = $this->insert(['article_title' => "$request->article_title", 'article_content' => "$article_content", 'cate_name' => "$request->category", 'article_time' => "$time"]);
        }
        return $result;
    }

    //删除文章
    public function article_delete($request){
        $result= $this-> where('id','=',"$request->id")->delete();
        return $result;
    }

    //转化引号
    function articleChang($article_content)
    {
        $patterns= "/\'/";
        $keywords="\'";
        return $str=preg_replace($patterns,$keywords,$article_content);
    }
}
