@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        @isset($coupon)
            <h1>Edit coupon <b>{{ $coupon->code }}</b></h1>
        @else
            <h1>Add coupon</h1>
        @endisset

        <form method="POST" enctype="multipart/form-data"
              @isset($coupon)
                  action="{{ route('coupons.update', $coupon) }}"
              @else
                  action="{{ route('coupons.store') }}"
                @endisset >
            <div>
                @isset($coupon)
                    @method('PUT')
                @endisset
                @csrf

                <div class="input-group row">
                    <label for="code" class="col-sm-2 col-form-label">Code: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="code" id="code"
                               value="@isset($coupon){{ $coupon->code }}@endisset">
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <label for="value" class="col-sm-2 col-form-label">Value: </label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="value" id="value"
                               value="@isset($coupon){{ $coupon->value }}@endisset">
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <div>
                        <label for="type" class="col-sm-2 col-form-label">Type: </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="type" id="type"
                               value="@isset($coupon){{ $coupon->type }}@endisset">
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <div>
                        <label for="only_once" class="col-sm-2 col-form-label">Only_once: </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="number" class="form-control" name="only_once" id="only_once"
                               value="@isset($coupon){{ $coupon->only_once }}@endisset">
                    </div>
                </div>

                <br>

                <div class="input-group row">
                    <div>
                        <label for="expired_at" class="col-sm-2 col-form-label">Expired_at: </label>
                    </div>
                    <div class="col-sm-6">
                        <input type="date" class="form-control" name="expired_at" id="expired_at"
                               value="@isset($coupon){{ $coupon->expired_at }}@endisset">
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <div>
                        <label for="description" class="col-sm-2 col-form-label">Description: </label>
                    </div>
                    <div class="col-sm-6">
							<textarea name="description" id="description" cols="72"
                                      rows="7">@isset($coupon)
                                    {{ $coupon->description }}
                                @endisset</textarea>
                    </div>
                </div>
                <br>

                <div class="input-group row">
                    <div>
                        <label for="currency" class="col-sm-2 col-form-label">Currency: </label>
                    </div>
                    <br>
                    <div class="col-sm-6">
                        <select name="currency_id" id="currency" class="form-control">
                            @foreach($currencies as  $currency )
                                <option value="{{ $currency->id }}"
                                        @isset($coupon)
                                            @if($coupon->currency_id == $currency->id )
                                                selected
                                        @endif
                                        @endisset
                                >{{ $currency->code }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>


                <button class="btn btn-success">Save</button>
            </div>
        </form>
    </div>
@endsection