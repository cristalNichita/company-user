<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckUser
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
        if (!in_array(Auth::user()->role, ['user', 'business'])) {
            return redirect()->route('adminDashboardPage');
        }

        if (Auth::user()->role == 'user' && Auth::user()->active == 0) {
            Auth::logout();
            return redirect()->route('login')->with('error', trans('messages.login.is_active'));
        }

        return $next($request);
    }
}
