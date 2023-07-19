<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        $order_id = session('order_id');
        if (!is_null($order_id)) {
            $order = Order::findOrFail($order_id);
        }
        return view('basket', compact('order'));
    }

    public function order()
    {
        return view('order');
    }

    public function basketAdd($product_id)
    {
        $order_id = session('order_id');
        if (is_null($order_id)) {
            $order_id = Order::create()->id;
            session(['order_id' => $order_id]);
        } else {
            $order = Order::find($order_id);
        }

        if ($order->products->contains($product_id)) {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;
            $pivotRow->count++;
            $pivotRow->update();
        } else {
            $order->products()->attach($product_id);
        }

        return redirect()->route('basket');

    }

    public function basketRemove($product_id)
    {
        $order_id = session('order_id');
        if (is_null($order_id)) {
            return redirect()->route('basket');

//            $order = Order::find($order_id);
//            return view('basket', compact('order'));
        }
        $order = Order::find($order_id);

        if ($order->products->contains($product_id)) {
            $pivotRow = $order->products()->where('product_id', $product_id)->first()->pivot;

            if ($pivotRow->count < 2) {
                $order->products()->detach($product_id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
//        $order->products()->detach($product_id);


        return redirect()->route('basket');
//        return view('basket', compact('order'));
    }


}
