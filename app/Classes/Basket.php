<?php

namespace App\Classes;

use App\Models\Order;
use App\Models\Product;
use Illuminate\Support\Facades\Auth;

class Basket
{
    protected $order;

    public function __construct($createOrder = false)
    {
        $order_id = session('order_id');

        if (is_null($order_id) && $createOrder) {
            $data = [];
            if (Auth::check()) {
                $data['user_id'] = Auth::id();
            }

            $this->order = Order::create($data);
            session(['order_id' => $this->order->id]);
        } else {
            $this->order = Order::findOrFail($order_id);
        }

    }

    public function getOrder()
    {
        return $this->order;
    }

    public function saveOrder($name, $phone)
    {
        if (!$this->countAvailable()){
            return  false;
        }
        return $this->order->saveOrder($name, $phone);
    }

    public function countAvailable()
    {
        foreach($this->order->products as $orderProduct){

            if ($orderProduct->count < $this->getPivotRow($orderProduct)->count) {
                return  false;
            }
        }
        return true;
    }

    public function getPivotRow($product)
    {
        return $this->order->products()->where('product_id', $product->id)->first()->pivot;
    }
    public function removeProduct(Product $product)
    {
        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->order->products()->where('product_id', $product->id)->first()->pivot;

            if ($pivotRow->count < 2) {
                $this->order->products()->detach($product->id);
            } else {
                $pivotRow->count--;
                $pivotRow->update();
            }
        }
    }


    public function addProduct(Product $product)
    {

        if ($this->order->products->contains($product->id)) {
            $pivotRow = $this->order->products()->where('product_id', $product->id)->first()->pivot;
            $pivotRow->count++;
            if ($pivotRow->count > $product->count) {
                return false;
            }
            $pivotRow->update();
        } else {
            if ($product->count == 0) {
                return false;
            }
            $this->order->products()->attach($product->id);
        }

        if (Auth::check()) {
            $this->order->user_id = Auth::id();
            $this->order->save();
        }

        return true;
    }

}