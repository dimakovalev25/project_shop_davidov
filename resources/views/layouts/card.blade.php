<div  class="product">
    <div class="product_image">
        <img src="{{ asset($product->image) }}" alt="{{$product->__('name')}}">
{{--        <img src="{{ Storage::url('images/thumbnail/'.$product->image) }}" alt="{{$product->__('name')}}">--}}
    </div>
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

{{--    1692979888230420090623721757--}}

    <div class="product_content">
        <div class="product_title">
            <a href="{{route('product', compact('product'))}}">{{$product->__('name')}}</a>

        </div>
        <div class="">
            <h6 href="{{route('product', compact('product'))}}">{{$product->__('description')}}</h6>

        </div>
        <div class="product_price"><p @if($product->isRecommend())
                                          style="color: red"
                    @endif>{{$product->price}} {{App\Services\CurrencyConversion::getCurrencySymbol()}} </p></div>

    </div>
    <form method="POST" action="{{route('basket-add', $product)}}">
        @csrf


        @if($product->isAvailable())
            {{--                <button type="submit" class="button button_light home_button">Add to cart</button>--}}
            {{--                    <button  type="submit" class="newsletter_button trans_200"><span>Add to cart</span></button>--}}
            <button type="submit" class="newsletter_button"><span>@lang('main.Add_to_cart')</span></button>
        @else
            <span class="warning">item is out of stock</span>
        @endif

    </form>
</div>



