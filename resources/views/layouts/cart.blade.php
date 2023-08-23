@extends('layouts.master')

@section('content')

    @if(is_null($order))
        <div class="starter-template">
            <h1>there are no items in the cart</h1>
            <a href="{{route('index')}}">to products</a>
        </div>
    @else

       {{-- <div class="cart_info">
            <div class="container">
                <div class="row">
                    <div class="col">
                        <!-- Column Titles -->
                        <div class="cart_info_columns clearfix">
                            <div class="cart_info_col cart_info_col_product">Product</div>
                            <div class="cart_info_col cart_info_col_price">Price</div>
                            <div class="cart_info_col cart_info_col_quantity">Quantity</div>
                            <div class="cart_info_col cart_info_col_total">Total</div>
                        </div>
                    </div>
                </div>
                <div class="row cart_items_row">
                    <div class="col">

                        <!-- Cart Item -->
                        <div class="cart_item d-flex flex-lg-row flex-column align-items-lg-center align-items-start justify-content-start">
                            <!-- Name -->
                            <div class="cart_item_product d-flex flex-row align-items-center justify-content-start">
                                <div class="cart_item_image">
                                    <div><img src="images/cart_1.jpg" alt=""></div>
                                </div>
                                <div class="cart_item_name_container">
                                    <div class="cart_item_name"><a href="#">Smart Phone Deluxe Edition</a></div>
                                    <div class="cart_item_edit"><a href="#">Edit Product</a></div>
                                </div>
                            </div>
                            <!-- Price -->
                            <div class="cart_item_price">$790.90</div>
                            <!-- Quantity -->
                            <div class="cart_item_quantity">
                                <div class="product_quantity_container">
                                    <div class="product_quantity clearfix">
                                        <span>Qty</span>
                                        <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                        <div class="quantity_buttons">
                                            <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                            <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- Total -->
                            <div class="cart_item_total">$790.90</div>
                        </div>

                    </div>
                </div>
                <div class="row row_cart_buttons">
                    <div class="col">
                        <div class="cart_buttons d-flex flex-lg-row flex-column align-items-start justify-content-start">
                            <div class="button continue_shopping_button"><a href="#">Continue shopping</a></div>
                            <div class="cart_buttons_right ml-lg-auto">
                                <div class="button clear_cart_button"><a href="#">Clear cart</a></div>
                                <div class="button update_cart_button"><a href="#">Update cart</a></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row_extra">
                    <div class="col-lg-4">

                        <!-- Delivery -->
                        <div class="delivery">
                            <div class="section_title">Shipping method</div>
                            <div class="section_subtitle">Select the one you want</div>
                            <div class="delivery_options">
                                <label class="delivery_option clearfix">Next day delivery
                                    <input type="radio" name="radio">
                                    <span class="checkmark"></span>
                                    <span class="delivery_price">$4.99</span>
                                </label>
                                <label class="delivery_option clearfix">Standard delivery
                                    <input type="radio" name="radio">
                                    <span class="checkmark"></span>
                                    <span class="delivery_price">$1.99</span>
                                </label>
                                <label class="delivery_option clearfix">Personal pickup
                                    <input type="radio" checked="checked" name="radio">
                                    <span class="checkmark"></span>
                                    <span class="delivery_price">Free</span>
                                </label>
                            </div>
                        </div>

                        <!-- Coupon Code -->
                        <div class="coupon">
                            <div class="section_title">Coupon code</div>
                            <div class="section_subtitle">Enter your coupon code</div>
                            <div class="coupon_form_container">
                                <form action="#" id="coupon_form" class="coupon_form">
                                    <input type="text" class="coupon_input" required="required">
                                    <button class="button coupon_button"><span>Apply</span></button>
                                </form>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 offset-lg-2">
                        <div class="cart_total">
                            <div class="section_title">Cart total</div>
                            <div class="section_subtitle">Final info</div>
                            <div class="cart_total_container">
                                <ul>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_total_title">Subtotal</div>
                                        <div class="cart_total_value ml-auto">$790.90</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_total_title">Shipping</div>
                                        <div class="cart_total_value ml-auto">Free</div>
                                    </li>
                                    <li class="d-flex flex-row align-items-center justify-content-start">
                                        <div class="cart_total_title">Total</div>
                                        <div class="cart_total_value ml-auto">$790.90</div>
                                    </li>
                                </ul>
                            </div>
                            <div class="button checkout_button"><a href="#">Proceed to checkout</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>--}}


       <div class="starter-template">
            <h1>Basket</h1>
            <p>order</p>
            <div class="panel">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Full price</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $order->products as $product )
                        <tr>
                            <td>
                                <a href="http://laravel-diplom-1.rdavydov.ru/mobiles/iphone_x_64">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td>
                                <img height="56px"
                                     src="{{ asset($product->image) }}" width='60' height='60'
                                     class="img img-responsive"
                            </td>
                            <td>

                                                           <span class="badge">{{ $product->pivot->count }}</span>
                                <span class="badge">{{ $product->countInOrder }}</span>
                                <div class="btn-group form-inline">

                                    <form method="POST" action="{{route('basket-add', $product)}}">
                                        @csrf
                                        <button class="btn btn-success">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        </button>
                                    </form>

                                    <form method="POST" action="{{route('basket-remove', $product)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                        </button>
                                    </form>


                                </div>
                            </td>
                            <td>{{  $product->price }} {{App\Services\CurrencyConversion::getCurrencySymbol()}}</td>
                            <td>{{ $product->price * $product->countInOrder}} {{App\Services\CurrencyConversion::getCurrencySymbol()}}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="4"><h4> Full price:</h4></td>
                        <td>{{$order->getFullSum()}} {{App\Services\CurrencyConversion::getCurrencySymbol()}} </td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <div class="btn-group pull-right" role="group">
                    <a type="button" class="btn btn-success" href={{route('order')}}>order</a>
                    <hr>
                </div>
            </div>


        </div>

        @if(!$order->hasCoupon())
            <div class="row coupon">

                <div class="form-inline pull-right">
                    <form method="POST" action="{{route('set-coupon')}}">
                        @csrf
                        <label for="coupon">Add coupon:</label>
                        <input class="form-control" type="text" name="coupon">
                        <button type="submit" class="btn btn-success">send coupon</button>
                        @error('coupon')
                        <div class="alert-danger">{{ $message }}</div>
                        @enderror
                    </form>

                </div>
            </div>

        @else
            <h4>you are using a coupon: " {{ $order->coupon->code }} "</h4>

        @endif


    @endif




@endsection


