@extends('layouts.master')

@section('content')

    <div class="container">
        category
{{--        <div class="starter-template">
            <h1>Apple {{ $category->name }} ( {{ $category->products->count() }} )</h1>
            <h3>Apple {{ $category->description }}</h3>

            @foreach($category->products as $product)
                @include('layouts.card', compact('product'))
            @endforeach


        </div>--}}
    </div>
@endsection

