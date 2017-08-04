<?php

namespace App\Http\Middleware\Runa;

use Closure;

class TicketPayments
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
        if($request->user()->level > 3) {
            return redirect('runa/error');
        }
        return $next($request);
    }
}
