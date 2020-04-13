{{--<!DOCTYPE html>
<html>
   <head>
      <title>Bootstrap 模板</title>
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- 引入 Bootstrap -->
<!--       <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet"> -->
<link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">

      <!-- HTML5 Shiv 和 Respond.js 用于让 IE8 支持 HTML5元素和媒体查询 -->
      <!-- 注意： 如果通过 file://  引入 Respond.js 文件，则该文件无法起效果 -->
      <!--[if lt IE 9]>
         <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
         <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
      <![endif]-->

       <!-- jQuery (Bootstrap 的 JavaScript 插件需要引入 jQuery) -->
       <script src="/js/jquery.js"></script>
       <!-- 包括所有已编译的插件 -->
       <script src="/js/bootstrap.min.js"></script>
   </head>
   <body>
    <div class="container-fluid">
        <div class="row row-cols-2 justify-content-center" style="border:1px solid #F00;">
            <div class="col" style="background:#007bff;">
                1111
            </div>
            <div class="col" style="background:#6610f2;">
                2222
            </div>
            <div class="col" style="background:#34ce57;">
                3333
            </div>
            <div class="col" style="background:#ffc107;">
                4444
            </div>
        </div>
    </div>
   </body>
</html>--}}

<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>blog-admin</title>
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon" />
    <link href="/css/blog_admin.css" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/editormd/css/editormd.css" />

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid">
    <div class="main-top">
        <form action="" method="get">
            <span style="position: relative;left: 1600px;">
                <input class="search_content" type="text" name="search_content" value="{{--<?php echo $str;?> --}}">
                <button class="button button_search" name="search" type="submit">搜索</button>
            </span>
        </form>
    </div>
    <div class="main-left">
        <div class="logo"><h3>Z_BLOG</h3></div>
        <ul class="main-left-nav">
            <li style="background-image: url('/img/图标/1225491.png')"><a href="?menu=article"><img src="/img/图标/1158848.png" >&nbsp;&nbsp;全部文章</a></li>
            <li style="background-image: url('/img/图标/12254461.png')"><a><img src="/img/图标/分类.png" >&nbsp;&nbsp;分类导航</a>
                <ul class="second-nav">
                    {{--<?php
                    $rows=$display->cateNav();
                    foreach($rows as $value){
                        echo "<li><a href='?nav={$value["cate_name"]}'>{$value["cate_name"]}</a></li>";
                    }
                    ?>--}}
                </ul>
            </li>
            <li style="background-image: url('/img/图标/1225491.png')"><a href="?menu=comment"><img src="/img/图标/11211.png" >&nbsp;&nbsp;最新评论</a></li>
        </ul>
    </div>
    <div class="main-content">
        <div class="content-display">
            {{--<?php
            $display->article_delete();
            echo $main_display;
            ?>--}}
        </div>
    </div>
    <div class="main-right">
        <div class="avatar"></div>
        <div class="user">
            <table width="260">
                <caption style="margin-bottom: 20px;">当前用户： <b style="color: #51a351;">{{--<?php echo $_SESSION["user_name"]?>--}}</b>&nbsp;&nbsp;<a href="{{--<?php echo $status_url?>--}}" style="color: #e9322d">{{--<?php echo $status_button?>--}}</a></caption>
                <tr><td>文章总数</td><td>评论总数</td><td>文章访问量</td></tr>
                <tr><td>{{--<?php echo $usersection->article_count()?>--}}</td><td>{{--<?php echo $usersection->comment_count()?>--}}</td><td>{{--<?php echo $usersection->article_read()?>--}}</td></tr>
            </table>
        </div>
    </div>

</div>
</body>
</html>
