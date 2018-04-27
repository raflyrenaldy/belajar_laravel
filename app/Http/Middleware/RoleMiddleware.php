<?php

namespace App\Http\Middleware;

use Closure;

class RoleMiddleware
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
         $user = \App\User::where('email', $request->email)->first();
        if ($user->role_id == '1') {
            return redirect('/register');
        }         
        return $next($request);
    }
}
