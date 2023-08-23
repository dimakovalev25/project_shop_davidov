@extends('layouts.master')

@section('content')

        <div class="product_grid">

            @foreach($products as $product)
                @include('layouts.card', compact('product'))
            @endforeach

        </div>

        <div>
            {{$products->links()}}
        </div>


    {{--    {{$products->links('pagination::bootstrap-4')}}--}}
    {{--    {{$products->onEachSide(3)->links()}}--}}
@endsection