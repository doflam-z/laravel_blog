{{--新建、修改用户页面--}}
{{--@extends('admin/public')--}}
{{--@section('main_content')--}}
    <h3 class="border-bottom pb-3">用户管理</h3>
    <form action="/admin/user_save" method="post">
        <div class='px-2 py-2 row'>
            <div class="col-md-4">
                <div class="input-group mb-3">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">用户</span>
                    </div>
                    <input type="text" value="{{$user_name}}" name="user_name" class="form-control" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group mb-3 ">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">密码</span>
                    </div>
                    <input type="password" name="user_passwd" class="form-control" placeholder="password" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <div class="input-group ">
                    <div class="input-group-prepend">
                        <span class="input-group-text" id="basic-addon1">确认密码</span>
                    </div>
                    <input type="password" name="user_passwd_confirm" class="form-control" placeholder="password" aria-label="Username" aria-describedby="basic-addon1">
                </div>
                <button class="btn btn-primary mt-2" name="user_sub" value="{{$user_sub_value}}">{{$user_sub_name}}</button>
            </div>
            <div class="input-group col-md-2">
                <select class="text-center" name="user_type" style="width: 100px;height: 36px;border-radius: 4px;color: #3E3E3E;">
                    <option  value='普通用户'>普通用户</option>
                    <option  value='管理员'>管理员</option>
                </select>
            </div>
        </div>
        <input name="id" type="hidden" value="{{$id}}">
    </form>
{{--@endsection--}}


