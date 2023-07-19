<div class="col-sm-6 col-md-4">
    <div class="thumbnail">
        <img src="https://th.bing.com/th/id/OIP.nP5Di8STBfYAQZW4AIDEzQHaNt?w=115&h=189&c=7&r=0&o=5&dpr=1.3&pid=1.7"
             alt="{{$product->name}}">
        <div class="caption">
            <h3>{{$product->name}}</h3>
            <p>{{$product->price}} $</p>
            {{$product->category->name}}
                <p>
                    <a href="{{route('product', compact('product'))}}" class="btn btn-primary"
                       role="button">...</a>
                </p>

            <form method="POST" action="{{route('basket-add', $product)}}">
                @csrf
                <p>
                    <button type="submit" class="btn btn-primary"
                       role="button">add to basket</button>
                </p>
            </form>
        </div>
    </div>
</div>
