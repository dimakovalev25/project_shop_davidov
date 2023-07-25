<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <div class="labels">
            @if($product->isNew())
                <span class="badge badge-success">New product</span>
            @endif
            @if($product->isRecommend())
                <span class="badge badge-warning">Recommend</span>
            @endif
            @if($product->isHit())
                <span class="badge badge-warning">Bestseller</span>
            @endif

        </div>


        <img src="{{ asset($product->image) }}" width='60' height='60' class="img img-responsive"
             alt="{{$product->__('name')}}">
        <div class="caption">
            <h3>{{$product->__('name')}}</h3>
            <h3>{{$product->__('description')}}</h3>
            <p>{{$product->price}} $</p>
            {{--            {{$product->category->name}}--}}
            <p>
                <a href="{{route('product', compact('product'))}}" class="btn btn-primary"
                   role="button">...</a>
            </p>

            <form method="POST" action="{{route('basket-add', $product)}}">
                @csrf
                <p>

                    @if($product->isAvailable())
                        <button type="submit" class="btn btn-primary"
                                role="button">add to basket
                        </button>
                    @else
                        <span class="warning">item is out of stock</span>

                    @endif
                </p>
            </form>
        </div>
    </div>
</div>
