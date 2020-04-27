{{--后台页面父模板--}}
    <!DOCTYPE html>
<html lang="zh-CN">
{{--<head>
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
</head>--}}
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/jquery-3.2.1.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/ajax.js') }}"></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="/editormd/css/editormd.css" />
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="stylesheet" type="text/css" href="/css/font.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

</head>
<body>

    <nav class="navbar navbar-dark fixed-top bg-dark flex-md-nowrap p-0 shadow">
        <a class="navbar-brand col-sm-3 col-md-1 mr-0 pl-4 text-center" href="/admin" style="color: #eaeaea;font-size: 1.3rem;padding: 0.4rem 0;">Z Blog</a>
        <a class="edit col-sm-3 col-md-1 text-right" href="/article/edit"><span class="icon-pencil2">&nbsp;写博客</span></a>
        <input class="form-control form-control-dark w-100" type="text" name="search_content" placeholder="Enter Search" aria-label="Search" form="search">
        <form id="search" action="/admin/search" method="post" style="display: none;">
            @csrf
        </form>
{{--        <ul class="navbar-nav px-3">
            <li class="nav-item text-nowrap">
                <a class="nav-link" href="/article/edit"><span class="icon-pencil2">&nbsp;写博客</span></a>
            </li>
        </ul>--}}
    <!-- Right Side Of Navbar -->
        <ul class="navbar-nav mx-2 text-center">
            <!-- Authentication Links -->
            @guest
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @if (Route::has('register'))
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                    </li>
                @endif
            @else
                <li class="nav-item dropdown">
{{--
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>
--}}

{{--                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">--}}
                        <a class="edit" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
{{--                    </div>--}}
                </li>
            @endguest
        </ul>
    </nav>

<div class="container-fluid wh" >
    {{--    <div class="container">--}}
    <div class="row wh">
        {{--左侧导航--}}
        <nav class="ajax col-md-2 d-none d-md-block sidebar px-0 wh">
            <div class="sidebar-sticky col-md-2 wh" style="padding: 44px 0 0 0;position: fixed">
                <ul class="nav flex-column wh pt-4"style="background-color: #343a40;">
                    <li class="nav-item"><a class="nav-link nav-left admin_article" href="/admin"><span class="icon-home">&nbsp文章管理</span></a></li>
                    <li class="nav-item"><a class="nav-link nav-left admin_comment" href="/admin/comment"><span class="icon-bubbles3">&nbsp评论管理</span></a></li>
                    <li class="nav-item"><a class="nav-link nav-left admin_cate" href="/admin/cate"><span class="icon-menu">&nbsp分类管理</span></a></li>
                    <li class="nav-item"><a class="nav-link nav-left admin_user" href="/admin/user"><span class="icon-users">&nbsp用户管理</span></a></li>
                    <li class="nav-item"><a class="nav-link nav-left admin_draft" href="/admin/draft"><span class="icon-bin">&nbsp草稿箱</span></a></li>
                    {{--<li class="nav-item"><a class="nav-link nav-left" href="#"><span class="icon-bin2">&nbsp&nbsp回收站</span></a></li>--}}
                    {{--<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>--}}
                </ul>
            </div>
        </nav>
        {{--左侧导航--}}

        {{-- 中间主体内容--}}
        <div class="col-md-8 px-4" style="padding-top: 48px;">
            <div class="main h-100">
                <div class="main-content px-3 border-right h-100 ajax">
                    @yield('main_content')
                </div>
            </div>
        </div>
        {{-- 中间主体内容--}}

        {{--右侧信息框--}}
        <div class="ajax flex-column col-md-2 d-none d-md-block w-100 h-100  pt-3">
            <div class="pt-5" style="position: fixed;top: 5rem;">
                <div class="user w-100">
{{--                    <img src="/image/头像.jpg" alt="">--}}
{{--                    <span style="font-size: 1.2rem;">{{ Auth::user()->name }}</span>--}}
                    <small><table class="text-center my-4 w-100">
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
        {{--右侧信息框--}}
    </div>
</div>
</body>
</html>
