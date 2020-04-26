{{--后台页面父模板--}}
<!DOCTYPE html>
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="/editormd/css/editormd.css" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/font.css">

    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="/js/popper.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <script src="/js/ajax.js"></script>


    <title>Z_Blog</title>
</head>
<body>
    <form action="/admin/search" method="post">
        <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
            <a class="navbar-brand col-sm-3 col-md-2 mr-0 pl-4" href="/admin" style="color: #eaeaea;font-size: 1.3rem;padding: 0.4rem 0;">Z Blog</a>
            <input class="search form-control form-control-dark w-100" type="text" name="search_content" placeholder="Enter Search" aria-label="Search">
            <ul class="navbar-nav px-3">
                <li class="nav-item text-nowrap">
                    <a class="nav-link" href="/article/edit"><span class="icon-pencil2">&nbsp;写博客</span></a>
                </li>
            </ul>
        </nav>
    </form>
    <div class="container-fluid wh" >
        <div class="row wh">
            <nav class="ajax col-md-2 d-none d-md-block sidebar px-0 wh">
                <div class="sidebar-sticky col-md-2 wh" style="padding: 44px 0 0 0;position: fixed">
                    <ul class="nav flex-column wh pt-4"style="background-color: #343a40;">
                        <li class="nav-item"><a class="nav-link nav-left admin_article" href="/admin"><span class="icon-home">&nbsp&nbsp文章管理</span></a></li>
                        <li class="nav-item"><a class="nav-link nav-left admin_comment" href="/admin/comment"><span class="icon-bubbles3">&nbsp&nbsp评论管理</span></a></li>
                        <li class="nav-item"><a class="nav-link nav-left admin_cate" href="/admin/cate"><span class="icon-menu">&nbsp&nbsp分类管理</span></a></li>
                        <li class="nav-item"><a class="nav-link nav-left admin_user" href="/admin/user"><span class="icon-users">&nbsp&nbsp用户管理</span></a></li>
                        <li class="nav-item"><a class="nav-link nav-left admin_draft" href="/admin/draft"><span class="icon-bin">&nbsp&nbsp草稿箱</span></a></li>
{{--                        <li class="nav-item"><a class="nav-link nav-left" href="#"><span class="icon-bin2">&nbsp&nbsp回收站</span></a></li>--}}
                        {{--                <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>--}}
                    </ul>
                </div>
            </nav>
            <div class="col-md-8 px-4" style="padding-top: 48px;">
                <div class="main h-100">
                    <div class="main-content px-3 border-right h-100 ajax">
                        @yield('main_content')
                    </div>
                </div>
            </div>
            <div class="ajax flex-column col-md-2 d-none d-md-block w-100 h-100  pt-3">
                <div class="pt-5" style="position: fixed">
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
                            <tbody class="info">
                            </tbody>
                        </table>
                        </small>
                    </div>
                    <div class="mt-4 text-left">
                        <span style="border-left: 10px solid #4141AA;"><small>最近文章</small></span>
                        <ul class="article_list pl-0"></ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
