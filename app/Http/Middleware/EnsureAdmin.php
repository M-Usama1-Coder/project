<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EnsureAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check()) {
            $user = Auth::user();
            $currentGroup = !empty($user->group) ? $user->group->group->name : null;
            if ($currentGroup != 'Administrator') {
                return response('Unauthorized.', 401);
            }
        }

        return $next($request);
    }
}
