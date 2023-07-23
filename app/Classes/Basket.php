<?php

namespace App\Classes;

use App\Models\Order;

class Basket
{
    protected $order;

    public function __construct()
    {
        $order_id = session('order_id');
        $this->order = Order::findOrFail($order_id);
    }

    public function getOrder()
    {
        return $this->order;
    }


}