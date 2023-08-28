@extends('layouts.master')

@section('content')
    <div class="starter-template">
        <h3>@lang('main.approve'):</h3>
        <h4>@lang('main.details')</h4>
        <div class="">
            <div class="row ">
                <form action="{{route('order-approve')}}" method="POST">
                    @csrf
                    <div>
                        <div class="">
                            <div class="form-group">
                                <label for="name" class="control-label ">@lang('main.name_user'): </label>
                                <div class="">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                </div>

                                <label for="phone" class="control-label ">@lang('main.phone'): </label>
                                <div class="">
                                    <input type="text" name="phone" id="phone" value="" class="form-control">
                                </div>

                                <label for="email" class="control-label ">@lang('main.email'): </label>
                                <div class="">
                                    <input type="email" name="email" id="email" value="" class="form-control">
                                </div>
                            </div>

                        </div>
                        <br>
                        <p>@lang('main.full'): <b>{{ $order->getFullPrice() }} {{App\Services\CurrencyConversion::getCurrencySymbol()}}</b></p>
                        <input type="submit" class="btn btn-success" value=@lang('main.approve')>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection