<div class="col-md-12 border-left">
    <h5><span style="color:#31b0d5">{{$comment->owner->name}}</span>: <a class="ml-2" style="font-size: 0.875rem;" href="javascript:reply({{$comment->id}})" id="click_event{{$comment->id}}">回复</a></h5>
    <h5 style="font-size: 1rem;">{{$comment->body}}</h5>

    @include('comments.form',['parentId'=>$comment->id])

    @if(isset($comments[$comment->id]))
        @include('comments.list',['collections'=>$comments[$comment->id]])
    @endif
{{--    <hr>--}}
</div>
