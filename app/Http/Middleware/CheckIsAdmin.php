<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class checkIsAdmin
{

    public function handle(Request $request, Closure $next): Response
    {

        $user = Auth::user();
        if(!$user->is_admin){
            session()->flash('warning', 'not enough rights Administrator');

            return redirect()->route('index');
        };
        return $next($request);
    }
}
