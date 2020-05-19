<?php
//后台控制器
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
//引用的模块
use App\User;
use App\Admin\Article;
use App\Admin\Draft;
use App\Admin\Category;
use App\Comment;
use App\Post;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('role');
    }

    //后台首页
    public function admin(Request $request){
        if ($request->ajax) {
        $data=Post::select(['id','title','created_at'])->paginate(6);
        return view('/admin/index', compact(['data']));
        }else{
            return $this->public_page();
        }
    }

    //评论管理
    public function comment(Request $request){
        if ($request->ajax) {
            $data = Comment::get();
            return view('/admin/comment', compact(['data']));
        }else{
            return $this->public_page();
        }
    }

    //分类管理
    public function cate(Request $request){
        if ($request->ajax) {
            $data=Category::get();
            return view('/admin/cate',compact(['data']));
        }else{
            return $this->public_page();
        }
    }

    //用户管理
    public function user(Request $request){
        if ($request->ajax) {
            $data=User::get();
            return view('/admin/user',compact(['data']));
        }else{
            return $this->public_page();
        }
    }

    //草稿管理
    public function draft(Request $request){
        if ($request->ajax) {
//            $data=Draft::select(['id','article_title','article_editor','article_time','comment_num','article_views'])->paginate(6);
            $data=Draft::select(['id','title','created_at'])->paginate(6);
            return view('/admin/draft',compact(['data']));
        }else{
            return $this->public_page();
        }
    }

//------以上为导航管理模块---------
//------以下为功能模块------------

    //发表评论
    public function comment_add(Request $request){
        $username=Auth::user()->name;
        $time=time();
        $result=Comment::insert(['content'=>"$request->comment_content",'article_id'=>"$request->article_id",'time'=>"$time",'username'=>"$username"]);
        if($result > 0){
//            return redirect("/admin#page=2");
            return back();
        }
    }

    //删除评论
    public function comment_delete(Request $request){
        $result=Comment::where('id','=',"$request->id")->delete();
        if ($result > 0) {
            return back();
        }else{dd('删除失败');}
    }


    //新增、修改分类页面
    public function cate_add(Request $request){
        if ($request->ajax) {
            if (isset($request->id)){
                $data=Category::where('id','=',"$request->id")->get();
                foreach ($data as $value)
                $cate_name=$value->cate_name;
                $cate_sub_name='修改';
                $cate_sub_value='cate_edit';
                $id=$request->id;
            }else{
                $cate_name="";
                $cate_sub_name='新建';
                $cate_sub_value='cate_add';
                $id="";
            }
            return view('/admin/cate_add',compact(['cate_name','cate_sub_name','cate_sub_value','id']));
        }else{
            return $this->public_page();
        }
    }

    //保存、修改分类方法
    public function cate_save(Request $request){
            if ($request->cate_sub =='cate_add') {
                $result = Category::insert(['cate_name' => "$request->cate_name"]);
                if ($result > 0) {
                    return redirect('/admin/cate');
                }
            }elseif ($request->cate_sub =='cate_edit'){
                $result = Category::where('id','=',"$request->id")->update(['cate_name' => "$request->cate_name"]);
                if ($result > 0) {
                    return redirect('/admin/cate');
                }
            }
    }

    //删除分类
    public function cate_delete(Request $request){
        $result=Category::where('id','=',"$request->id")->delete();
        if ($result > 0 ){
            return back();
        }else{dd('删除失败');}
    }

    //新增、修改用户页面
    public function user_add(Request $request){
        if ($request->ajax) {
            if (isset($request->id)){
                $data=User::where('id','=',"$request->id")->get();
                foreach ($data as $value)
                    $user_name=$value->user_name;
                $user_sub_name='修改';
                $user_sub_value='user_edit';
                $id=$request->id;
            }else{
                $user_name="";
                $user_sub_name='新建';
                $user_sub_value='user_add';
                $id="";
            }
            return view('/admin/user_add',compact(['user_name','user_sub_name','user_sub_value','id']));
        }else{
            return $this->public_page();
        }
    }

    //保存、修改用户方法
    public function user_save(Request $request){
        $user_passwd=md5($request->user_passwd);
        if ($request->user_sub =='user_add') {
            if ($request->user_passwd == $request->user_passwd_confirm){
                $result = User::insert(['user_name' => "$request->user_name",'user_passwd' => "$user_passwd",'user_type' => "$request->user_type"]);
                if ($result > 0) {
                    return redirect('/admin/user');
                }
            }else{dd('两次输入的密码不一致！');}
        }elseif ($request->user_sub =='user_edit'){
            $result = User::where('id','=',"$request->id")->update(['user_name' => "$request->user_name",'user_passwd' => "$request->user_passwd",'user_type' => "$request->user_type"]);
            if ($result > 0) {
                return redirect('/admin/user');
            }
        }
    }

    //删除用户
    public function user_delete(Request $request){
        $result=User::where('id','=',"$request->id")->delete();
        if ($result > 0 ){
            return redirect('/admin/user');
        }else{dd('删除失败');}
    }

    //搜索
    public function search(Request $request){
        if ($request->search_content == ""){
            return "搜索词不能为空！";
        }
        $str=trim($request->search_content);
        $data=Article::where('article_title','like',"%$str%")->select(['id','article_title','article_editor','article_time','comment_num','article_views'])->get();
        return view('/admin/search',compact(['data','str']));
    }

    //最近文章列表
    public function list(){
        $article_list=Post::select(['id','title'])->limit(10)->get();
        $list="";
        foreach($article_list as $value) {
            $list.="<li class='list-group-item border-0 p-1' style='background-color: #fdfdfd'> <small><a onclick=\"javascript:stop_ajax();\" class='cheak' href='/article/edit?id=$value->id'> $value->title </a></small> </li >";
        }
        return $list;
    }

    //网站信息栏
    public function info(){
        $articles=Post::select(['id'])->count();
//        $article_views=Article::sum('article_views');
        $article_views='12';
        $article_comments=Comment::select(['id'])->count();
        $users=User::select(['id'])->count();
        $info=array('articles'=>"$articles",'article_views'=>"$article_views",'article_comments'=>"$article_comments",'users'=>"$users");
        return "<tr><td>{$info['articles']}</td><td>{$info['article_views']}</td><td>{$info['article_comments']}</td><td>{$info['users']}</td></tr>";
    }

    //返回公共页面
    public function public_page(){
        return view('/admin/public');
    }
}
