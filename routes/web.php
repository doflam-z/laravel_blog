<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//根路由
Route::get('/', function () {
    return view('welcome');
});

//test路由
//Route::get('/test','Admin\AdminController@test');

//Login
Route::any('/login','LoginController@login');
//接收验证值
Route::any('/login/ver','LoginController@ver');

//后台路由群组
Route::group(['prefix' =>'admin'],function (){
    //后台首页
    Route::get('/','Admin\AdminController@admin');
    //管理评论
    Route::get('/comment','Admin\AdminController@comment');
    //管理分类
    Route::get('/cate','Admin\AdminController@cate');
    //新建分类
    Route::get('/cate_add','Admin\AdminController@cate_add');
    //保存分类
    Route::post('/cate_save','Admin\AdminController@cate_save');
    //删除分类
    Route::get('/cate_delete','Admin\AdminController@cate_delete');
    //管理用户
    Route::get('/user','Admin\AdminController@user');
    //管理草稿箱
    Route::get('/draft','Admin\AdminController@draft');
    //管理回收站
    Route::get('/recycle','Admin\AdminController@recycle');

});

//文章路由群组
Route::group(['prefix' =>'article'],function () {
    //新增文章
    Route::any('/add', 'Admin\ArticleController@article_add');
    //修改文章
    Route::any('/edit', 'Admin\ArticleController@article_edit');
    //查看文章
    Route::get('/read', 'Admin\ArticleController@article_read');
    //删除文章
    Route::get('/delete', 'Admin\ArticleController@article_delete');
});
//markdown
Route::get('/markdown','Markdown\MarkdownController@markdown');

//删除评论
Route::get('/comment/delete','Admin\AdminController@comment_delete');
//发表评论
Route::post('/comment/add','Admin\AdminController@comment_add');

