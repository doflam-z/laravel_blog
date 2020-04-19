{{--用户页面--}}
{{--@extends('admin/public')--}}
{{--@section('main_content')--}}
    <h3 class="border-bottom pb-3">用户管理</h3>
    @foreach($data as $value)
        <div class='comment_all px-2 py-4 border-bottom'>
            <h5> <span class="icon-user" style="font-size: 1.4rem"> {{$value->user_name}}</span> <small style="color: #969599"><span class="icon-attachment"></span>{{$value->user_type}}</small></h5>
            <div class='pt-3'>
                <div class='manage_button float-right'>
                    <a class="button_read" href="/admin/user_add/?id={{$value->id}}">编辑</a> | <a class="button_delete" href="/admin/user_delete/?id={{$value->id}}" style="color: #e9322d">删除</a>
                </div>
            </div>
        </div>
    @endforeach
    <form action="/admin/user_add" method="get">
        <button class="btn btn-primary mt-2">新建</button>
    </form>
{{--@endsection--}}

