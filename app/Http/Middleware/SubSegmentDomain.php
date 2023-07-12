<?php

namespace App\Http\Middleware;

use App\Models\Client;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubSegmentDomain
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
        $subdomain = $request->segment(1);
        $user = Auth::user();
        $currentGroup = !empty($user->group) ? $user->group->group->name : null;
        if ($currentGroup == 'Administrator') {
            if ($subdomain != 'admin') {
                abort(401);
            }
        } else {
            $client_id = $user->client_id;
            $client = Client::where('id', $client_id)->first();
            if ($client->domain != $subdomain) {
                abort(401);
            }
        }
        return $next($request);
    }
}
