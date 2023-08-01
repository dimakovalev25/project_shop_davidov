<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Http\Requests\AddCouponRequest;
use App\Models\Coupon;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $currencies = Currency::all();
        $order = (new Basket())->getOrder();
        return view('basket', compact('order', 'currencies'));
    }

    public function orderApprove(Request $request)
    {
        $email = Auth::check() ? Auth::user()->email : $request->email;

        if ((new Basket())->saveOrder($request->name, $request->phone, $email)) {
            session()->flash('success', 'order accepted for processing');
        } else {
            session()->flash('error', 'something went wrong, try later');
        }

        return redirect()->route('index');

    }

    public function order()
    {
        $currencies = Currency::all();
        $basket = new Basket();
        $order = $basket->getOrder();

        if (!$basket->countAvailable()) {
            session()->flash('warning', 'product not available for order in full');
            return redirect()->route('basket');
        }

        return view('order', compact('order', 'currencies'));
    }

    public function setCoupon(AddCouponRequest $request)
    {
        $coupon = Coupon::where('code', $request->coupon)->first();
        if($coupon->availableForUse()){
            (new Basket())->setCoupon($coupon);
            session()->flash('success', 'coupon added!');
        } else {
            session()->flash('warning', 'coupon cannot be used');
        }

        return redirect()->route('basket');
    }


    public function basketAdd(Product $product)
    {
        $result = (new Basket(true))->addProduct($product);

        if ($result) {
            session()->flash('success', 'add product' . ' ' . $product->name);
        } else {
            session()->flash('warning', 'product' . ' ' . $product->name . '' . 'not available for order');
        }

        return redirect()->route('basket');


    }

    public function basketRemove(Product $product)
    {
        (new Basket())->removeProduct($product);

        session()->flash('warning', 'delete product' . ' ' . $product->name);

        return redirect()->route('basket');

    }


//old variants
    /*    public function basket()
        {
            $order = (new Basket())->getOrder();
            return view('basket', compact('order'));
        }

        public function orderApprove(Request $request)
        {
            $orderId = session('order_id');
            if (is_null($orderId)) {
                return redirect()->route('index');
            }
            $order = Order::find($orderId);
            $success = $order->saveOrder($request->name, $request->phone);

            if ($success) {
                session()->flash('success', 'order accepted for processing');
            } else {
                session()->flash('error', 'something went wrong');

            }

            return redirect()->route('index');

        }

        public function order()
        {
            $orderId = session('order_id');
            if (is_null($orderId)) {
                return redirect()->route('index');
            }
            $order = Order::findOrFail($orderId);
            return view('order', compact('order'));
        }
        public function basketAdd(Product $product)
        {
            $order_id = session('order_id');
    //        $order = Order::find($order_id);
            if (is_null($order_id)) {
                $order = Order::create();
                session(['order_id' => $order_id]);
            } else {
                $order = Order::findOrFail($order_id);
            }

            if ($order->products->contains($product->id)) {
                $pivotRow = $order->products()->where('product_id', $product->id)->first()->pivot;
                $pivotRow->count++;
                $pivotRow->update();
            } else {
                $order->products()->attach($product->id);
            }

            if (Auth::check()) {
                $order->user_id = Auth::id();
                $order->save();
            }

            session()->flash('success', 'add product' . ' ' . $product->name);
            return redirect()->route('basket');

        }

        public function basketRemove(Product $product)
        {

            $basket = new Basket();
            $order = $basket->getOrder();

            $order_id = session('order_id');
            if (is_null($order_id)) {
                return redirect()->route('basket');
            }
    //        $order = Order::find($order_id);

            if ($order->products->contains($product->id)) {
                $pivotRow = $order->products()->where('product_id', $product->id)->first()->pivot;

                if ($pivotRow->count < 2) {
                    $order->products()->detach($product->id);
                } else {
                    $pivotRow->count--;
                    $pivotRow->update();
                }
            }

            $product = Product::find($product->id);

            session()->flash('warning', 'delete product' . ' ' . $product->name);

            return redirect()->route('basket');

        }*/


}
