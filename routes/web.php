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

Route::get('/', function () {
    return view('welcome');
});

/*//test路由
Route::get('/test','TestController@test');*/

//Login路由
Route::any('/login','LoginController@login');
//接收验证值
Route::any('/ver','LoginController@ver');
//后台首页路由
Route::get('/admin','LoginController@admin');
