<?php

namespace App\Http\Middleware\Runa;

use Closure;

class CheckCompany
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
        if($request->user()->user != 2) {
            return $next($request);
        }
        return redirect('permiso/hercules');
    }
}
