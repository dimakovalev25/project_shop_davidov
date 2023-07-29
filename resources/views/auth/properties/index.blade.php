@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        <h1>Properties
        </h1>
        <a class="btn btn-success" type="button"
           href="{{ route('properties.create') }}">Add property</a>
        <br>
        <br>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Name_ru
                </th>
                <th>
                    Name_en
                </th>
                <th>
                    Actions
                </th>
            </tr>

           @foreach($properties as $property)
                <tr>
                    <td>{{ $property->id }}</td>
                    <td>{{ $property->name }}</td>
                    <td>{{ $property->name_en }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('properties.destroy', $property) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('properties.show', $property) }}">Open</a>
                                <a class="btn btn-warning" type="button" href="{{ route('properties.edit', $property) }}">Edit</a>
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