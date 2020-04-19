<?php
//后台控制器
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
//引用的模块
use App\Admin\User;
use App\Admin\Article;
use App\Admin\Draft;
use App\Admin\Category;
use App\Admin\Comment;

class AdminController extends Controller
{

    //最近文章列表
    public function list(){
        $article_list=Article::select(['id','article_title'])->limit(6)->get();
        return $article_list;
    }

    //网站信息栏
    public function info(){
        $articles=Article::select(['id'])->count();
        $article_views=Article::sum('article_views');
        $article_comments=Comment::select(['id'])->count();
        $users=User::select(['id'])->count();
        $info=array('articles'=>"$articles",'article_views'=>"$article_views",'article_comments'=>"$article_comments",'users'=>"$users");
        return $info;
    }

    //后台首页
    public function admin(){
        $data=Article::select(['id','article_title','article_editor','article_time','comment_num','article_views'])->paginate(6);
        $article_list=$this->list();
        $info=$this->info();
        return view('/admin/index',compact(['data','article_list','info']));
    }
    //文章管理页面
    public function article(){
        $data=Article::select(['id','article_title','article_editor','article_time','comment_num','article_views'])->paginate(6);
        return view('/admin/article_mana',compact(['data']));
    }

    //评论管理
    public function comment(){
//        $article=new Article();
//        $field=['article_title'];
        $data=Comment::get();
//        foreach ($data as $request)
//        $article_list=$this->list();
//        $info=$this->info();
        return view('/admin/comment',compact(['data']));
//        return view('/admin/comment',compact(['data','article_list','info']));
    }

    //发表评论
    public function comment_add(Request $request){
        $time=time();
        $result=Comment::insert(['comment_content'=>"$request->comment_content",'article_id'=>"$request->article_id",'comment_time'=>"$time"]);
        if($result > 0){
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

    //分类管理
    public function cate(){
        $data=Category::get();
//        $article_list=$this->list();
//        $info=$this->info();
        return view('/admin/cate',compact(['data']));
//        return view('/admin/cate',compact(['data','info','article_list']));
    }

    //新增、修改分类页面
    public function cate_add(Request $request){
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
        $article_list=$this->list();
        $info=$this->info();
//        return view('/admin/cate_add',compact(['cate_name','cate_sub_name','cate_sub_value','id']));
        return view('/admin/cate_add',compact(['article_list','info','cate_name','cate_sub_name','cate_sub_value','id']));
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

    //用户管理
    public function user(){
        $data=User::get();
//        $article_list=$this->list();
//        $info=$this->info();
        return view('/admin/user',compact(['data']));
//        return view('/admin/user',compact(['data','article_list','info']));
    }

    //新增、修改用户页面
    public function user_add(Request $request){
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
        $article_list=$this->list();
        $info=$this->info();
//        return view('/admin/user_add',compact(['user_name','user_sub_name','user_sub_value','id']));
        return view('/admin/user_add',compact(['article_list','info','user_name','user_sub_name','user_sub_value','id']));
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
            return back();
        }else{dd('删除失败');}
    }

    //草稿管理
    public function draft(){
        $data=Draft::select(['id','article_title','article_editor','article_time','comment_num','article_views'])->paginate(6);
//        $article_list=$this->list();
//        $info=$this->info();
        return view('/admin/draft',compact(['data']));
//        return view('/admin/draft',compact(['data','article_list','info']));
    }

    //搜索
    public function search(Request $request){
        $str=trim($request->search_content);
        $data=Article::where('article_title','like',"%$str%")->select(['id','article_title','article_editor','article_time','comment_num','article_views'])->paginate(6);
        $article_list=$this->list();
        $info=$this->info();
//        return view('/admin/search',compact(['data','str']));
        return view('/admin/search',compact(['data','article_list','info','str']));
    }
}
