@extends('layouts.master')

@section('content')
    <div class="starter-template">
        <h3>Approve order:</h3>
        <h4>enter your details</h4>
        <div class="">
            <div class="row ">
                <form action="{{route('order-approve')}}" method="POST">
                    @csrf
                    <div>
                        <div class="">
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Name: </label>
                                <div class="">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                </div>

                                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Phone: </label>
                                <div class="">
                                    <input type="text" name="phone" id="phone" value="" class="form-control">
                                </div>

                                <label for="email" class="control-label col-lg-offset-3 col-lg-2">Email: </label>
                                <div class="">
                                    <input type="email" name="email" id="email" value="" class="form-control">
                                </div>
                            </div>

                        </div>
                        <br>
                        <p>Full price: <b>{{ $order->getFullPrice() }} </b></p>
                        <input type="submit" class="btn btn-success" value="approve">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection