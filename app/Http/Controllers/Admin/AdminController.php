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

class AdminController extends Controller
{
    //后台首页
    public function admin(){
        $data=Article::select(['id','article_title','article_editor','article_time','comment_num','article_views'])->paginate(6);
        $article_list=Article::select(['id','article_title'])->limit(6)->get();

        return view('/admin/index',compact(['data','article_list']));
    }



}
