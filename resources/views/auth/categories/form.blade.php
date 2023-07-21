@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        @isset($category)
            <h1>Edit category <b>{{ $category->name }}</b></h1>
        @else
            <h1>Add category</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($category)
                  action="{{ route('categories.update', $category) }}"
              @else
                  action="{{ route('categories.store') }}"
                @endisset >
            <div>
                @isset($category)
                    @method('PUT')
                @endisset
                @csrf
                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Code: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="code" id="code"
                               value="{{old('code')}} @isset($category){{ $category->code }}@endisset">
                        @error('code')
                        <div class="alert-danger">{{ $message }}</div>
                        @enderror

                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name: </label>
                    <div class="col-sm-6">

                        <input type="text" class="form-control" name="name" id="name"
                               value=" {{old('name')}} @isset($category){{ $category->name }}@endisset">
                        @error('name')
                        <div class="alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <div>
                    <label for="description" class="col-sm-2 col-form-label">Description: </label>

                    </div>
                    <div class="col-sm-6">

							<textarea name="description" id="description" cols="72"
                                      rows="7">@isset($category){{ $category->description }}@endisset</textarea>
                        @error('description')
                        <div class="alert-danger">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Image: </label>
                    <div class="col-sm-10">

                        <label class="btn btn-default btn-file">
                            Load <input type="file" style="display: none;" name="image" id="image">
                        </label>
                        @error('image')
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