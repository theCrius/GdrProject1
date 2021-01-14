<?php

namespace App\Http\Middleware;

use App\Classes\ErrorHandle;
use Closure;

class AdminOrOwner
{
    use ErrorHandle;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next,$fileJs=null)
    {
        if ( $request->user()->adminOrOwner(\App\User::findOrFail($request->idUser) ) ) return $next($request);

        return $this->returnBackWithError($request,'Non hai i permessi');
    }
}
