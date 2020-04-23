{{--新建、修改分类页面--}}
{{--@extends('admin/public')--}}
{{--@section('main_content')--}}
    <h3 class="border-bottom pb-3">分类专栏</h3>
    <form action="/admin/cate_save" method="post">
        <div class='px-2 py-4 border-bottom'>
            <div class="form-group">
                <label for="name">{{$cate_sub_name}}分类</label>
                <input type="text" value="{{$cate_name}}" name="cate_name" class="form-control" placeholder="输入名称">
            </div>
        </div>
        <button class="btn btn-primary mt-2" name="cate_sub" value="{{$cate_sub_value}}">{{$cate_sub_name}}</button>
        <input name="id" type="hidden" value="{{$id}}">
    </form>
{{--@endsection--}}

