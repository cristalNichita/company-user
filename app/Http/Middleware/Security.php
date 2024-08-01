<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Closure;

class Security
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
        $curPath = (request()->path());
        $ip = $request->ip();

        // Action check that duplicate request.
        $date = Carbon::now();
        $curTime = (int) $date->valueOf();
        if (Cache::has('action.' . $ip . '/' . $curPath)) {
            return response()->json([
                'status' => 0,
                'result' => new \stdClass(),
                'message' => trans('api.auth.duplicate_request'),
            ]);
        }

        Cache::put('action.' . $ip . '/' . $curPath, '', config('constant.duplicate_request_timeout'));

        // Requested time check that old time.
        $reqTime = request()->header('time');
        $timeDef = ($curTime - $reqTime);
        if ($timeDef > config('constant.requested_timeout')) {
            return response()->json([
                'status' => 0,
                'result' => new \stdClass(),
                'message' => trans('api.auth.requested_time_old'),
            ]);
        }

        // Requested MD5 token check
        if (empty($request->all())) {
            $md5Token = md5(config('constant.apiKey') . "/" . request()->header('time'));
        } else {
            $md5Token = md5(config('constant.apiKey') . json_encode($request->all()) . request()->header('time'));
        }

        if ($md5Token == request()->header('Content-MD5')) {
            return $next($request);
        }

        return response()->json([
            'status' => 0,
            'result' => new \stdClass(),
            'message' => trans('api.auth.md5_token_mismatch'),
        ]);
    }
}
