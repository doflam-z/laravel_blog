{{--查看文章页面--}}
{{--@extends('admin/public')--}}
{{--@section('main_content')--}}
    <div class="article_content">
        {{print_r($article_content)}}
    </div>
    <form action="/comment/add" method="post">
        <textarea class="form-control" rows="3" name="comment_content"></textarea>
        <button class="btn btn-primary mt-2" name="comment_sub" type="submit" value="">评论</button>
        <input name="article_id" type="hidden" value="{{$id}}">
    </form>
    @foreach($comment as $value)
        <div class="py-3 border-bottom">
            <span class="icon-user-tie">用户</span> <b style="color: #645FF7">{{$value->username}}</b> <small style="color: #95908C">{{date('Y年m月d号 H:i:s',$value->comment_time)}}</small> : {{$value->comment_content}}
        </div>
    @endforeach
{{--@endsection--}}
