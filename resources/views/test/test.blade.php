{{--
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
--}}
{{--    <link rel="stylesheet" type="text/css" href="/css/style.css">--}}{{--

    <link rel="stylesheet" type="text/css" href="/css/font.css">

    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
--}}
{{--    <script src="/js/ajax.js"></script>--}}{{--



    <title>Z_Blog</title>
</head>

<body>

--}}
{{--<section id='container'>
    <noscript>
        ... ...
    </noscript>

    <ul class="menu">
        <li><a href="/page1">page1</a></li>
        <li><a href="/page2">page2</a></li>
        <li><a href="/page3">page3</a></li>
    </ul>

    <div class="content">
        默认文字
    </div>
</section>

<div>
    <form action="/page1" method="post">
        <input type="text" name="test1post">
        <input type="submit" value="submit">
    </form>
</div>--}}{{--


<script>
    $(document).ready(function(){

        function anchorClick(link) {
            // var linkSplit = link.split('/').pop();
            $.post(link, {ajax:"1"}, function(data) {
                $('.main-content').html(data);
            });
        }

        $('.ajax').on('click', 'a', function(event) {
            window.history.pushState(null, null, $(this).attr('href'));
            anchorClick($(this).attr('href'));
            event.preventDefault();
            // event.stopPropagation()
        });

        window.addEventListener('popstate', function(e) {
            let url=location.pathname + location.search;
            anchorClick(url);
        });
    });

</script>

<div class="main-content">
    <!-- 具体的内容 -->
    @foreach($data as $value)
        <div class='box_content px-2 py-4 border-bottom'><h5><a href='/article/edit/?table=Article&id={{$value->id}}'>{{$value->article_title}}</a></h5>
            <div class='pt-3'>
                <small><span class='span icon-clock2'>{{date('Y年m月d日',$value->article_time)}}</span></small>
                <small><span class='span icon-eye'><small>{{$value->article_views}}</small></span></small>
                <small><span class='span icon-bubble2'><small>{{$value->comment_num}}</small></span></small>
                <div class='manage_button float-right'>
                    <a href="/article/read?id={{$value->id}} " >查看</a> | <a href="/article/delete/?id={{$value->id}}" onclick="javascript:return p_del()" style="color: #e9322d">删除</a>
                </div>
            </div>
        </div>
    @endforeach
</div>

<!-- 分页 -->
<div class="ajax page ajax-page">
--}}
{{--    {{ $data->render() }}--}}{{--

    <div class="mt-4">{{$data->links()}}</div>
</div>

--}}
{{--<script>
    $('.ajax-page .pagination').find('a').each(function(e){
        let page=$(this).attr('href').split('?')[1];
        // $(this).removeAttr('href'); // 干掉href属性
        $(this).attr('href',"javascript:;"); // 更改href属性
        $(this).attr("onclick", "javascript:AjaxPage(\"" + page + "\")"); // 新增onclick事件
    });
</script>

<script>
    let url = "/page1?";
    function AjaxPage(page) {
        $.get(url + page, function (data) {
            $('div.content').html(data);
        })
    }
</script>--}}{{--



</body>
</html>
--}}
    <!doctype html>
<html lang="zh-CN">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
<div>Test!</div>
</body>
</html>
