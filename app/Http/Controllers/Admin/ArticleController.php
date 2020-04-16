<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Article;

class ArticleController extends Controller
{
    protected $article;
    public function __construct(Article $article)
    {
        $this->article=$article;
    }


    //查看文章
    public function article_read(Request $request){
        $data=$this->article->article_read($request);
        foreach($data as $value)
        $text=$value->article_content;
        $parser=new Parser();
        $article_content=$parser->makeHtml($text);
//        var_dump( $article_content);
        $article_title=$value->article_title;
        $article_list=Article::select(['id','article_title'])->limit(6)->get();
        return view('/admin/article',compact(['article_title','article_content','article_list']));
    }
    //保存文章
    public function article_add(Request $request){
        dd($this->article->article_add($request));
    }

    //新增、修改文章
    public function article_edit(Request $request){
        $data=$this->article->article_edit($request);
        return view('/admin/markdown',compact(['data']));
    }
}
