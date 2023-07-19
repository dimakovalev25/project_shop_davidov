@extends('master')

@section('content')
    <div class="starter-template">
        <h1>Basket</h1>
        <p>order</p>
        <div class="panel">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th>Name</th>
                    <th>Quantity</th>
                    <th>Price</th>
                    <th>Full price</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td>
                        <a href="http://laravel-diplom-1.rdavydov.ru/mobiles/iphone_x_64">
                            <img height="56px" src="http://laravel-diplom-1.rdavydov.ru/storage/products/iphone_x.jpg">
                            iPhone X 64GB
                        </a>
                    </td>
                    <td><span class="badge">1</span>
                        <div class="btn-group">
                            <a type="button" class="btn btn-danger" href="http://laravel-diplom-1.rdavydov.ru/basket/1/remove"><span
                                        class="glyphicon glyphicon-minus" aria-hidden="true"></span></a>
                            <a type="button" class="btn btn-success" href="http://laravel-diplom-1.rdavydov.ru/basket/1/add"><span
                                        class="glyphicon glyphicon-plus" aria-hidden="true"></span></a>
                        </div>
                    </td>
                    <td>71990 руб.</td>
                    <td>71990 руб.</td>
                </tr>
                <tr>
                    <td colspan="3">full price</td>
                    <td>71990 руб.</td>
                </tr>
                </tbody>
            </table>
            <br>
            <div class="btn-group pull-right" role="group">
                <a type="button" class="btn btn-success" href={{route('order')}}>order</a>
            </div>
        </div>
    </div>
@endsection