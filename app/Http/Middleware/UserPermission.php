<?php

namespace App\Http\Middleware;

use App\Models\ClientUserPermission;
use Closure;
use Illuminate\Http\Request;

class UserPermission
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
        $userPermissions = ClientUserPermission::where('user_id', auth()->user()->id)->first();
        $userPermissions = $userPermissions->toArray();
        // dd($userPermissions);
            if ($userPermissions) {
                return $next($request);
            } else {
                return abort('404');
            }
       
    }
}
