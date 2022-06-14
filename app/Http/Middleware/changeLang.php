<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Session;

class changeLang
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

       // }else{
            $lang =Session::get('lang');
       // }
        
        app()->setLocale($lang);
        return $next($request);
    }
}
