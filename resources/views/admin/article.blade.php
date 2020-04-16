{{--文章页面--}}
@extends('admin/public')
@section('main_content')
{{--    <h3>{{$article_title}}</h3>--}}
    <div class="article_content">
        {{print_r($article_content)}}
    </div>
@endsection
