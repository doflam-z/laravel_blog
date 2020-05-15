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


//后台路由群组
Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' =>'admin'],function (){
        //后台首页
        Route::any('/','Admin\AdminController@admin');
        //文章管理
        Route::any('/article','Admin\AdminController@article');
        //管理评论
        Route::any('/comment','Admin\AdminController@comment');
        //管理分类
        Route::any('/cate','Admin\AdminController@cate');
        //新建分类
        Route::any('/cate_add','Admin\AdminController@cate_add');
        //保存分类
        Route::post('/cate_save','Admin\AdminController@cate_save');
        //删除分类
        Route::any('/cate_delete','Admin\AdminController@cate_delete');
        //管理用户
        Route::any('/user','Admin\AdminController@user');
        //新增用户
        Route::any('/user_add','Admin\AdminController@user_add');
        //保存用户
        Route::post('/user_save','Admin\AdminController@user_save');
        //删除用户
        Route::get('/user_delete','Admin\AdminController@user_delete');
        //管理草稿箱
        Route::any('/draft','Admin\AdminController@draft');
        //管理回收站
        Route::any('/recycle','Admin\AdminController@recycle');
        //搜索结果页面
        Route::any('/search','Admin\AdminController@search');

    });
});


//文章路由群组
Route::group(['prefix' =>'article'],function () {
    //新增文章
    Route::any('/add', 'Admin\ArticleController@article_add');
    //修改文章
    Route::any('/edit', 'Admin\ArticleController@article_edit');
    //查看文章
    Route::any('/read', 'Admin\ArticleController@article_read');
    //删除文章
    Route::get('/delete', 'Admin\ArticleController@article_delete');
});
//markdown
//Route::get('/markdown','Markdown\MarkdownController@markdown');

//删除评论
Route::get('/comment/delete','Admin\AdminController@comment_delete');
//发表评论
Route::post('/comment/add','Admin\AdminController@comment_add');

//网站信息
Route::get('/info','Admin\AdminController@info');
//文章列表信息
Route::get('/list','Admin\AdminController@list');



//['register'=>false],不允许注册
Auth::routes(['register'=>true]);

//Route::get('/home', 'HomeController@index')->name('home');
Route::get('/', 'HomeController@archives');
Route::get('/read', 'HomeController@read');
Route::any('/search', 'HomeController@search');
Route::get('/category', 'HomeController@category');
Route::get('/inquire', 'HomeController@inquire');
Route::get('/about', function () {
    return view('home/about');
});
Route::get('/prompt', function () {
    return view('home/prompt');
});
Route::get('/comment_add', function () {
    return view('admin/comment_add');
});


//------------------------------------------------------
Route::get('/post/show/{post}', function (\App\Post $post) {
    $post->load('comments.owner');
    $comments = $post->getComments();
    if($comments->count()!==0) {
        $comments['root'] = $comments[''];
        unset($comments['']);
    }else{
        $comments='';
    }
    return view('home', compact('post', 'comments'));
});

//用户进行评论
Route::post('post/{post}/comments', function (\App\Post $post) {
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
});


