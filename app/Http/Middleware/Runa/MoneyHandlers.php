<?php

namespace App\Http\Middleware\Runa;

use Closure;

class MoneyHandlers
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
        if($request->user()->level > 2) {
            return redirect('runa/error');
        }
        return $next($request);
    }
}
