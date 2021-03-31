<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfGestore
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
        if($request->user()->isGestore($request->idUser)) return $next($request);

        return abort(response()->json('Unauthorized', 403));
        
    }
}
