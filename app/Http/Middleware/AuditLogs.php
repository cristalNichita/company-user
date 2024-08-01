<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Models\AuditLog;
use App\Models\Module;
use Closure;

class AuditLogs
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
        $module = $request->path();
        $method = explode('/', $module);
        $ip = $request->ip();

        $moduleInfo = Module::where('slug', $method[0])->first();
        $slug = !empty($moduleInfo->slug) ? $moduleInfo->slug : "";

        $isEditLog = end($method);
        // Permission role wise create activity logs
        if ($isEditLog == 'audit-logs' || $slug != $method[0]) {
            return $next($request);
        }

        $authUser = Auth::user();
        $userId = $authUser->id;

        // check login user is business or member
        $parentUserId = $authUser->role == 'business' ?  $authUser->id :  $authUser->parentId;

        $methodName = explode('@', Route::getCurrentRoute()->getActionName());

        if ($moduleInfo) {
            $array = json_decode($moduleInfo->methods, true);

            if (isset($array[$methodName[1]])) {
                $array = ['key' => $methodName[1], 'value' => $array[$methodName[1]]];

                $action = $array['key'];
                $desc = $array['value'];

                AuditLog::create([
                    'userId' => $userId,
                    'parentId' => $parentUserId,
                    'ipAddress' => $ip,
                    'action' => $action,
                    'description' => $desc
                ]);
            }
        }

        return $next($request);
    }
}
