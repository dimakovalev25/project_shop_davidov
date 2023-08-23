<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@lang('main.online_shop')</title>

    <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

    <script src="/js/jquery.min.js"></script>
    <script src="/js/bootstrap.min.js"></script>
    <link href="/css/bootstrap.min.css" rel="stylesheet">
    <link href="/css/starter-template.css" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&family=Roboto:wght@100&display=swap" rel="stylesheet">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600&family=Roboto:wght@100;700&display=swap" rel="stylesheet">


</head>

<body>

<div class="main_layout">

    <div id="head">

        <div class="main_layout_nav">

            <div class="layout_nav_child">
                <p>
                    <a class="nav_link" href="{{route('index')}}">@lang('main.online_shop')</a>
                </p>
            </div>
            <div class="layout_nav_child">
                <p @routeactive('index')>
                    <a class="nav_link" href="{{route('index')}}">@lang('main.goods')</a>
                </p>
            </div>
            <div class="layout_nav_child">
                <p @routeactive('products')>
                    <a class="nav_link" href="{{route('categories' )}}">News</a>
                </p>
            </div>
            <div class="layout_nav_child">
                <p @routeactive('products')>
                    <a class="nav_link" href="{{route('categories' )}}">@lang('main.categories')</a>
                </p>
            </div>
            <div class="layout_nav_child">
                <p @routeactive('basket')>
                    <a class="nav_link" href="{{route('basket')}}">@lang('main.basket')</a>
                </p>
            </div>
            <div class="layout_nav_child">
                <p @routeactive('basket')>
                    <a class="nav_link" href="{{route('locale', __('main.set_lang'))}}">@lang('main.lang')
                        : @lang('main.set_lang')</a>
                </p>
            </div>
            <div class="layout_nav_child">
                <p class="dropdown">
                    <a class="nav_link" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                       aria-haspopup="true" aria-expanded="false">@lang('main.chosse_curr')<span
                                class="caret"></span></a>
                <ul class="dropdown-menu">
                    @foreach ($currencies as $currency)
                        <li><a class="nav_link"
                               href="{{ route('currency', $currency->code) }}">{{ $currency->symbol }}</a>
                        </li>
                    @endforeach
                </ul>
                </p>
            </div>

            @guest()
                <div class="layout_nav_child">
                    <p><a class="nav_link" href="{{route('login')}}">@lang('main.login')</a></p>
                </div>

                <div class="layout_nav_child">
                    <p><a class="nav_link" href="{{route('register')}}">@lang('main.register')</a></p>
                </div>

            @endguest

            <div>
                @auth()
                    <p><a class="nav_link" href="{{route('get-logout')}}">Exit site</a></p>
                @endauth
            </div>

            {{--            <div>
                            @auth()
                                @if(Auth::user()->isAdmin())
                                    <p><a class="nav_link" href="/admin/categories">Admin panel</a></p>
                                @else
                                    <p><a class="nav_link" href="{{route('orders.index')}}">My Orders</a></p>
                                @endif
                                <p><a class="nav_link" href="{{route('get-logout')}}">Exit site</a></p>
                            @endauth
                        </div>--}}

        </div>

    </div>

    <div id="shop">
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
    </div>

    <div id="search">
        <h3 style="padding-left: 10px">Search product:</h3>

        <form method="GET" action="{{route("index")}}">
            <div class="search_layout">

                <div class="">
                    <label for="category_id">Categories:
                    </label>
                    <select name="category_id" id="category_id" class="form-control search_layout_inp">
                        <option value="{{ old('category_id')}}" selected>Choose categories</option>

                    </select>
                </div>


                <div>

                    <label for="price_from">@lang('main.price')@lang('main.for')
                    </label>
                    <input class="form-control search_layout_inp" type="text" name="price_from" id="price_from" size="4"
                           value="{{ request()->price_from}}">
                </div>

                <div>
                    <label for="price_to">@lang('main.to')
                    </label>
                    <input class="form-control search_layout_inp" type="text" name="price_to" id="price_to" size="6"
                           value="{{ request()->price_to }}">
                </div>

                {{--                <div class="">
                                    <label for="hit"></label>
                                    <input type="checkbox" name="hit" id="hit"
                                           @if(request()->has('hit')) checked @endif> @lang('main.hit')

                                </div>--}}

                <div class="">
                    <label for="new"> </label>
                    <input type="checkbox" name="new" id="new"
                           @if(request()->has('new')) checked @endif> @lang('main.new')
                    @lang('main.product')

                </div>

                <div class="">
                    <label for="recommend"> </label>
                    <input type="checkbox" name="recommend" id="recommend"
                           @if(request()->has('recommend')) checked @endif> @lang('main.rec')

                </div>

                <div class="">
                    <button type="submit" class="btn btn-primary">@lang('main.filter')</button>
                    <a href="{{ route("index") }}" class="btn btn-warning">@lang('main.reset')</a>
                </div>


            </div>
        </form>
    </div>

    <div id="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-6"><p>Categories</p>
                    <ul>
                        @foreach($categories as $category)
                            <li><a href="{{ route('category', $category->id) }}">{{ $category->__('name') }}</a></li>
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-6"><p>The most popular products</p>
                    <ul>
                        @foreach ($bestProducts as $bestProduct)
                            <li><a href="{{ route('product', $bestProduct->id) }}">{{ $bestProduct->name }}</a></li>
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
    </div>

</div>


</body>

</html>