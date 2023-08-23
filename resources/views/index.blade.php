@extends('layouts.master')


{{--не юзаеться!!!!!--}}

@section('content')
{{--    <div>
        @foreach($products as $product)
            @include('layouts.card', compact('product'))
        @endforeach

    </div>
    <div style="border: #0b2e13 4px solid">
    {{$products->links()}}

    </div>--}}
{{--    <div>
        {{$products->links()}}
    </div>--}}
   {{--     {{$products->links('pagination::bootstrap-4')}}--}}
    {{--    {{$products->onEachSide(3)->links()}}--}}
@endsection