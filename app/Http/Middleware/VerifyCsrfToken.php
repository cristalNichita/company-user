<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;
use Closure;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array
     */
    protected $except = [
        "webauthnvalid",
    ];

    public function handle($request, Closure $next)
    {
        if ($request->is('login') || $request->is('register')) {
            $user = $request->user();
            if ($user) {
                return redirect()->route('settingForm');
            }
        }
        return $next($request);
    }
}
