{{--查看文章页面--}}
{{--@extends('admin/public')--}}
{{--@section('main_content')--}}
    <div class="article_content editormd-preview-container markdown-body ">
        {!! $article_content !!}
    </div>
    <form action="/comment/add" method="post">
        <textarea class="form-control" rows="3" name="comment_content"></textarea>
        <button class="btn btn-primary mt-2" name="comment_sub" type="submit" value="">评论</button>
        <input name="article_id" type="hidden" value="{{$id}}">
    </form>
    @foreach($comment as $value)
        <div class="py-3 border-bottom">
            <div>
                <a style="color: #2C3238;font-size: 1.4rem;">{{$value->username}}</a>
                <small style="color: #95908C">{{date('Y-m-d H:i:s',$value->time)}}</small>
                <a href="/?id={{$value->id}}" style=";">回复</a>
            </div>
            <p class="mb-0" style="font-size: 1.2rem;">{{$value->content}}</p>
            <div class="ml-3 pl-2 border-left">
                @foreach($second_comment as $value2)
                    <div>
                        <a style="color: #2C3238;font-size: 1.4rem;">{{$value2->username}}</a>
                        <small style="color: #95908C">{{date('Y-m-d H:i:s',$value2->time)}}</small>
                        <a href="/?id={{$value2->id}}" style=";">回复</a>
                    </div>
                    <p class="mb-0" style="font-size: 1.2rem;">{{$value2->content}}</p>
                @endforeach
            </div>
        </div>
    @endforeach
{{--@endsection--}}
