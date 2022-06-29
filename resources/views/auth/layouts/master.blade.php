<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>@lang('main.admin'): @yield('title')</title>

    {{--    <!-- Scripts -->--}}
    <script src="/js/app.js" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <link href="/css/app.css" rel="stylesheet">
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/admin.css" rel="stylesheet">
</head>
<body>
<div id="app">
    <nav class="navbar navbar-default navbar-expand-md navbar-light navbar-laravel">
        <div class="container">
            <a class="navbar-brand" href="{{route('index')}}">
                @lang('main.main_page')
            </a>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">

                    @admin
                    <li><a href="{{route('categories.index')}}">@lang('main.categories')</a></li>
                    <li><a href="{{route('products.index')}}">@lang('main.product')</a></li>
                    <li><a href="{{route('home')}}">@lang('main.orders')</a></li>
                    @endadmin

                </ul>
                @guest
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('login')}}">@lang('main.login')</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('register')}}">@lang('main.register')</a>
                        </li>
                    </ul>
                @endguest
                @auth
                    <ul class="nav navbar-nav navbar-right">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                               data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false" v-pre>
                                @admin Admin @else {{ Auth::user()->name }} @endadmin
                            </a>

                            <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('logout')}}"
                                   onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                    @lang('main.logout')
                                </a>
                                <form id="logout-form" action="{{ route('logout')}}" method="POST"
                                      style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                    </ul>
                @endauth
            </div>
        </div>
    </nav>

    <div class="py-4">
        <div class="container">
            <div class="row justify-content-center">
                @yield('content')
            </div>
        </div>
    </div>
</div>
</body>
</html>
