<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('Logged_user')) {
            return redirect('/crm_systems')->with('fail', 'Please enter credentials to log-in');
        }

        if (!session()->has('Logged_user') && ($request)->path() != '/crm_systems') {
            return redirect('/crm_systems')->with('fail', 'Please enter credentials to log-in');
        }

        if (session()->has('Logged_user') && ($request)->path() == '/crm_systems') {
            return back();
        }

        $response = $next($request);
        return $response->header('Cache-Control', 'no-cache, no-store, max-age=0, must-revalidate')->header('Expires', 'Sat, 01 Jan 1990 00:00:00 GMT')->header('Pragma', 'no-cache');
    }
}