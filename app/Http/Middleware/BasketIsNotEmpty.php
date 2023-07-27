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
        $order = session('order');

        if (!is_null($order)) {
            return $next($request);
        }
        session()->forget('order');
        session()->flash('warning', 'your basket is empty');
        return redirect()->route('index');
    }
}
