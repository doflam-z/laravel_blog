{{--草稿箱--}}
{{--@extends('admin/public')--}}
{{--@section('main_content')--}}
    <h3 class="border-bottom pb-3">草稿箱</h3>
@foreach($data as $value)
    <div class='box_content px-2 py-4 border-bottom'><h5><a href='/article/edit/?table=Post&id={{$value->id}}' onclick="javascript:stop_ajax();">{{$value->title}}</a></h5>
        <div class='pt-3'>
            <small><span class='span icon-clock'>{{date('Y-m-d H:i:s',$value->created_at)}}</span></small>
            {{--            <small><span class='span icon-eye'><small>{{$value->article_views}}</small></span></small>--}}
            {{--            <small><span class='span icon-bubble2'><small>{{$value->comment_num}}</small></span></small>--}}
            <div class='manage_button float-right ajax'>
                <a href="/article/edit/?table=Post&id={{$value->id}}" onclick="javascript:stop_ajax();" >编辑</a> | <a href="/article/delete/?id={{$value->id}}" onclick="javascript:stop_ajax();" style="color: #e9322d">删除</a>
            </div>
        </div>
    </div>
@endforeach
<div class="mt-4">{{$data->links()}}</div>

{{--@endsection--}}

