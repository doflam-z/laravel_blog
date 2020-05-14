<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="//cdn.bootcss.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="container" style="margin-top: 100px">
    <div class="col-md-10 col-md-offset-1">
        <h2>{{$post->title}}</h2>
        <h4>{{$post->content}}</h4>
        <hr>
        @if($comments !== '')
        @include('comments.list',['collections'=>$comments['root']])
        @endif

        <h3>留下您的评论</h3>
{{--        @include('comments.form',['parentId'=> null ])--}}
        <form method="POST" action="{{url('post/'.$post->id.'/comments')}}" accept-charset="UTF-8">
            {{csrf_field()}}
            <div class="form-group">
                <label for="body" class="control-label">Info:</label>
                <textarea id="body" name="body"  class="form-control" required="required"></textarea>
            </div>
            <button type="submit" class="btn btn-success">回复</button>
        </form>
    </div>
</div>
<script type="text/javascript" src="http://libs.baidu.com/jquery/1.8.3/jquery.min.js"></script>
<script type="text/javascript">
    $(function(){
        reply=function($id){
            if($('#reply'+$id ).is(':hidden')){
                $('#reply'+$id).fadeIn(500);
                $('#click_event'+$id).text('取消回复');
            }
            else{
                $('#reply'+$id).fadeOut(200);
                $('#click_event'+$id).text('回复');
            }
        }
    })
</script>

</body>
</html>
