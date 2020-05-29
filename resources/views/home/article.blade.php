@extends('layouts.app')

@section('content')
    <div class="container">
            <div class="row w-100">
                <div class="col-md-10 m-auto">
                    <div class='article_title px-2 py-4 border-bottom'>
                        <h3 class="" style="color: #4D4D4D"><b>{{$post->title}}</b></h3>
                        <div class='pt-1'>
                            <small>{{$post->created_at}}</small>
                        </div>
                    </div>
                    <div id="test-editormd-view2" class="p-1 border-bottom pb-4">
                        <textarea style="display:none;" name="test-editormd-markdown-doc">{{$post->content}}</textarea>
                    </div>
                    <div class="mt-4">
                        @if($comments !== '')
                            @include('comments.list',['collections'=>$comments['root']])
                        @endif

                        <h3>留下您的评论</h3>
                        <form method="POST" action="{{url('post/'.$post->id.'/comments')}}" accept-charset="UTF-8">
                            {{csrf_field()}}
                            <div class="form-group">
                                <label for="body" class="control-label">Info:</label>
                                <textarea id="body" name="body"  class="form-control" required="required"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">回复</button>
                        </form>
                    </div>
                </div>
            </div>
    </div>
@endsection
