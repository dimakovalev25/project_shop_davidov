@extends('layouts.master')

@section('content')
    @if(is_null($order))
        <div class="starter-template">
            <h1>there are no items in the cart</h1>
            <a href="{{route('index')}}">to products</a>
        </div>

    @else
        <div class="starter-template">
            <h1>Basket</h1>
            <p>order</p>
            <div class="panel">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Quantity</th>
                        <th>Price</th>
                        <th>Full price</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach( $order->products as $product )
                        <tr>
                            <td>
                                <a href="http://laravel-diplom-1.rdavydov.ru/mobiles/iphone_x_64">
                                    {{ $product->name }}
                                </a>
                            </td>
                            <td>
                                <img height="56px"
                                     src="{{ asset($product->image) }}" width= '60' height='60' class="img img-responsive"
                            </td>
                            <td><span class="badge">{{ $product->pivot->count }}</span>
                                <div class="btn-group form-inline">

                                    <form method="POST" action="{{route('basket-add', $product)}}">
                                        @csrf
                                        <button class="btn btn-success">
                                            <span class="glyphicon glyphicon-plus" aria-hidden="true"></span>
                                        </button>
                                    </form>

                                    <form method="POST" action="{{route('basket-remove', $product)}}">
                                        @csrf
                                        <button type="submit" class="btn btn-danger">
                                            <span class="glyphicon glyphicon-minus" aria-hidden="true"></span>
                                        </button>
                                    </form>


                                </div>
                            </td>
                            <td>{{  $product->price }} {{App\Services\CurrencyConversion::getCurrencySymbol()}}</td>
                            <td>{{ $product->getPriceForCount() }} {{App\Services\CurrencyConversion::getCurrencySymbol()}}</td>
                        </tr>
                    @endforeach

                    <tr>
                        <td colspan="4"><h3> Full price:</h3></td>
                        <td>{{$order->getFullPrice()}} {{App\Services\CurrencyConversion::getCurrencySymbol()}} </td>
                    </tr>
                    </tbody>
                </table>
                <br>
                <div class="btn-group pull-right" role="group">
                    <a type="button" class="btn btn-success" href={{route('order')}}>order</a>
                </div>
            </div>
        </div>

    @endif
@endsection