<?php

namespace App\Http\Middleware;

use App\Events\OnlineStatus;
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

            $expiresAt = now()->addMinutes(env("AUTOLOGOUT_TIME"));
            $idUsersOnline = \Cache::get('users-online') ?? [];
            $user = \Auth::user() ; 
            if( \Cache::tags(['users-online'])->get($user->id) ) return $next($request);

            \Cache::tags(['users-online'])->put($user->name,$user->id, $expiresAt);

            event(new OnlineStatus);
        }
        return $next($request);
    }
}
