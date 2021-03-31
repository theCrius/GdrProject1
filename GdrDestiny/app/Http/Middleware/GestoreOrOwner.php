<?php

namespace App\Http\Middleware;

use App\Classes\ErrorHandle;
use Closure;

class GestoreOrOwner
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
        
        if ( $request->user()->gestoreOrOwner(\App\User::findOrFail($request->idUser) ) ) return $next($request);

        return abort(response()->json('Unauthorized', 403));
    }
}
