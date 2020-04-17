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
    //后台首页
    public function admin(){
        $data=Article::select(['id','article_title','article_editor','article_time','comment_num','article_views'])->paginate(6);
        $article_list=$this->list();
        return view('/admin/index',compact(['data','article_list']));
    }

    //评论管理
    public function comment(){
        $article=new Article();
        $field=['article_title'];
        $data=Comment::get();
        foreach ($data as $request)
        $article_list=$this->list();
        return view('/admin/comment',compact(['data','article_list']));
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
        $article_list=$this->list();
        return view('/admin/cate',compact(['data','article_list']));
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
        return view('/admin/cate_add',compact(['article_list','cate_name','cate_sub_name','cate_sub_value','id']));
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
        $article_list=$this->list();
        return view('/admin/user',compact(['data','article_list']));
    }

    //草稿管理
    public function draft(){
        $data=Draft::select(['id','article_title','article_editor','article_time','comment_num','article_views'])->paginate(6);
        $article_list=$this->list();
        return view('/admin/draft',compact(['data','article_list']));
    }
}
