@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        <h1>Property option
        </h1>
        <a class="btn btn-success" type="button"
           href="{{ route('property_options.create') }}">Add property option</a>
        <br>
        <br>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Property
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

           @foreach($properties_options as $property_option)
                <tr>
                    <td>{{ $property_option->id }}</td>
                    <td>{{ $property_option->property->name_en }}</td>
                    <td>{{ $property_option->name }}</td>
                    <td>{{ $property_option->name_en }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('property_options.destroy', $property_option) }}" method="POST">
                                <a class="btn btn-success" type="button" href="{{ route('property_options.show', $property_option) }}">Open</a>
                                <a class="btn btn-warning" type="button" href="{{ route('property_options.edit', $property_option) }}">Edit</a>
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