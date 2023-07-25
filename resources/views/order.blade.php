@extends('layouts.master')

@section('content')
    <div class="starter-template">
        <h1>Approve order:</h1>
        <div class="container">
            <div class="row justify-content-center">
                <p>Full price: <b>{{ $order->getFullPrice() }}</b></p>
                <form action="{{route('order-approve')}}" method="POST">
                    @csrf
                    <div>
                        <div class="container">
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Name: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <div class="form-group">
                                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Phone: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="phone" id="phone" value="" class="form-control">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="email" class="control-label col-lg-offset-3 col-lg-2">Email: </label>
                                <div class="col-lg-4">
                                    <input type="email" name="email" id="email" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        {{--                        <input type="hidden" name="_token" value="qhk4riitc1MAjlRcro8dvWchDTGkFDQ9Iacyyrkj"> <br>--}}
                        <input type="submit" class="btn btn-success" value="approve">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection