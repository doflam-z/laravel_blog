{{--后台主页--}}
@extends('admin/public')
@section('main_content')
    <h3>文章管理</h3>
@foreach($data as $value)
    <div class='box_content px-2 py-4 border-bottom'><h5><a href='/admin/article/edit/?id={{$value->id}}'>{{$value->article_title}}</a></h5>
        <div class='pt-3'>
            <small><span class='span icon-clock2'>{{date('Y年m月d日',$value->article_time)}}</span></small>
            <small><span class='span icon-eye'><small>{{$value->article_views}}</small></span></small>
            <small><span class='span icon-bubble2'><small>{{$value->comment_num}}</small></span></small>
            <div class='manage_button float-right'>
                <a href="">查看</a> | <a href="" style="color: #e9322d">删除</a>
            </div>
        </div>
    </div>
@endforeach
    <div class="mt-4">{{$data->links()}}</div>

@endsection
