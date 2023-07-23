@extends('layouts.master')
@section('content')
    <div class="container">

        <div class="starter-template">
            <h1>{{ $product->name}}</h1>
            <p>price: <b>{{ $product->price}} $</b></p>
            <p>count: <b>{{ $product->count}} $</b></p>
            <img width='150' height='300' src="{{ asset($product->image) }}">
            <p>{{ $product->description}}</p>

            <form action="{{route('basket-add', $product)}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-success">add to basket</button>
            </form>

        </div>
    </div>
@endsection

