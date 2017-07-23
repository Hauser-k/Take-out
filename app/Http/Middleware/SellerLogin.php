<?php

namespace App\Http\Middleware;

use Closure;

class SellerLogin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (empty(session('seller_user'))) {
            return redirect('seller/login');
        }
        return $next($request);
    }
}
