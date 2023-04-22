<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;

class RoleAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role)
    {
        $roles = explode(';', $role);
        $userrole = User::where('id', '=', session('Logged_user')->id)->first()->role->role_name;
        
        if (in_array($userrole, $roles)) {
            return $next($request);
        } else {
            return redirect()->route('forbidden'); 
        }
    }
}