<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $isActive = auth()->user()->status;
                if ($isActive==='Active') {
                    $user_type = auth()->user()->role;
                //   dd($user_type);
                if($user_type==='SuperAdmin'){
                    return redirect('/dashboard');
                }elseif($user_type==='Admin'){
                    return redirect('/console');
                }elseif($user_type==='Accounting'){
                    // return redirect('login');
                    
                }
               
                // return redirect(RouteServiceProvider::dashboard);
            }else{
                Session::put('error', 'Your account is Inactive. ');
                Auth::logout();
            }
        }
    }
        return $next($request);
    }
}
