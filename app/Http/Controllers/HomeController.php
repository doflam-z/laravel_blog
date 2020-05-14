<?php

namespace App\Http\Controllers;

use App\Admin\Article;
use App\Admin\Category;
use App\Comment;
use App\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
/*    public function __construct()
    {
        $this->middleware('auth');
    }*/

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
    //查看所有文章列表
    public function archives(){
            $data=Post::select(['id','title','created_at'])->paginate(14);
            return view('/home/archives', compact(['data']));
    }
    //查看文章
    public function read(Request $request)
    {
        $id=$request->id;
        $field=['title','content','created_at'];
        $comment=Comment::where('article_id','=',"$id")->get();
        $data=Post::where('id','=',"$request->id")->select($field)->get();
        return view('home',compact(['data','comment','id']));
    }

    //搜索
    public function search(Request $request)
    {
        if ($request->search_content == ""){
            return "搜索词不能为空！";
        }
        $str=trim($request->search_content);
        $data=Article::where('article_title','like',"%$str%")->select(['id','article_title','article_editor','article_time','comment_num','article_views'])->get();
        return view('/home/search',compact(['data','str']));
    }

    //输出分类列表
    public function category(){
        $data=Category::select(['cate_name'])->get();
        $result="";
        foreach ($data as $value) {
            $result .= "<a class='dropdown-item text-center py-1' style='line-height: 30px;' href='/inquire?cate_name=$value->cate_name'>$value->cate_name</a>";
        }
        return $result;
    }
    //查询分类下的文章
    public function inquire(Request $request){
        $data=Post::where('cate_name','=',"$request->cate_name")->select(['id','title','created_at','cate_name'])->paginate(14);
        if ($data->first() !== null){
            foreach ($data as $value)
                $cate_name = $value->cate_name;
        }else{$cate_name="";}
        return view('/home/archives', compact(['data','cate_name']));
    }

}
