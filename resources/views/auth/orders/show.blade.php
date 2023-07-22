@extends('auth.layouts.master')

@section('content')
    <div class="py-4">
        <div class="container">
            <div class="justify-content-center">
                <div class="panel">
                    <h1>Order №{{ $order->id }}</h1>
                    <p>User: <b>{{ $order->name }}</b></p>
                    <p>Phone: <b>{{ $order->phone }}</b></p>
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Qnt</th>
                            <th>Price</th>
                            <th>Full price</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($order->products as $product)
                            <tr>
                                <td>
                                    <a href="{{ route('product', $product) }}">
                                        <img height="56px"
                                             src="{{ asset($product->image) }}" width= '60' height='60' class="img img-responsive">
                                        {{ $product->name }}
                                    </a>
                                </td>
                                <td><span class="badge">1</span></td>
                                <td>{{ $product->price }} $</td>
                                <td>{{ $product->getPriceForCount()}} $</td>
                            </tr>
                        @endforeach
                        <tr>
                            <td colspan="3">Full price:</td>
                            <td>{{ $order->getFullPrice() }} $</td>
                        </tr>
                        </tbody>
                    </table>
                    <br>
                </div>
            </div>
        </div>
    </div>
@endsection