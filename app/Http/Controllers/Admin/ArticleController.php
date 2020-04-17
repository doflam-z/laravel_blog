<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Article;
use App\Admin\Comment;

class ArticleController extends Controller
{
    protected $article;
    public function __construct(Article $article)
    {
        $this->article=$article;
    }


    //查看文章
    public function article_read(Request $request){
        $field=['article_title','article_content'];
        $id=$request->id;
        $data=$this->article->article_select($id,$field);
        foreach($data as $value)
        $text=$value->article_content;
        $parser=new Parser();
        $article_content=$parser->makeHtml($text);
        $article_title=$value->article_title;
        $article_list=Article::select(['id','article_title'])->limit(6)->get();
        $comment=Comment::where('article_id','=',"$id")->get();
//        $username=$_SESSION['user_name'];
        return view('/admin/article',compact(['article_title','article_content','article_list','comment','id']));
    }
    //保存文章
    public function article_add(Request $request){
        $result=$this->article->article_add($request);
        if ($result > 0){
            return redirect('/admin');
        }else{dd('保存失败');}
    }

    //新增、修改文章
    public function article_edit(Request $request){
        $field=['article_title','article_content'];
        if (isset($request->id)){
            $id=$request->id;
            $data=$this->article->article_select($id,$field);
            foreach ($data as $value)
            $article_content=$value->article_content;
            $article_title=$value->article_title;
            $sub="edit";
            $id=$request->id;
        }else{
            $article_content='';
            $article_title='';
            $sub='publish';
            $id='';
        }
        $cate_list=Category::select(['cate_name'])->get();
        return view('/admin/markdown',compact(['cate_list','article_content','article_title','sub','id']));
    }

    //删除文章
    public function article_delete(Request $request){
        $data=$this->article->article_delete($request);
        if ($data > 0) {
            return back();
        }else{dd('删除失败');}
    }

}
