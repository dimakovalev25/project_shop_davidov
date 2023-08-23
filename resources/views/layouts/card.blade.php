<div class="product">
    <div class="product_image">
        <img src="{{ asset($product->image) }}" alt="{{$product->__('name')}}">
    </div>
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
    <div class="product_content">
        <div class="product_title">
            <a href="{{route('product', compact('product'))}}">{{$product->__('name')}}</a>
        </div>
        <div class="product_price"><p>{{$product->price}} {{App\Services\CurrencyConversion::getCurrencySymbol()}} </p></div>
        <form method="POST" action="{{route('basket-add', $product)}}">
            @csrf
            <p>

                @if($product->isAvailable())
{{--                <button type="submit" class="button button_light home_button">Add to cart</button>--}}
                    <button  type="submit" class="newsletter_button trans_200"><span>Add to cart</span></button>
                @else
                    <span class="warning">item is out of stock</span>
                @endif
            </p>
        </form>
    </div>
</div>



