<?php

namespace App\Http\Middleware;

use Closure;

class CheckPermissionLevel
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $level)
    {
        $user = Auth::user();
        if ($user->permission_level < $level)
            return redirect('/dashboard');

        return $next($request);
    }
}
