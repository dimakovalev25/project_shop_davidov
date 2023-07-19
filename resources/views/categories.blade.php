@extends('master')

@section('content')
@foreach($categories as $category)
    <div class="container">
        <div class="starter-template">
            <div class="panel">
                <a href="/categories/iphone">
                    <img src="data:image/png;base64,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">

                </a>
                <h3>
                <a href="/categories/{{$category->name}}">{{$category->name}}</a>
                </h3>
                <p>
                    {{$category->description}}
                </p>

            </div>
        </div>
    </div>
@endforeach

@endsection