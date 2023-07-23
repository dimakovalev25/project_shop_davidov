@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        <h1>Products
        </h1>
        <a class="btn btn-success" type="button"
           href="{{ route('products.create') }}">Add product</a>
        <br>
        <br>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Code
                </th>
                <th>
                    Name
                </th>
                <th>
                    Description
                </th>
                <th>
                    Price
                </th>
{{--                <th>--}}
{{--                    Category--}}
{{--                </th>--}}
                <th>
                    Image
                </th>
                <th>
                    Actions
                </th>
            </tr>

            @foreach($products as $product)
                <tr>
                    <td>{{ $product->id }}</td>
                    <td>{{ $product->code }}</td>
                    <td>{{ $product->name }}</td>
                    <td>{{ $product->description }}</td>
                    <td>{{ $product->price }}</td>
{{--                    <td>{{ $product->category }}</td>--}}
                    <td> <img src="{{ asset($product->image) }}" width= '60' height='60' class="img img-responsive" /></td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('products.destroy', $product) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('products.show', $product) }}">Open</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('products.edit', $product) }}">Edit</a>
                                @csrf
                                @method('DELETE')
                                <input class="btn btn-danger" type="submit" value="Delete">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach

            </tbody>
        </table>

    </div>


@endsection