@extends('layouts.master')
@section('content')
    <div class="container">

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
    </div>
@endsection

