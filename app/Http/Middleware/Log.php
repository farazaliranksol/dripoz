<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Log
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
        $log = userPermission(auth()->user()->id);
        
        if($log->logs == 1 ){
            return $next($request);
        }else{
            return abort('404');
        }
    }
}
