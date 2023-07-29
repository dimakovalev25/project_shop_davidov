<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use App\Models\Currency;
use Illuminate\Http\Request;

class CouponController extends Controller
{

    public function index()
    {
        $coupons = Coupon::all();
        return view('auth.coupons.index', compact('coupons'));
    }

    public function create()
    {
        $currencies = Currency::all();
        return view('auth.coupons.form', compact('currencies'));
    }

    public function store(CouponRequest $request)
    {
        $data = $request->validated();
        Coupon::create($data);

        return redirect()->route('coupons.index');

    }

    public function show(Coupon $coupon)
    {
        return view('auth.coupons.show', compact('coupon'));
    }
    public function edit(Coupon $coupon)
    {
        //
    }
    public function update(Request $request, Coupon $coupon)
    {
        //
    }


    public function destroy(Coupon $coupon)
    {
       $coupon->delete();
        return redirect()->route('coupons.index');
    }
}
