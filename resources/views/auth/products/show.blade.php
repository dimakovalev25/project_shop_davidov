@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        <h1>Product:  {{$product->name}}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Field
                </th>
                <th>
                    Value
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $product->id }}</td>
            </tr>
            <tr>
                <td>Code</td>
                <td>{{ $product->code }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $product->name }}</td>
            </tr>
             <tr>
                <td>Price</td>
                <td>{{ $product->price }}</td>
            </tr>
            <tr>
                <td>Category</td>
                <td>{{ $product->category_id }}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{ $product->description }}</td>
            </tr>
            <tr>
                <td>Image</td>
                <td><img src="{{$product->image}}"
                         height="240px"></td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection