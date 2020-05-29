<!doctype html>
{{--<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">--}}
<html lang="zh-CN">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Zany') }}</title>

    <!-- Scripts -->
    <script src="/js/jquery-3.2.1.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/home.js') }}" defer></script>

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
    <link href="{{ asset('css/font.css') }}" rel="stylesheet">
{{--    <link rel="styles heet" type="text/css" href="/css/font.css">--}}
</head>
<body>
<div id="app">
    <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
        <div class="container">
            <div class="row w-100">
                <a class="navbar-brand col-9 col-md-5 ml-auto pt-0" href="{{ url('/') }}" style="font-size: 1.6rem;color: #5f5f5f;"> <img src="/image/joker.jpg" style="width: 40px;height: 40px; border-radius: 50%;">
                    Zany
                </a>
                <div class="col-2 col-md-5 mr-auto">
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
                <div class="col-12 col-md-5 ml-auto mb-2">
                    <span class=""><a href="/" class="d-block footer_a mb-1">Zany</a></span>
                    <span><a href="/about" class="d-block footer_a">About</a></span>
                </div>
                <div class="col-12 col-md-5 mr-auto">
                    <div class="">
                        <span class="icon-github d-block mb-3 footer_a">&nbsp;<a class="footer_a" href="https://github.com/doflam-z">Github</a></span>
                        <span class="icon-blogger2 d-block mb-3 footer_a">&nbsp;<a class="footer_a" href="https://blog.csdn.net/qq_43308140" >CSDN</a></span>
                        <span class="icon-telegram d-block mb-3 footer_a">&nbsp;<a class="footer_a" href="https://web.telegram.org/#/login">Telegram</a></span>
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

</body>
</html>

