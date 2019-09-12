<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class confirmPinCode
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
        if(auth()->guard('client')->check())
        {
            if(auth()->guard('client')->user()->activation == 'not_confirm')
            {
                return redirect('/confirm-pinCode');
            }

            if(auth()->guard('client')->user()->activation == 'false')
            {
                session()->flush();
                return redirect('/client-login');
            }
        }

        return $next($request);
    }
}
