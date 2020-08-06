<?php

namespace App\Http\Middleware;

use Closure;
use App\User;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Support\Facades\Auth;

class CheckUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next , $role)
    {
        
        if(!$request->user()->hasRole($role))  \Error('Non hai i poteri sufficienti');
        return $next($request);
    }
}
