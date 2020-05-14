{{--所有评论页面--}}
{{--@extends('admin/public')
@section('main_content')--}}
    <h3 class="border-bottom pb-3">全部评论</h3>
    @foreach($data as $value)
        <div class='comment_all px-2 py-4 border-bottom'><h5><span class="icon-user">用户：</span> <span style="color: #2c5786">{{$value->user_id}}</span> ：<small>{{$value->body}}</small></h5>
            <div class='pt-3'>
                <small><span class='span icon-clock2'>{{$value->created_at}}</span></small>
                <div class='manage_button float-right'>
                    | <a class="button_delete" href="/comment/delete/?id={{$value->id}}" onclick="javascript:stop_ajax();" style="color: #e9322d">删除</a>
                </div>
            </div>
        </div>
    @endforeach
{{--@endsection--}}
