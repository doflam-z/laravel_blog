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
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    //查看文章详情
    public function article_read(Request $request){
        if ($request->ajax) {
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
        return view('/admin/article',compact(['article_title','article_content','comment','id']));
        }else{
            return $this->public_page();
        }
    }

    //提取文章markdown文本
    public function markdownContent(){
        $data=Article::where('id','=','229')->select(['article_title','article_content'])->get();
        foreach($data as $value)
        $markdownContent=$value->article_content;
        return $markdownContent;
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
        $data= Article::where('id','=',"$request->id")->delete();
        if ($data > 0) {
            return redirect('/admin');
        }else{return false;}
    }

    //转化引号
    function articleChang($article_content)
    {
        $patterns= "/\'/";
        $keywords="\'";
        return $str=preg_replace($patterns,$keywords,$article_content);
    }

    //返回公共页面
    public function public_page(){
        return view('/admin/public');
    }
}
