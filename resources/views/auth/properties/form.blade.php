@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        @isset($property)
            <h1>Edit property <b>{{ $property->name }}</b></h1>
        @else
            <h1>Add property</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($property)
                  action="{{ route('properties.update', $property) }}"
              @else
                  action="{{ route('properties.store') }}"
                @endisset >
            <div>
                @isset($property)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Name_RU: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="code"
                               value="{{old('name')}} @isset($property){{ $property->name }}@endisset">
                        @error('code')
                        <div class="alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name_EN: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name_en" id="name"
                               value=" {{old('name_en')}} @isset($property){{ $property->name_en }}@endisset">
                        @error('name')
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