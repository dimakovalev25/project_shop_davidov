<?php

namespace App\Http\Controllers;

use App\Classes\Basket;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BasketController extends Controller
{
    public function basket()
    {
        $order_id = session('order_id');
        if (!is_null($order_id)) {
            $order = Order::find($order_id);
        }
        $order = Order::find($order_id);
//        $order = (new Basket())->getOrder();
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
        $order = Order::find($orderId);
        return view('order', compact('order'));
    }

    /*   public function basketAdd($product_id)
       {
           $order_id = session('order_id');
           if (is_null($order_id)) {
               $order_id = Order::create();
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

           $product = Product::find($product_id);

           session()->flash('success', 'Add goods ' . $product->name);

           return redirect()->route('basket');

       }*/


    public function basketAdd($product_id)
    {

        $order_id = session('order_id');

        $order = Order::find($order_id);
        if (is_null($order_id)) {
            $order_id = Order::create()->id;
            session(['order_id' => $order_id]);
//            dd($order);
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


        if(Auth::check()){
            $order->user_id = Auth::id();
            $order->save();
        }


        $product = Product::find($product_id);
        session()->flash('success', 'add product'. ' '.  $product->name );


        return redirect()->route('basket');

    }

    public function basketRemove($product_id)
    {
        $order_id = session('order_id');
        if (is_null($order_id)) {
            return redirect()->route('basket');
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

        $product = Product::find($product_id);

        session()->flash('warning', 'delete product' . ' ' . $product->name);

        return redirect()->route('basket');

    }


}
