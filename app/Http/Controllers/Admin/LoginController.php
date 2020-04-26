<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Admin\User;
class LoginController extends Controller
{
    //后台登录的页面
    public function login(){
        return view('/admin/login');
    }

    //接收验证用户密码
    public function ver(Request $request){
        $rows=$request->all();
//        dd($request->all());
        $data=User::where('user_name','=',"{$rows["user_name"]}")->get('user_passwd')-> toArray();
       if ($data !== array() and ($data[0]["user_passwd"] == md5("{$rows["user_passwd"]}"))){
//           dd("登陆成功");
           return redirect("/admin");
       }else{
           echo "登陆失败，用户名或密码错误！";
       }
    }

}
