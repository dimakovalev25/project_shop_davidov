@extends('layouts.master')

@section('content')

    @if(is_null($order))
        <div class="starter-template">
            <h1>@lang('main.clear_cart')</h1>
            <a href="{{route('index')}}">@lang('main.to_pp')</a>
        </div>

    @else
        <div class="starter-template">
            <div class="panel">

                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>@lang('main.name')</th>
                            <th>@lang('main.desc')</th>
                            <th>@lang('main.qt')</th>
                            <th>@lang('main.price')</th>
                            <th>@lang('main.full')</th>
                        </tr>
                        </thead>
                        <tbody>

                        @foreach( $order->products as $product )
                            {{--                        @php
                                                        dd($order->products->count())
                                                    @endphp--}}
                            <tr>
                                <td>
                                    <a href="">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td>
                                    <span class="badge">{{ $product->countInOrder }}</span>
                                    <div class="btn-group form-inline">

                                        <form method="POST" action="{{route('basket-add', $product)}}">
                                            @csrf
                                            <button class="btn btn-success">
                                                <span class="" aria-hidden="true">+ </span>
                                            </button>
                                        </form>

                                        <form method="POST" action="{{route('basket-remove', $product)}}">
                                            @csrf
                                            <button type="submit" class="btn btn-danger">
                                                <span class="" aria-hidden="true"> -</span>
                                            </button>
                                        </form>


                                    </div>
                                </td>
                                <td>{{  $product->price }} {{App\Services\CurrencyConversion::getCurrencySymbol()}}</td>
                                <td>{{ $product->price * $product->countInOrder}} {{App\Services\CurrencyConversion::getCurrencySymbol()}}</td>
                            </tr>
                        @endforeach

                        <tr>
                            <td colspan="4">@lang('main.full') : </td>
                            <td>{{$order->getFullSum()}} {{App\Services\CurrencyConversion::getCurrencySymbol()}} </td>
                        </tr>
                        </tbody>
                    </table>
            </div>
        </div>

        @if(!$order->hasCoupon())
            <div class="">
                <div class=" ">
                    <form method="POST" action="{{route('set-coupon')}}">
                        @csrf
                        <div class="ml-2">
                            <label for="coupon">@lang('main.add_coupon') :</label>
                        </div>

                        <input class="form-control w-25 mb-2 ml-2" type="text" name="coupon">
                        <button type="submit" class="btn btn-success ml-2">@lang('main.send_coupon')</button>
                        @error('coupon')
                        <div class="alert-danger">{{ $message }}</div>
                        @enderror
                    </form>

                </div>
            </div>

        @else
            <h4>you are using a coupon: " {{ $order->coupon->code }} "</h4>
        @endif

        <div style="margin-top: 1rem;">
            <div style="display: flex;   justify-content: flex-end;">
                <a type="button" class="btn btn-primary" href={{route('order')}}>@lang('main.send_order')</a>
            </div>
        </div>

    @endif
@endsection