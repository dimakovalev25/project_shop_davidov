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
                <td><img src="https://www.google.com/imgres?imgurl=https%3A%2F%2Fyt3.googleusercontent.com%2Fytc%2FAOPolaREdx7ONESYpf-pxZ4K5HX5W3tA8ln86N1AgIYqjw%3Ds900-c-k-c0x00ffffff-no-rj&tbnid=bd-SZggCiAN-uM&vet=12ahUKEwiSvP3L8J2AAxXKBxAIHW9QCsoQMygDegUIARDGAQ..i&imgrefurl=https%3A%2F%2Fwww.youtube.com%2Fchannel%2FUCqrq_YZP7-_bZ9yIYIOAa4g&docid=aSazes4ZfZdo0M&w=900&h=900&q=apple&ved=2ahUKEwiSvP3L8J2AAxXKBxAIHW9QCsoQMygDegUIARDGAQ"
                         height="240px"></td>
            </tr>
            <tr>
                <td>Quantity products</td>
                <td>{{ $category->products->count() }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection