{{--所有评论页面--}}
{{--@extends('admin/public')
@section('main_content')--}}
    <h3 class="border-bottom pb-3">全部评论</h3>
    {{--@foreach($data as $comment)
        <div class='comment_all px-2 py-4 border-bottom'>
            <h5>
                <span class="icon-twitch"></span>
                <span style="color: #2c5786;font-size: 1.5rem">{{$comment->owner->name}}</span>
                <span style="color: #828387;font-size: 1rem">评论</span>
                <a href="/post/show/{{$comment->article->id}}" onclick="javascript:stop_ajax();" style="font-size: 1rem;">{{$comment->article->title}}</a> :
                {{$comment->body}}
            </h5>
            <div class='pt-3'>
                <small><span class='span icon-clock2'>{{$comment->created_at}}</span></small>
                <div class='manage_button float-right'>
                    <a class="ml-2" style="font-size: 0.875rem;" href="javascript:reply({{$comment->id}})" id="click_event{{$comment->id}}">回复</a> | <a class="button_delete" href="/comment/delete/?id={{$comment->id}}" onclick="javascript:stop_ajax();" style="color: #e9322d">删除</a>
                </div>
            </div>

            <form id="reply{{$comment->id}}" method="POST" action="{{url('post/'.$comment->article->id.'/comments')}}" accept-charset="UTF-8" style="display: none">
                {{csrf_field()}}

--}}{{--                @if(isset($parentId))
                    <input type="hidden" name="parent_id" value="{{$parentId}}">
                @endif--}}{{--

                <div class="form-group">
                    <label for="body" class="control-label">Info:</label>
                    <textarea id="body" name="body"  class="form-control" required="required"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">回复</button>
            </form>
        </div>
    @endforeach--}}

@if($comments !== '')
    @include('comments.list',['collections'=>$comments['root']])
@endif
{{--@endsection--}}
