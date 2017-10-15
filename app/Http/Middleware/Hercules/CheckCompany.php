<?php

namespace App\Http\Middleware\Hercules;

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
        if($request->user()->user != 1) {
            return $next($request);
        }
        return redirect('permiso/runa');
    }
}
