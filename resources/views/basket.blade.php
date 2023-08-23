@extends('layouts.master')

@section('content')
    @if(is_null($order))
        <div class="starter-template">
            <h1>there are no items in the cart</h1>
            <a href="{{route('index')}}">to products</a>
        </div>

    @else
        <div class="starter-template">
            <div class="panel">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Description</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Full price</th>
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
                                            <span class="" aria-hidden="true">+</span>
                                        </button>
                                    </form>

                                    <form method="POST" action="{{route('basket-remove', $product)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <span class="" aria-hidden="true">-</span>
                                        </button>
                                    </form>


                                </div>
                            </td>
                            <td>{{  $product->price }} {{App\Services\CurrencyConversion::getCurrencySymbol()}}</td>
                            <td>{{ $product->price * $product->countInOrder}} {{App\Services\CurrencyConversion::getCurrencySymbol()}}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="4"> Full price:</td>
                        <td>{{$order->getFullSum()}} {{App\Services\CurrencyConversion::getCurrencySymbol()}} </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>

        @if(!$order->hasCoupon())
            <div class="row coupon">
                <div class="form-inline pull-right">
                    <form method="POST" action="{{route('set-coupon')}}">
                        @csrf
                        <label for="coupon">Add coupon:</label>
                        <input class="form-control" type="text" name="coupon">
                        <button type="submit" class="btn btn-success">send coupon</button>
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
                <a type="button" class="btn btn-primary" href={{route('order')}}>send an order</a>
            </div>
        </div>

    @endif
@endsection