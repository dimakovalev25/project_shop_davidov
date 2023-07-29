@extends('auth.layouts.master')

@section('content')
    <div class="col-md-12">
        <h1>Coupon: {{$coupon->name}}</h1>
        <table class="table">
            <tbody>
            <tr>
                <th>
                    Field
                </th>
                <th>
                    Value
                </th>
            </tr>
            <tr>
                <td>ID</td>
                <td>{{ $coupon->id }}</td>
            </tr>
            <tr>
                <td>Code</td>
                <td>{{ $coupon->code }}</td>
            </tr>
            <tr>
                <td>Description</td>
                <td>{{ $coupon->description }}</td>
            </tr>
            <tr>
                <td>Value</td>
                <td>{{ $coupon->value }}</td>
            </tr>
            <tr>
                <td>Type</td>
                <td>{{ $coupon->type }}</td>
            </tr>
            <tr>
                <td>Only_once</td>
                <td>{{ $coupon->only_once }}</td>
            </tr>
            <tr>
                <td>Expired_at</td>
                <td>{{ $coupon->expired_at }}</td>
            </tr>
            <tr>
                <td>Currency_id</td>
                <td>{{ $coupon->currency_id }}</td>
            </tr>
            </tbody>
        </table>
    </div>
@endsection