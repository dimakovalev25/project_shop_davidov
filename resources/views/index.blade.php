@extends('layouts.master')

@section('content')
    <div class="container">
        <div class="starter-template">
            <h1>All goods</h1>

            <form method="GET" action="{{route("index")}}">

                <div class="main_filters filters row">

                    <div class="col-sm-2 main_filters_categories">
                        <div>
                            <label for="category_id">Categories:
                            </label>
                        </div>
                        <div>
                            <select name="category_id" id="category_id" class="form-control">
                                <option value="{{ old('category_id')}}" selected>Choose categories</option>
                                @foreach($categories as $category )
                                    <option value="{{  $category->id }}"

                                    >{{ $category->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>


                    <div class="main_filters_price">

                        <div class="main_filters_price">
                            <label for="price_from">@lang('main.price')@lang('main.for')
                            </label>
                        </div>

                        <input class="form-control" type="text" name="price_from" id="price_from" size="4"
                               value="{{ request()->price_from}}">

                        <label for="price_to">@lang('main.to')
                        </label>
                        <input class="form-control" type="text" name="price_to" id="price_to" size="6"
                               value="{{ request()->price_to }}">
                    </div>

                    <div class="col-sm-2 col-md-2">
                        <label for="hit">
                            <input type="checkbox" name="hit" id="hit"
                                   @if(request()->has('hit')) checked @endif> @lang('main.hit')
                        </label>
                    </div>

                    <div class="col-sm-2 col-md-2">
                        <label for="new">
                            <input type="checkbox" name="new" id="new"
                                   @if(request()->has('new')) checked @endif> @lang('main.new')
                            @lang('main.product')
                        </label>
                    </div>

                    <div class="col-sm-2 col-md-2">
                        <label for="recommend">
                            <input type="checkbox" name="recommend" id="recommend"
                                   @if(request()->has('recommend')) checked @endif> @lang('main.rec')
                        </label>
                    </div>

                    <div class="col-sm-6 col-md-3">
                        <button type="submit" class="btn btn-primary">@lang('main.filter')</button>
                        <a href="{{ route("index") }}" class="btn btn-warning">@lang('main.reset')</a>
                    </div>


                </div>
            </form>
            <br>
            <br>
            <div class="mh">
                @foreach($products as $product)
                    @include('layouts.card', compact('product'))
                @endforeach

            </div>
        </div>
    </div>
    <div>
        {{$products->links()}}
    </div>
    {{--    {{$products->links('pagination::bootstrap-4')}}--}}
    {{--    {{$products->onEachSide(3)->links()}}--}}
@endsection