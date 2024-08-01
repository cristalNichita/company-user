<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Helpers\CommonHelper;
use Illuminate\Http\Request;
use Closure;

class CheckUserRolePermission
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
        $getUser = Auth::user();
        $slug = $request->path();
        $slug = explode("/", $slug);

        $checkSlug1 = array_key_exists(1, $slug);


        if ($checkSlug1 == true) {
            if (!empty($slug[1])) {
                $slug = $slug[0];
            } else {
                $slug = $slug[1];
            }
        } else {
            $slug = $slug[0];
        }


        if ($getUser->role == 'business') {
            return $next($request);
        }

        $currentAction = Route::currentRouteAction();
        $method = explode("@", $currentAction);
        $methodName = $method[1];
        if (($getUser->role) && $slug == 'dashboard' || $slug == 'audit-logs' || $slug == 'setting' || $slug == 'passwords' || $slug == 'passkey' || $slug == 'user-contact-us' || $slug == 'installed-passkey' || CommonHelper::getUserCustomMultipleRoles($methodName, $slug)) {
            return $next($request);
        }

        return abort(403);
    }
}
