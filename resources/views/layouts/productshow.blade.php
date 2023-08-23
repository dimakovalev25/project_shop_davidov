@extends('layouts.master')

@section('content')
    <div class="product_details">
        <div class="container">
            <div class="row details_row">

                <!-- Product Image -->
                <div class="col-lg-6">
                    <div class="details_image">
                        <div class="details_image_large">
                            <img src="{{ asset($product->image) }}">
                            @if($product->isNew())
                                <div class="product_extra product_new">
                                    <a href="categories.html">New</a>
                                </div>
                            @endif
                            @if($product->isRecommend())
                                <div class="product_extra product_sale">
                                    <a href="categories.html">Sale</a>
                                </div>
                            @endif
                            @if($product->isHit())
                                <div class="product_extra product_hot">
                                    <a href="categories.html">Hit</a>
                                </div>
                            @endif
                        </div>
                        {{--                            <div class="details_image_thumbnails d-flex flex-row align-items-start justify-content-between">
                                                        <div class="details_image_thumbnail active" data-image="images/details_1.jpg"><img src="images/details_1.jpg" alt=""></div>
                                                        <div class="details_image_thumbnail" data-image="images/details_2.jpg"><img src="images/details_2.jpg" alt=""></div>
                                                        <div class="details_image_thumbnail" data-image="images/details_3.jpg"><img src="images/details_3.jpg" alt=""></div>
                                                        <div class="details_image_thumbnail" data-image="images/details_4.jpg"><img src="images/details_4.jpg" alt=""></div>
                                                    </div>--}}
                    </div>
                </div>

                <!-- Product Content -->
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name">{{$product->name}}</div>
                        <div class="details_discount"></div>
                        <div class="details_price">{{$product->price}} {{App\Services\CurrencyConversion::getCurrencySymbol()}}</div>

                        <!-- In Stock -->
                        <div class="in_stock_container">
                            <span>count: {{$product->count}}</span>
                        </div>
                        <div class="details_text">
                            <p>{{$product->description}}.</p>
                        </div>

                        <!-- Product Quantity -->
                        <div class="product_quantity_container">
                            {{--   <div class="product_quantity clearfix">
                                   <span>Qty</span>
                                   <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                   <div class="quantity_buttons">
                                       <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up" aria-hidden="true"></i></div>
                                       <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down" aria-hidden="true"></i></div>
                                   </div>
                               </div>--}}
                            <div class="button cart_button"><a href="#">Add to cart</a></div>
                        </div>

                        <!-- Share -->
                        {{--       <div class="details_share">
                                   <span>Share:</span>
                                   <ul>
                                       <li><a href="#"><i class="fa fa-pinterest" aria-hidden="true"></i></a></li>
                                       <li><a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a></li>
                                       <li><a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a></li>
                                       <li><a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
                                   </ul>
                               </div>--}}
                    </div>
                </div>
            </div>

            {{--   <div class="row description_row">
                   <div class="col">
                       <div class="description_title_container">
                           <div class="description_title">Description</div>
                           <div class="reviews_title"><a href="#">Reviews <span>(1)</span></a></div>
                       </div>
                       <div class="description_text">
                           <p>Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt ut labore et dolore magna aliquyam erat, sed diam voluptua. Phasellus id nisi quis justo tempus mollis sed et dui. In hac habitasse platea dictumst. Suspendisse ultrices mauris diam. Nullam sed aliquet elit. Mauris consequat nisi ut mauris efficitur lacinia.</p>
                       </div>
                   </div>
               </div>--}}
        </div>
    </div>

    {{--  <div class="container">
   <div class="starter-template">
           <h1>{{ $product->name}}</h1>
           <p>price: <b>{{ $product->price}} $</b></p>
           <p>count: <b>{{ $product->count}} $</b></p>
           <img width='150' height='300' src="{{ asset($product->image) }}">
           <p>{{ $product->description}}</p>


           @if($product->isAvailable())
               <form action="{{route('basket-add', $product)}}" method="POST">
                   @csrf
                   <button type="submit" class="btn btn-success">add to basket</button>
               </form>

           @else
               <form action="{{route('subscription', $product)}}" method="POST">
                   @csrf
                   <div>
                       <span>notify when goods are in stock</span>
                   </div>
                   <div>
                       <input type="text" name="email" id="email">
                   </div>
                   <br>
                   <button type="submit" class="btn btn-success">send email</button>
               </form>
           @endif


       </div>
    </div>--}}
@endsection

