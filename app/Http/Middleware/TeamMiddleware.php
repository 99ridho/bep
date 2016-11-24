<?php

namespace App\Http\Middleware;

use Closure;

class TeamMiddleware
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
        $type = auth()->user()->type->type;

        if ($type != 'Team')
            return response('Unauthorized.', 401);

        return $next($request);
    }
}
