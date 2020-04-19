<?php

namespace App\Http\Controllers\Admin;

use App\Admin\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\Article;
use App\Admin\Comment;
use App\Admin\Draft;

class ArticleController extends Controller
{
    protected $article;
    public function __construct(Article $article)
    {
        $this->article=$article;
    }

    //查看文章详情
    public function article_read(Request $request){
        $field=['article_title','article_content'];
        $id=$request->id;
        if ($request->table == "Draft"){
            $data=Draft::where('id','=',"$id")->select($field)->get();
        }else{
            $data=Article::where('id','=',"$id")->select($field)->get();
        }
        foreach($data as $value)
        $text=$value->article_content;
        $parser=new Parser();
        $admin=new AdminController();
        $article_content=$parser->makeHtml($text);
        $article_title=$value->article_title;
        $comment=Comment::where('article_id','=',"$id")->get();
//        $username=$_SESSION['user_name'];
        $article_list=Article::select(['id','article_title'])->limit(6)->get();
        $info=$admin->info();
        return view('/admin/article',compact(['article_list','info','article_title','article_content','comment','id']));
    }
    //发布、保存文章方法
    public function article_add(Request $request){
        $time=time();
        $article_content = $request->mark;
        $article_content = $this->articleChang($article_content);
        if (isset($request->publish)){
            if ($request->publish =='edit'){
                $result= Article::where('id','=',"$request->id")->update(['article_title' => "$request->article_title", 'article_content' => "$article_content", 'cate_name' => "$request->category", 'article_time' => "$time"]);
            }elseif ($request->publish =='publish') {
                $result = Article::insert(['article_title' => "$request->article_title", 'article_content' => "$article_content", 'cate_name' => "$request->category", 'article_time' => "$time"]);
            }
            if ($result > 0){
                return redirect('/admin');
            }else{dd('保存失败');}
        }elseif (isset($request->save)){
            if ($request->save =='edit'){
                $result= Draft::where('id','=',"$request->id")->update(['article_title' => "$request->article_title", 'article_content' => "$article_content", 'cate_name' => "$request->category", 'article_time' => "$time"]);
            }elseif ($request->save =='publish') {
                $result = Draft::insert(['article_title' => "$request->article_title", 'article_content' => "$article_content", 'cate_name' => "$request->category", 'article_time' => "$time"]);
            }
            if ($result > 0){
                return redirect('/admin/draft');
            }else{dd('保存失败');}
        }
    }

    //新增、修改文章页面
    public function article_edit(Request $request){
        $field=['article_title','article_content'];
        if (isset($request->id)){
            $id=$request->id;
            if ($request->table == "Draft"){
                $data=Draft::where('id','=',"$id")->select($field)->get();
            }else{
                $data=Article::where('id','=',"$id")->select($field)->get();
            }
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
//        $data=$this->article_delete($request);
        $data= Article::where('id','=',"$request->id")->delete();
        if ($data > 0) {
            return back();
        }else{dd('删除失败');}
    }


    //转化引号
    function articleChang($article_content)
    {
        $patterns= "/\'/";
        $keywords="\'";
        return $str=preg_replace($patterns,$keywords,$article_content);
    }

}
