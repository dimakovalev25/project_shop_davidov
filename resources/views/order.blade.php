@extends('master')

@section('content')
    <div class="starter-template">
        <h1>Approve order:</h1>
        <div class="container">
            <div class="row justify-content-center">
                <p>Full price: <b>71990 руб.</b></p>
                <form action="http://laravel-diplom-1.rdavydov.ru/basket/accept" method="POST">
                    <div>
                        <div class="container">
                            <div class="form-group">
                                <label for="name" class="control-label col-lg-offset-3 col-lg-2">Name: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="name" id="name" value="" class="form-control">
                                </div>
                            </div>
                            <br>
                            <br>
                            <div class="form-group">
                                <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Phone: </label>
                                <div class="col-lg-4">
                                    <input type="text" name="phone" id="phone" value="" class="form-control">
                                </div>
                            </div>
                        </div>
                        <br>
                        <input type="hidden" name="_token" value="qhk4riitc1MAjlRcro8dvWchDTGkFDQ9Iacyyrkj">					<br>
                        <input type="submit" class="btn btn-success" href="http://laravel-diplom-1.rdavydov.ru/basket/place" value="approve">
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection