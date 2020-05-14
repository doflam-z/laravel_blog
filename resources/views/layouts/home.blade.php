<!doctype html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- markdown -->
    <link rel="stylesheet" href="{{ asset('editormd/examples/css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('editormd/css/editormd.preview.css') }}" />

    <!-- Styles -->
    <link rel="stylesheet" type="text/css" href="/css/bootstrap.min.css">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/home.css') }}" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/font.css">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <div class="row w-100">
                <a class="navbar-brand col-sm-3 col-md-5 ml-auto pt-0" href="{{ url('/') }}" style="font-size: 1.6rem;color: #5f5f5f;"> <img src="/image/joker.jpg" style="width: 40px;height: 40px; border-radius: 50%;">
                    Zany
                </a>
                <div class="col-sm-3 col-md-5 mr-auto">
                    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                        <span class="navbar-toggler-icon"></span>
                    </button>

                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <!-- Left Side Of Navbar -->
                        <ul class="navbar-nav mr-auto">

                        </ul>

                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
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
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }} <span class="caret"></span>
                                    </a>

                                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                        <a class="dropdown-item" href="{{ route('logout') }}"
                                           onclick="event.preventDefault();
                                                             document.getElementById('logout-form').submit();">
                                            {{ __('Logout') }}
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            @csrf
                                        </form>
                                    </div>
                                </li>
                            @endguest
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </nav>

    <main class="py-4">
        @yield('content')
    </main>
    <footer class="w-100 border-top" style="height: 130px;">
        <div class="container mt-4">
            <div class="row">
                <div class="col-md-5 ml-auto">-
                    <a href="/about" class="footer_a">About</a>
                </div>
                <div class="col-md-5 mr-auto">
                    <div class="ml-5">
                        <span class="icon-github d-block mb-3 footer_a">&nbsp;<a class="footer_a" href="https://github.com/doflam-z">github</a></span>
                        <span class="icon-blogger2 d-block mb-3 footer_a">&nbsp;<a class="footer_a" href="https://blog.csdn.net/qq_43308140" >CSDN</a></span>
                        <span class="icon-telegram d-block mb-3 footer_a">&nbsp;<a class="footer_a" href="https://web.telegram.org/#/login">telegram</a></span>
                    </div>
                </div>
            </div>
        </div>
    </footer>
</div>

<script src="{{asset('editormd/examples/js/jquery.min.js')}}"></script>
<script src="{{asset('editormd/lib/marked.min.js')}}"></script>
<script src="{{asset('editormd/lib/prettify.min.js')}}"></script>

<script src="{{asset('editormd/lib/raphael.min.js')}}"></script>
<script src="{{asset('editormd/lib/underscore.min.js')}}"></script>
<script src="{{asset('editormd/lib/sequence-diagram.min.js')}}"></script>
<script src="{{asset('editormd/lib/flowchart.min.js')}}"></script>
<script src="{{asset('editormd/lib/jquery.flowchart.min.js')}}"></script>

<script src="{{asset('editormd/editormd.js')}}"></script>
<script type="text/javascript">
    $(function() {
        var testEditormdView, testEditormdView2;

        /*$.get("/test2", function(markdown) {

            testEditormdView = editormd.markdownToHTML("test-editormd-view", {
                markdown        : markdown ,//+ "\r\n" + $("#append-test").text(),
                //htmlDecode      : true,       // 开启 HTML 标签解析，为了安全性，默认不开启
                htmlDecode      : "style,script,iframe",  // you can filter tags decode
                //toc             : false,
                tocm            : true,    // Using [TOCM]
                //tocContainer    : "#custom-toc-container", // 自定义 ToC 容器层
                //gfm             : false,
                //tocDropdown     : true,
                // markdownSourceCode : true, // 是否保留 Markdown 源码，即是否删除保存源码的 Textarea 标签
                emoji           : true,
                taskList        : true,
                tex             : true,  // 默认不解析
                flowChart       : true,  // 默认不解析
                sequenceDiagram : true,  // 默认不解析
            });

            //console.log("返回一个 jQuery 实例 =>", testEditormdView);

            // 获取Markdown源码
            //console.log(testEditormdView.getMarkdown());

            //alert(testEditormdView.getMarkdown());
        });*/

                testEditormdView2 = editormd.markdownToHTML("test-editormd-view2", {
                    htmlDecode      : "style,script,iframe",  // you can filter tags decode
                    emoji           : true,
                    taskList        : true,
                    tex             : true,  // 默认不解析
                    flowChart       : true,  // 默认不解析
                    sequenceDiagram : true,  // 默认不解析
                });
    });
</script>
<script>
$(document).ready(function(){
    $('.cate_list').load("/category");
})
</script>

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

