@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>All goods</h1>
            <form method="GET" action="{{route("index")}}">
                <div class="filters row">
                    <div class="col-sm-6 col-md-3">
                        <label for="price_from">Price for
                            <input type="text" name="price_from" id="price_from" size="6" value="{{ request()->price_from}}">
                        </label>
                        <label for="price_to">to
                            <input type="text" name="price_to" id="price_to" size="6"  value="{{ request()->price_to }}">
                        </label>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <label for="hit">
                            <input type="checkbox" name="hit" id="hit" @if(request()->has('hit')) checked @endif> Hit
                        </label>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <label for="new">
                            <input type="checkbox" name="new" id="new" @if(request()->has('new')) checked @endif> New product
                        </label>
                    </div>
                    <div class="col-sm-2 col-md-2">
                        <label for="recommend">
                            <input type="checkbox" name="recommend" id="recommend" @if(request()->has('recommend')) checked @endif> Reccomend
                        </label>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route("index") }}" class="btn btn-warning">Reset filter</a>
                    </div>
                </div>
            </form>
            <br>
            <br>
            <div class="row">
                @foreach($products as $product)
                    @include('layouts.card', compact('product'))
                @endforeach

            </div>
        </div>
    </div>
    {{$products->links('pagination::bootstrap-4')}}
@endsection