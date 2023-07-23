<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Online shop</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">Online shop</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @routeactive('index')>
                    <a href="{{route('index')}}">All goods</a>
                </li>
                <li @routeactive('categories')>
                    <a href="/admin/products">Products</a>
                </li>
                <li @routeactive('products')>
                    <a href="{{route('categories' )}}">Categories</a>
                </li>
                <li @routeactive('basket')>
                    <a href="{{route('basket')}}">To basket</a>
                </li>
            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest()
                    <li><a href="{{route('login')}}">Login</a></li>
                    <li><a href="{{route('register')}}">Register</a></li>
                @endguest


                @auth()
                    @if(Auth::user()->isAdmin())
                        <li><a href="/admin/categories">Admin panel</a></li>
                    @else
                        <li><a href="{{route('orders.index')}}">My Orders</a></li>
                    @endif
                    <li><a href="{{route('get-logout')}}">Exit site</a></li>
                @endauth
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    <div class="starter-template">

        @if(session()->has('success'))
            <p class="alert alert-success">{{session()->get('success')}}</p>
        @endif

        @if(session()->has('warning'))
            <p class="alert alert-warning">{{session()->get('warning')}}</p>
        @endif

        @yield('content')
    </div>
</div>


</body>

</html>