@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        <h1>Property:  {{$property->name}}</h1>
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
                <td>{{ $property->id }}</td>
            </tr>
            <tr>
                <td>Code</td>
                <td>{{ $property->name }}</td>
            </tr>

            <tr>
                <td>Name_RU</td>
                <td>{{ $property->name_en }}</td>
            </tr>


            </tbody>
        </table>
    </div>
@endsection