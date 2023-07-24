<?php

namespace App\Http\Middleware;

use App\Models\Order;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class BasketIsNotEmpty
{

    public function handle(Request $request, Closure $next): Response
    {
        $order_id = session('order_id');

        if (!is_null($order_id)) {
            return $next($request);
        }
        session()->flash('warning', 'your basket is empty');
        return redirect()->route('index');
    }
}
