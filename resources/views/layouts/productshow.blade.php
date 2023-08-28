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
                                    <a href="categories.html">@lang('main.new')</a>
                                </div>
                            @endif
                            @if($product->isRecommend())
                                <div class="product_extra product_sale">
                                    <a href="categories.html">@lang('main.sale')</a>
                                </div>
                            @endif
                            @if($product->isHit())
                                <div class="product_extra product_hot">
                                    <a href="categories.html">@lang('main.sale')</a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="details_content">
                        <div class="details_name">{{$product->name}}</div>
                        <div class="details_discount"></div>
                        <div class="details_price">{{$product->price}} {{App\Services\CurrencyConversion::getCurrencySymbol()}}</div>

                        <div class="in_stock_container">
                            <span>@lang('main.qt'): {{$product->count}}</span>
                        </div>
                        <div class="details_text">
                            <p>{{$product->description}}.</p>
                        </div>
                        <div class="details_text">
                            <p>@lang('main.garanty12')</p>
                        </div>

                        <div class="product_quantity_container">
                            <form method="POST" action="{{route('basket-add', $product)}}">
                                @csrf
                                <p>

                                    @if($product->isAvailable())
                                        <button  type="submit" class="newsletter_button trans_200"><span>@lang('main.Add_to_cart')</span></button>
                                    @else
                                        <span class="warning">@lang('main.item_out')</span>
                                    @endif
                                </p>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

