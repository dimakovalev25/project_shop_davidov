@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        <h1>Coupons
        </h1>
        <a class="btn btn-success" type="button"
           href="{{ route('coupons.create') }}">Add coupon</a>
        <br>
        <br>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    #
                </th>
                <th>
                    Code
                </th>
                <th>
                    Description
                </th>
                <th>
                    Value
                </th>
                <th>
                    Type
                </th>
                <th>
                    Only_once
                </th>
                <th>
                    Expired_at
                </th>
                <th>
                    Currency_id
                </th>
            </tr>

            @foreach($coupons as $coupon)
                <tr>
                    <td>{{ $coupon->id }}</td>
                    <td>{{ $coupon->code }}</td>
                    <td>{{ $coupon->description }}</td>
                    <td>{{ $coupon->value }}</td>
                    <td>{{ $coupon->type }}</td>
                    <td>{{ $coupon->only_once }}</td>
                    <td>{{ $coupon->expired_at }}</td>
                    <td>{{ $coupon->currency_id }}</td>
                    <td>
                        <div class="btn-group" role="group">
                            <form action="{{ route('coupons.destroy', $coupon) }}" method="POST">
                                <a class="btn btn-success" type="button"
                                   href="{{ route('coupons.show', $coupon) }}">Open</a>
                                <a class="btn btn-warning" type="button"
                                   href="{{ route('coupons.edit', $coupon) }}">Edit</a>
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