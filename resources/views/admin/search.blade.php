{{--后台搜索页面--}}
@extends('admin/public')
@section('main_content')
    <h3 class="border-bottom pb-3">标题包含<span style="color: #6364C1">{{$str}}</span>搜索结果</h3>
    @foreach($data as $value)
        <div class='box_content px-2 py-4 border-bottom'><h5><a href='/article/edit/?table=Article&id={{$value->id}}'>{{$value->article_title}}</a></h5>
            <div class='pt-3'>
                <small><span class='span icon-clock2'>{{date('Y年m月d日',$value->article_time)}}</span></small>
                <small><span class='span icon-eye'><small>{{$value->article_views}}</small></span></small>
                <small><span class='span icon-bubble2'><small>{{$value->comment_num}}</small></span></small>
                <div class='manage_button float-right'>
                    <a href="/article/read/?id={{$value->id}}">查看</a> | <a href="/article/delete/?id={{$value->id}}" style="color: #e9322d">删除</a>
                </div>
            </div>
        </div>
    @endforeach
    <div class="mt-4">{{$data->links()}}</div>

@endsection
