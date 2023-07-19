@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>All goods</h1>

            <div class="row">
                @foreach($products as $product)
                    @include('layouts.card', compact('product'))
                @endforeach

                {{--                <div class="col-sm-6 col-md-4">
                                    <div class="thumbnail">
                                        <img src="https://th.bing.com/th/id/OIP.nP5Di8STBfYAQZW4AIDEzQHaNt?w=115&h=189&c=7&r=0&o=5&dpr=1.3&pid=1.7"
                                             alt="iPhone X 64GB">
                                        <div class="caption">
                                            <h3>iPhone X 64GB</h3>
                                            <p>71990 руб.</p>
                                            <p>
                                                <a href="{{route('basket')}}" class="btn btn-primary"
                                                   role="button">to basket</a>
                                                <a href="{{route('basket')}}"
                                                   class="btn btn-default"
                                                   role="button">...</a>
                                            </p>
                                        </div>
                                    </div>
                                </div>--}}

            </div>
        </div>
    </div>
@endsection