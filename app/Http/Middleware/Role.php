<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next,string $role)
    {
        if(Auth::user()->role_id == 0){
            return $next($request);
        }
        if($role =='admin' && Auth::user()->role_id != 1){
            abort(403);
        }
        if($role =='office_head' && Auth::user()->role_id !=2){
            abort(403);
        }
        if($role =='client' && Auth::user()->role_id !=3){
            abort(403);
        }
        return $next($request);
    }
}
