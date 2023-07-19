<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;

class BasketController extends Controller
{
    public function basket()
    {
        return view('basket');
    }

    public function order()
    {
        return view('order');
    }

    public function basketAdd($product_id)
    {
        $order_id = session('order_id');
        if (is_null($order_id)){
            $order_id = Order::create()->id;
            session(['order_id'=>$order_id]);
        } else {
            $order = Order::find('order_id');
        }
        dump($order_id);

    }


}
