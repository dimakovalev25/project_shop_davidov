@extends('master')
@section('content')
<div class="container">

    <div class="starter-template">
        <h1>{{ $product->name}}</h1>
        <p>price: <b>{{ $product->price}} $</b></p>
        <img src="https://th.bing.com/th/id/OIP.nP5Di8STBfYAQZW4AIDEzQHaNt?w=115&h=189&c=7&r=0&o=5&dpr=1.3&pid=1.7">
        <p>{{ $product->description}}</p>
        <p>{{ $product->category->name}}</p>
        <a class="btn btn-success" href="{{route('basket')}}">add to basket</a>
    </div>
</div>
@endsection

