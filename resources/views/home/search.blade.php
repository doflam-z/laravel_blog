@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row w-100">
            <div class="col-md-10 m-auto">
                <h3 class=" pb-1 px-2">标题包含<span style="color: #6364C1">{{$str}}</span></h3>
                @foreach($data as $value)
                    <div class='article_title px-2 py-3'>
                        <h5><a href='/read?id={{$value->id}}'>{{$value->article_title}}</a></h5>
                        <div class='pt-1'>
                            <small>{{date('Y-m-d',$value->article_time)}}</small>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
