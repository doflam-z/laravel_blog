{{--
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        You are logged in!
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
--}}

@extends('layouts.home')

@section('content')
    <div class="container">
            <div class="row w-100">
                <div class="col-md-10 m-auto">
                    <div class='article_title px-2 py-4 border-bottom'>
                        @foreach($data as $value)@endforeach
                        <h3 class="" style="color: #4D4D4D"><b>{{$value->article_title}}</b></h3>
                        <div class='pt-1'>
                            <small>{{date('Y-m-d',$value->article_time)}}</small>
                        </div>
                    </div>
                    <div id="test-editormd-view2" class="p-1">
                        <textarea style="display:none;" name="test-editormd-markdown-doc">{{$value->article_content}}</textarea>
                    </div>
                    <div class="comment mt-3">
                        <form class="w-100" action="/comment/add" method="post">
                            <textarea class="form-control" rows="3" name="comment_content"></textarea>
                            <button class="btn btn-primary mt-2" name="comment_sub" type="submit" value="">评论</button>
                            <input name="article_id" type="hidden" value="{{$id}}">
                        </form>
                    </div>
                    @foreach($comment as $value)
                        <div class="py-3">
                            <span class="icon-user-tie">用户</span> <b style="color: #645FF7">{{$value->username}}</b> <small style="color: #95908C">{{date('Y年m月d号 H:i:s',$value->comment_time)}}</small> : {{$value->comment_content}}
                        </div>
                    @endforeach
                </div>
            </div>
    </div>
@endsection

