<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Log;

class LogRoute
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
        $response = $next($request);

        if (app()->environment('local')) {
            $log = [
//                'URI' => $request->getUri(),
//                'METHOD' => $request->getMethod(),
                'REQUEST_BODY' => $request->file('photos'),
//                'RESPONSE' => $response->getContent()
            ];

            Log::info(json_encode($log));
        }

        return $response;
    }
}
