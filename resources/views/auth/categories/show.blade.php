@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        <h1>Category:  {{$category->name}}</h1>
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
                <td>{{ $category->id }}</td>
            </tr>
            <tr>
                <td>Code</td>
                <td>{{ $category->code }}</td>
            </tr>
            <tr>
                <td>Name</td>
                <td>{{ $category->name }}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{ $category->description }}</td>
            </tr>
            <tr>
                <td>Image</td>
                <td>

{{--                    <img src="{{ Storage::url($category->image)}}"
                         height="240px">--}}
                    <img src="{{ asset($category->image) }}" width= '60' height='60' class="img img-responsive" />
                </td>
            </tr>
            <tr>
                <td>Quantity products</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection