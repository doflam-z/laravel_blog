{{--后台页面父模板--}}
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/font.css">

    <script src="/js/jquery.js"></script>
    <script src="/js/bootstrap.min.js"></script>
{{--    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>--}}


    <title>Z_Blog</title>
</head>
<body>
<div class="content">
    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow position-fixed">
        <a class="navbar-brand col-sm-3 col-md-2 mr-0 px-3" href="#" style="color: #eaeaea;font-size: 1.4rem;padding: 0.5rem 0;">Z Blog</a>
        <input class="form-control form-control-dark w-100" type="text" placeholder="Enter Search" aria-label="Search">
        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="/article/edit"><span class="icon-pencil2">&nbsp;写博客</span></a>
            </li>
        </ul>
    </nav>
    <div class="container-fluid w-100 h-100" style="padding: 0">
        <div class="row w-100 h-100 m-0">
            <nav class="nav flex-column col-md-2 d-none d-md-block pt-4 pr-0 w-100 h-100" style="background-color: #343a40;">
                <a class="nav-link nav-left" href="/admin"><span class="icon-home">&nbsp&nbsp文章管理</span></a>
                <a class="nav-link nav-left" href="/admin/comment"><span class="icon-bubbles3">&nbsp&nbsp评论管理</span></a>
                <a class="nav-link nav-left" href="/admin/cate"><span class="icon-menu">&nbsp&nbsp分类管理</span></a>
                <a class="nav-link nav-left" href="/admin/user"><span class="icon-users">&nbsp&nbsp用户管理</span></a>
                <a class="nav-link nav-left" href="/admin/draft"><span class="icon-bin">&nbsp&nbsp草稿箱</span></a>
                <a class="nav-link nav-left" href="/admin/recycle"><span class="icon-bin2">&nbsp&nbsp回收站</span></a>
                {{--                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>--}}
            </nav>
            <div class="col-md-8  w-100 px-4">
                <div class="main w-100">
                    <div class="main-content px-3 ">
                        @yield('main_content')
                    </div>
                </div>
            </div>
            <div class="flex-column col-md-2 d-none d-md-block w-100 h-100 border-left pt-3">
                <div class="user w-100 h-25 mt-5">
                    <img src="/image/头像.jpg" alt="">
                    <span>&nbsp Doflamingozzz</span>
                    <small><table class="text-center mt-4 w-100">
                        <thead>
                        <tr>
                            <th>文章数</th>
                            <th>阅读数</th>
                            <th>评论数</th>
                            <th>用户数</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>415</td>
                            <td>625</td>
                            <td>21</td>
                            <td>2</td>
                        </tr>
                        </tbody>
                    </table>
                    </small>
                </div>
                <div class="article_list">
                    <span style="border-left: 10px solid #4141AA;padding-left: 5px"><small>最近文章</small></span>
                        @foreach($article_list as $value)
                            <li class="list-group-item border-0 p-1"><small><a href="/article/read/?id={{$value->id}}">{{$value->article_title}}</a></small></li>
                        @endforeach

                </div>
            </div>
        </div>
    </div>

</div>
</body>
</html>
