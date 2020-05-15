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
    //查看所有文章列表
    public function index(){
            $data=Post::select(['id','title','created_at'])->paginate(14);
            return view('/home/index', compact(['data']));
    }
    //查看文章
    public function show(\App\Post $post)
    {
        $post->load('comments.owner');
        $comments = $post->getComments();
        if($comments->count()!==0) {
            $comments['root'] = $comments[''];
            unset($comments['']);
        }else{
            $comments='';
        }
        return view('/home/article', compact('post', 'comments'));
    }
    //评论文章
    public function comment(\App\Post $post)
    {
        if(\Auth::check()) {
            $post->comments()->create([
                'body' => request('body'),
                'user_id' => \Auth::id(),
                'parent_id' => request('parent_id', null),
            ]);
            return back();
        }else{
            return redirect('login');
        }
    }

/*    //搜索
    public function search(Request $request)
    {
        if ($request->search_content == ""){
            return "搜索词不能为空！";
        }
        $str=trim($request->search_content);
        $data=Article::where('article_title','like',"%$str%")->select(['id','article_title','article_editor','article_time','comment_num','article_views'])->get();
        return view('/home/search',compact(['data','str']));
    }*/

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
