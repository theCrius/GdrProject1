<?php

namespace App\Http\Middleware;
use Closure;

class LastUserActivity
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
        if ( \Auth::check() ) {

            $expiresAt = now()->addMinutes(15);
            $idUsersOnline = \Cache::get('users-online') ?? [];
            $user = \Auth::user() ; 
            if( in_array( [ 'name' => $user->name , 'luogo' => $user->last_chat ]  , $idUsersOnline) ) return $next($request);
            array_push( $idUsersOnline,  [ 'name' => $user->name , 'luogo' => $user->last_chat ] );
            \Cache::put('users-online', $idUsersOnline , $expiresAt);
        }
        return $next($request);
    }
}
