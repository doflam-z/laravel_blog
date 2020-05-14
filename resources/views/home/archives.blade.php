@extends('layouts.home')

@section('content')
    <div class="container">
        <div class="row w-100">
            <div class="col-md-10 m-auto">
                <div class="dropdown" style="line-height: 52px;height: 52px;">
                    <h3 class="pb-1 px-2 float-left" style="line-height: 52px;">{{$cate_name ?? 'Article List'}}</h3>
                    <div class="float-right">
                        <button type="button" class="btn btn-primary dropdown-toggle button_nav" data-toggle="dropdown">
                            分类
                        </button>
                        <div class="dropdown-menu dropdown-menu-right cate_list" style="width: 100px;">
                        </div>
                    </div>
                </div>
                @foreach($data as $value)
                    <div class='article_title px-2 py-3'>
{{--                        <h5><a href='/read?id={{$value->id}}'>{{$value->title}}</a></h5>--}}
                        <h5><a href='/post/show/{{$value->id}}'>{{$value->title}}</a></h5>
                        <div class='pt-1'>
                            <small>{{$value->created_at}}</small>
                        </div>
                    </div>
                @endforeach
                <div>{{$data->links()}}</div>
            </div>
        </div>
    </div>
@endsection
