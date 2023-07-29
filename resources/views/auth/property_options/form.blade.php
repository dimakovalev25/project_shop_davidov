@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        @isset($property_option)
            <h1>Edit property option <b>{{ $property_option->name }}</b></h1>
        @else
            <h1>Add property option</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($property_option)
                  action="{{ route('property_options.update', $property_option) }}"
              @else
                  action="{{ route('property_options.store') }}"
                @endisset >
            <div>
                @isset($property_option)
                    @method('PUT')
                @endisset
                @csrf

                    <div class="input-group row">
                        <div>
                            <label for="description" class="col-sm-2 col-form-label"> Choose property: </label>
                        </div>
                        <br>
                        <div class="col-sm-6">
                            <select name="property_id" id="property_id" class="form-control">
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}"
                                            @isset($property_option)
                                                @if($property_option->property_id == $property->id )
                                                    selected
                                            @endif
                                            @endisset
                                    >{{ $property->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>





                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Name_RU: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="code"
                               value="{{old('name')}} @isset($property_option){{ $property_option->name }}@endisset">
                        @error('name')
                        <div class="alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name_EN: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name_en" id="name"
                               value=" {{old('name_en')}} @isset($property_option){{ $property_option->name_en }}@endisset">
                        @error('name_en')
                        <div class="alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                    <br>
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection