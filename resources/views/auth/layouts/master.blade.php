<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="ksSuYKnA4EytAfis4gZ1z98TxO8rZRWX5zGgktba">

    <title>Admin panel: @yield('title')</title>

    <!-- Scripts -->
    <script src="http://laravel-diplom-1.rdavydov.ru/js/app.js" defer></script>

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
                Return back site!
            </a>

            <div id="navbar" class="collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    @guest()
                        <li><a href="{{route('categories.index')}}">Category</a></li>
                        <li><a href="{{route('products.index')}}">Products</a></li>
                    @endguest

                    @auth()
                            @if(Auth::user()->isAdmin())
                                <li><a href="{{route('home')}}">All orders</a></li>
                                <li >
                                    <a href="/admin/products">Products</a>
                                </li>
                                <li>
                                    <a href="/admin/categories">Categories</a>
                                </li>
                                <li>
                                    <a href="/admin/properties">Properties</a>
                                </li>
                                <li>
                                    <a href="/admin/property_options">Property Options</a>
                                </li>
                            @else
                                <li><a href="{{route('orders.index')}}">My Orders</a></li>
                            @endif

                    @endauth
                </ul>

                <ul class="nav navbar-nav navbar-right">
                    @auth()
                        <li><a href="{{route('get-logout')}}">Exit site</a></li>
                    @endauth
{{--                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('login') }}">Enter</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('register') }}">Register</a>
                    </li>--}}
                </ul>
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
</div>
</div>
</body>
</html>
