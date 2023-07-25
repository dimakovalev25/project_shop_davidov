@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        @isset($product)
            <h1>Edit product <b>{{ $product->name }}</b></h1>
        @else
            <h1>Add product</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($product)
                  action="{{ route('products.update', $product) }}"
              @else
                  action="{{ route('products.store') }}"
                @endisset >
            <div>
                @isset($product)
                    @method('PUT')
                @endisset
                @csrf

                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Code: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code"
                               value="@isset($product){{ $product->code }}@endisset">
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <label for="name" class="col-sm-2 col-form-label">Name: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name" id="name"
                               value="@isset($product){{ $product->name }}@endisset">
                    </div>
                </div>
                <br>
                    <div class="input-group row">
                    <label for="name_ru" class="col-sm-2 col-form-label">Name_RU: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="name_ru" id="name_ru"
                               value="@isset($product){{ $product->name_ru }}@endisset">
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <div>
                        <label for="description" class="col-sm-2 col-form-label">Description: </label>
                    </div>
                    <div class="col-sm-6">
							<textarea name="description" id="description" cols="72"
                                      rows="7">@isset($product)
                                    {{ $product->description }}
                                @endisset</textarea>
                    </div>
                </div>
                    <br>
                    <div class="input-group row">
                        <div>
                            <label for="description_ru" class="col-sm-2 col-form-label">Description_RU: </label>
                        </div>
                        <div class="col-sm-6">
							<textarea name="description_ru" id="description_ru" cols="72"
                                      rows="7">@isset($product)
                                    {{ $product->description_ru }}
                                @endisset</textarea>
                        </div>
                    </div>


                <div class="input-group row">
                    <div>
                        <label for="price" class="col-sm-2 col-form-label">Price: </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="price" id="price"
                               value="@isset($product){{ $product->price }}@endisset">
                    </div>
                </div>

                <div class="input-group row">
                    <div>
                        <label for="count" class="col-sm-2 col-form-label">Count: </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="count" id="count"
                               value="@isset($product){{ $product->count }}@endisset">
                    </div>
                </div>


                <div class="input-group row">
                    <div>
                        <label for="description" class="col-sm-2 col-form-label">Category: </label>
                    </div>
                    <br>
                    <div class="col-sm-6">
                        <select name="category_id" id="category_id" class="form-control">
                            @foreach($categories as $category )
                                <option value="{{ $category->id }}"
                                        @isset($product)
                                            @if($product->category_id == $category->id )
                                                selected
                                        @endif
                                        @endisset
                                >{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <br>
                <div class="input-group row">
                    <label for="image" class="col-sm-2 col-form-label">Image: </label>
                    <div class="col-sm-10">
                        <label class="btn btn-default btn-file">
                            Load <input type="file" style="display: none;" name="image" id="image">
                        </label>
                    </div>
                </div>
                <br>
                @foreach([
                    'hit' => 'Bestseller',
                    'new' => 'New Product',
                    'recommend' => 'Recommend',
                    ] as $field => $title)

                    <div class="form-check">
                        <input class="form-check-input" name="{{$field}}" id="{{$field}}" type="checkbox"
                               id="flexCheckChecked"
                               @if  ( isset($product) && $product->$field === 1)
                                   checked="checked"
                                @endif
                        >
                        <label class="form-check-label" for="flexCheckChecked">
                            {{$title}}:
                        </label>
                    </div>
                    <br>
                @endforeach
                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection