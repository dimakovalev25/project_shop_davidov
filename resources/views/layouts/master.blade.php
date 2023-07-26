<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('main.online_shop')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">


    {{--    <script src="{{ asset('js/app.js') }}" defer></script>
        <script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
        <script src="{{ asset('js/jquery.min.js') }}" defer></script>
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">
        <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('css/starter-template.css') }}" rel="stylesheet">--}}

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
</head>
<body>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{route('index')}}">@lang('main.online_shop')</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li @routeactive('index')>
                    <a href="{{route('index')}}">@lang('main.goods')</a>
                </li>
                <li @routeactive('products')>
                    <a href="{{route('categories' )}}">@lang('main.categories')</a>
                </li>
                <li @routeactive('basket')>
                    <a href="{{route('basket')}}">@lang('main.basket')</a>
                </li>
                <li @routeactive('basket')>
                    <a href="{{route('locale', __('main.set_lang'))}}">@lang('main.lang'): @lang('main.set_lang')</a>
                </li>

                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">@lang('main.chosse_curr')<span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        @foreach ($currencies as $currency)
                            <li><a href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a></li>
                        @endforeach
                    </ul>
                </li>
{{--                <li>
                    <div>
                            @csrf
                            <select class="form-select" style="margin-top: 14px" aria-label="Default select example"
                                    name="currency">
                                @foreach($currencies as $currency )
                                    <div>
                                        <option value="{{$currency->id}}">
                                            --}}{{--                                @lang('main.curr'):--}}{{--
                                            {{$currency->code}}

                                        </option>
                                    </div>

                                    <a href="{{route('currency', $currency->code )}}" style="color: red;">Change currency</a>
                                @endforeach
                            </select>

                    </div>
                </li>--}}

            </ul>

            <ul class="nav navbar-nav navbar-right">
                @guest()
                    <li><a href="{{route('login')}}">@lang('main.login')</a></li>
                    <li><a href="{{route('register')}}">@lang('main.register')</a></li>
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