<!DOCTYPE html>
<html lang="en">
<head>
    <title>Apples shop</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Apples shop">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="styles/bootstrap4/bootstrap.min.css">
    <link href="plugins/font-awesome-4.7.0/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.carousel.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/owl.theme.default.css">
    <link rel="stylesheet" type="text/css" href="plugins/OwlCarousel2-2.2.1/animate.css">
    <link rel="stylesheet" type="text/css" href="styles/main_styles.css">
    <link rel="stylesheet" type="text/css" href="styles/responsive.css">

    <link rel="apple-touch-icon" sizes="180x180" href="images/apple-touch-icon.png">
    <link rel="icon" type="image/png" sizes="32x32" href="images//favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="16x16" href="images//favicon-16x16.png">
    <link rel="manifest" href="images/site.webmanifest">

</head>
<body>

<div class="super_container">

    <!-- Header -->

    <header class="header">
        <div class="header_container">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="header_content d-flex flex-row align-items-center justify-content-start">
                            <div class="logo"><a href="{{route('index')}}">Apples shop</a></div>
                            <nav class="main_nav">
                                <ul>

                                    <li @routeactive('basket')>
                                        {{--                <a href="{{route('locale', __('main.set_lang'))}}">@lang('main.lang')
                                                            : @lang('main.set_lang')</a>--}}

                                        <a href="{{route('locale', __('main.set_lang'))}}">@lang('main.l')
                                        </a>
                                    </li>


                                    <li class="hassubs">
                                        <a href="{{route('index' )}}">@lang('main.categories')</a>
                                        <ul>
                                            @foreach($categories as $category)
                                                <li>
                                                    {{--                                                    <a href="{{ route("category", $category->id) }}">{{$category->name}}</a>--}}
                                                    <a href="{{ route("category", $category->id) }}">{{$category->__('name')}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>


                                    <li class="hassubs">
                                        <a href="{{route('index' )}}">@lang('main.chosse_curr')</a>
                                        <ul>
                                            @foreach($currencies as $currency)
                                                <li>
                                                    <a href="{{ route('currency', $currency->code) }}">{{$currency->code}}</a>
                                                </li>
                                            @endforeach
                                        </ul>
                                    </li>

                                    <li class="hassubs">
                                        <a href="{{route('info' )}}">@lang('main.info')</a>
                                        <ul>

                                            <li>
                                                <a href="{{ route("info") }}">@lang('main.pay')</a>
                                            </li>

                                            <li>
                                                <a href="{{ route("info") }}">@lang('main.delivery')</a>
                                            </li>

                                            <li>
                                                <a href="{{ route("info") }}">@lang('main.gar')</a>
                                            </li>

                                        </ul>
                                    </li>

                                </ul>
                            </nav>
                            <div class="header_extra ml-auto">
                                <div class="shopping_cart">
                                    <a href="{{route('basket')}}">
                                        <svg version="1.1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 489 489" style="enable-background:new 0 0 489 489;"
                                             xml:space="preserve">
											<g>
                                                <path d="M440.1,422.7l-28-315.3c-0.6-7-6.5-12.3-13.4-12.3h-57.6C340.3,42.5,297.3,0,244.5,0s-95.8,42.5-96.6,95.1H90.3
													c-7,0-12.8,5.3-13.4,12.3l-28,315.3c0,0.4-0.1,0.8-0.1,1.2c0,35.9,32.9,65.1,73.4,65.1h244.6c40.5,0,73.4-29.2,73.4-65.1
													C440.2,423.5,440.2,423.1,440.1,422.7z M244.5,27c37.9,0,68.8,30.4,69.6,68.1H174.9C175.7,57.4,206.6,27,244.5,27z M366.8,462
													H122.2c-25.4,0-46-16.8-46.4-37.5l26.8-302.3h45.2v41c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h139.3v41
													c0,7.5,6,13.5,13.5,13.5s13.5-6,13.5-13.5v-41h45.2l26.9,302.3C412.8,445.2,392.1,462,366.8,462z"/>
                                            </g>
										</svg>
                                        <div>
                                            {{--                                            <span>@lang('main.basket')</span>--}}
                                        </div>
                                    </a>
                                </div>

                                <div class="search">
                                    <div class="search_icon">
                                        <svg version="1.1" id="Capa_1" xmlns="http://www.w3.org/2000/svg"
                                             xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                             viewBox="0 0 475.084 475.084"
                                             style="enable-background:new 0 0 475.084 475.084;"
                                             xml:space="preserve">
										<g>
                                            <path d="M464.524,412.846l-97.929-97.925c23.6-34.068,35.406-72.047,35.406-113.917c0-27.218-5.284-53.249-15.852-78.087
												c-10.561-24.842-24.838-46.254-42.825-64.241c-17.987-17.987-39.396-32.264-64.233-42.826
												C254.246,5.285,228.217,0.003,200.999,0.003c-27.216,0-53.247,5.282-78.085,15.847C98.072,26.412,76.66,40.689,58.673,58.676
												c-17.989,17.987-32.264,39.403-42.827,64.241C5.282,147.758,0,173.786,0,201.004c0,27.216,5.282,53.238,15.846,78.083
												c10.562,24.838,24.838,46.247,42.827,64.234c17.987,17.993,39.403,32.264,64.241,42.832c24.841,10.563,50.869,15.844,78.085,15.844
												c41.879,0,79.852-11.807,113.922-35.405l97.929,97.641c6.852,7.231,15.406,10.849,25.693,10.849
												c9.897,0,18.467-3.617,25.694-10.849c7.23-7.23,10.848-15.796,10.848-25.693C475.088,428.458,471.567,419.889,464.524,412.846z
												 M291.363,291.358c-25.029,25.033-55.148,37.549-90.364,37.549c-35.21,0-65.329-12.519-90.36-37.549
												c-25.031-25.029-37.546-55.144-37.546-90.36c0-35.21,12.518-65.334,37.546-90.36c25.026-25.032,55.15-37.546,90.36-37.546
												c35.212,0,65.331,12.519,90.364,37.546c25.033,25.026,37.548,55.15,37.548,90.36C328.911,236.214,316.392,266.329,291.363,291.358z
												"/>
                                        </g>

									</svg>
                                        {{--                                        <span>@lang('main.search')</span>--}}
                                    </div>
                                </div>
                                <div class="hamburger"><i class="fa fa-bars" aria-hidden="true"></i></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Search Panel -->
        <div class="search_panel trans_300">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <form method="GET" action="{{route("index")}}">
                            <div class="search_panel_content d-flex flex-row align-items-center justify-content-evenly">

                                <div class="mr-2">
                                    <label for="category_id">@lang('main.categories') </label>
                                </div>

                                <div class="mr-2">
                                    <select name="category_id" id="category_id" class="form-control  search_layout_inp">
                                        <option selected>@lang('main.chosse_cat')</option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>

                                        @endforeach
                                    </select>
                                </div>

                                <div class="mr-2"><label for="price_from">@lang('main.price')@lang('main.for')
                                    </label></div>

                                <div class="mr-2">
                                    <input class="form-control  search_layout_inp" type="text" name="price_from"
                                           id="price_from" size="4"
                                           value="{{ request()->price_from}}">
                                </div>

                                <div class="mr-2"><label for="price_to">@lang('main.to')
                                    </label></div>


                                <div class="mr-2">

                                    <input class="form-control search_layout_inp" type="text" name="price_to"
                                           id="price_to"
                                           size="6"
                                           value="{{ request()->price_to }}">
                                </div>

                                <div class="mr-2">
                                    <label for="hit"></label>
                                    <input type="checkbox" name="hit" id="hit"
                                           @if(request()->has('hit')) checked @endif> @lang('main.hit')
                                </div>

                                <div class="mr-2">
                                    <label for="new"> </label>
                                    <input type="checkbox" name="new" id="new"
                                           @if(request()->has('new')) checked @endif> @lang('main.new')
                                    @lang('main.product') </div>

                                <div class="mr-2">
                                    <button type="submit" class="btn btn-primary">@lang('main.filter')</button>
                                    <a href="{{ route("index") }}" class="btn btn-warning">@lang('main.reset')</a>
                                </div>

                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <!-- Social -->
        <div class="header_social">
            <ul>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </header>

    <!-- Menu -->

    <div class="menu menu_mm trans_300">
        <div class="menu_container menu_mm">
            <div class="page_menu_content">

                <div class="page_menu_search menu_mm">

                    <form method="GET" action="{{route("index")}}">
                        <div class="search_layout">

                            <div class="">
                                <label for="category_id">@lang('main.categories'):
                                </label>
                                <select name="category_id" id="category_id" class="form-control search_layout_inp">
                                    <option value="{{ old('category_id')}}" selected>@lang('main.chosse_cat')</option>

                                </select>
                            </div>


                            <div>

                                <label for="price_from">@lang('main.price')@lang('main.for')
                                </label>
                                <input class="form-control search_layout_inp" type="text" name="price_from"
                                       id="price_from" size="4"
                                       value="{{ request()->price_from}}">
                            </div>

                            <div>
                                <label for="price_to">@lang('main.to')
                                </label>
                                <input class="form-control search_layout_inp" type="text" name="price_to" id="price_to"
                                       size="6"
                                       value="{{ request()->price_to }}">
                            </div>

                            <div class="">
                                <label for="hit"></label>
                                <input type="checkbox" name="hit" id="hit"
                                       @if(request()->has('hit')) checked @endif> @lang('main.hit')

                            </div>


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
                        {{--          <input type="search" required="required" class="page_menu_search_input menu_mm"
                                         placeholder="Search for products...">--}}
                    </form>

                </div>


                <ul class="page_menu_nav menu_mm">

                    <li class="page_menu_item has-children menu_mm">
                        <a href="{{route('categories')}}">@lang('main.categories')<i class="fa fa-angle-down"></i></a>
                        <ul class="page_menu_selection menu_mm">

                            @foreach($categories as $category)
                                <li class="page_menu_item menu_mm"><a
                                            href="{{ route("category", $category->id) }}">{{$category->name}}<i
                                                class="fa fa-angle-down"></i></a></li>

                            @endforeach

                        </ul>
                    </li>
                    <li class="page_menu_item menu_mm"><a href="{{route('index')}}">@lang('main.to_pp')<i
                                    class="fa fa-angle-down"></i></a>
                    </li>
                    <li class="page_menu_item menu_mm"><a href="{{route('basket')}}">@lang('main.basket')<i
                                    class="fa fa-angle-down"></i></a></li>
                    <li class="page_menu_item menu_mm"><a href="{{route('index')}}">@lang('main.info')<i
                                    class="fa fa-angle-down"></i></a></li>
                </ul>
            </div>
        </div>

        <div class="menu_close"><i class="fa fa-times" aria-hidden="true"></i></div>

        <div class="menu_social">
            <ul>
                <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
            </ul>
        </div>
    </div>

    <!-- Home -->

    <div class="home">
        <div class="home_slider_container">

            <!-- Home Slider -->
            <div class="owl-carousel owl-theme home_slider">

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url(images/a1.jpg)"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content" data-animation-in="fadeIn"
                                         data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title"><h2>@lang('main.slider_title')</h2></div>
                                        <div class="home_slider_subtitle"><h3>@lang('main.slider_desc')</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                <div class="owl-item home_slider_item">
                    <div class="home_slider_background" style="background-image:url(images/a2.jpg)"></div>
                    <div class="home_slider_content_container">
                        <div class="container">
                            <div class="row">
                                <div class="col">
                                    <div class="home_slider_content" data-animation-in="fadeIn"
                                         data-animation-out="animate-out fadeOut">
                                        <div class="home_slider_title"><h2>@lang('main.slider_title2')</h2></div>
                                        <div class="home_slider_subtitle"><h3>@lang('main.slider_desc2')</h3>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Slider Item -->
                {{--      <div class="owl-item home_slider_item">
                          <div class="home_slider_background" style="background-image:url(images/a3.jpg)"></div>
                          <div class="home_slider_content_container">
                              <div class="container">
                                  <div class="row">
                                      <div class="col">
                                          <div class="home_slider_content" data-animation-in="fadeIn"
                                               data-animation-out="animate-out fadeOut">
                                              <div class="home_slider_title"><p>@lang('main.slider_desc')</p></div>
                                              <div class="home_slider_subtitle"><p>@lang('main.slider_desc')</p>
                                              </div>
                                              <div class="button button_light home_button"><a href="#">Shop Now</a></div>
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          </div>
                      </div>--}}

            </div>

            <!-- Home Slider Dots -->

            <div class="home_slider_dots_container">
                <div class="container">
                    <div class="row">
                        <div class="col">
                            <div class="home_slider_dots">
                                <ul id="home_slider_custom_dots" class="home_slider_custom_dots">
                                    <li class="home_slider_custom_dot active">01.</li>
                                    <li class="home_slider_custom_dot">02.</li>

                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <!-- Products -->

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div>

                        @if(session()->has('success'))
                            <p class="alert alert-success mb-2">{{session()->get('success')}}</p>
                        @endif

                        @if(session()->has('warning'))
                            <p class="alert alert-warning mb-2">{{session()->get('warning')}}</p>
                        @endif

                        @yield('content')
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Ad -->

    {{--    <div class="avds_xl">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="avds_xl_container clearfix">
                            <div class="avds_xl_background" style="background-image:url(images/avds_xl.jpg)"></div>
                            <div class="avds_xl_content">
                                <div class="avds_title">Amazing Devices</div>
                                <div class="avds_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a
                                    ultricies metus.
                                </div>
                                <div class="avds_link avds_xl_link"><a href="categories.html">See More</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}

    <!-- Icon Boxes -->

    {{--    <div class="icon_boxes">
            <div class="container">
                <div class="row icon_box_row">

                    <!-- Icon Box -->
                    <div class="col-lg-4 icon_box_col">
                        <div class="icon_box">
                            <div class="icon_box_image"><img src="images/icon_1.svg" alt=""></div>
                            <div class="icon_box_title">Free Shipping Worldwide</div>
                            <div class="icon_box_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed
                                    nec molestie.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Icon Box -->
                    <div class="col-lg-4 icon_box_col">
                        <div class="icon_box">
                            <div class="icon_box_image"><img src="images/icon_2.svg" alt=""></div>
                            <div class="icon_box_title">Free Returns</div>
                            <div class="icon_box_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed
                                    nec molestie.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Icon Box -->
                    <div class="col-lg-4 icon_box_col">
                        <div class="icon_box">
                            <div class="icon_box_image"><img src="images/icon_3.svg" alt=""></div>
                            <div class="icon_box_title">24h Fast Support</div>
                            <div class="icon_box_text">
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam a ultricies metus. Sed
                                    nec molestie.</p>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>--}}

    <!-- Newsletter -->

    {{--    <div class="newsletter">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="newsletter_border"></div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="newsletter_content text-center">
                            <div class="newsletter_title">Subscribe to our newsletter</div>
                            <div class="newsletter_text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nullam
                                    a ultricies metus. Sed nec molestie eros</p></div>
                            <div class="newsletter_form_container">
                                <form action="#" id="newsletter_form" class="newsletter_form">
                                    <input type="email" class="newsletter_input" required="required">
                                    <button class="newsletter_button trans_200"><span>Subscribe</span></button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}

    <!-- Footer -->

    <div class="footer_overlay"></div>
    <footer class="footer">
        <div class="footer_background" style="background-image:url(images/footer.jpg)"></div>
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="footer_content d-flex flex-lg-row flex-column align-items-center justify-content-lg-start justify-content-center">
                        <div class="footer_logo"><a href="{{ route('index') }}">Apples shop</a></div>

                        <div class="copyright ml-auto mr-auto">
                            <h4>
                                @lang('main.ip')
                            </h4>
                            <script>document.write(new Date().getFullYear());</script>
                            @lang('main.all_rights')

                        </div>
                        <div class="copyright ml-auto mr-auto">

                            <h5>@lang('main.kovalev')</h5>
                            <a
                                    href="https://www.linkedin.com/in/%D0%B4%D0%BC%D0%B8%D1%82%D1%80%D0%B8%D0%B9-%D0%BA%D0%BE%D0%B2%D0%B0%D0%BB%D1%91%D0%B2-03aa2a241/"
                                    target="_blank">LinkdIn</a>
                        </div>
                    </div>
                </div>
            </div>
    </footer>
</div>

<script src="js/jquery-3.2.1.min.js"></script>
<script src="styles/bootstrap4/popper.js"></script>
<script src="styles/bootstrap4/bootstrap.min.js"></script>
<script src="plugins/greensock/TweenMax.min.js"></script>
<script src="plugins/greensock/TimelineMax.min.js"></script>
<script src="plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="plugins/greensock/animation.gsap.min.js"></script>
<script src="plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="plugins/Isotope/isotope.pkgd.min.js"></script>
<script src="plugins/easing/easing.js"></script>
<script src="plugins/parallax-js-master/parallax.min.js"></script>
<script src="js/custom.js"></script>
</body>
</html>


{{--



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

            --}}
{{--            <div>
                            @auth()
                                @if(Auth::user()->isAdmin())
                                    <p><a class="nav_link" href="/admin/categories">Admin panel</a></p>
                                @else
                                    <p><a class="nav_link" href="{{route('orders.index')}}">My Orders</a></p>
                                @endif
                                <p><a class="nav_link" href="{{route('get-logout')}}">Exit site</a></p>
                            @endauth
                        </div>--}}{{--


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

                --}}
{{--                <div class="">
                                    <label for="hit"></label>
                                    <input type="checkbox" name="hit" id="hit"
                                           @if(request()->has('hit')) checked @endif> @lang('main.hit')

                                </div>--}}{{--


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

</html>--}}
