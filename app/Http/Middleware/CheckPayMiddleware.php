<?php

namespace App\Http\Middleware;

use Closure;
use App\Facades\Cart as CartFacade;

class CheckPayMiddleware
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
        // if (count(CartFacade::get()['products']) > 0 && session('paymentType') != 'Online payment') {
        //     return redirect()->intended('/products');
        // }

        return $next($request);
    }
}
