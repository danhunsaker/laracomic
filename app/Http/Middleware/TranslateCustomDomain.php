<?php

namespace App\Http\Middleware;

use Closure;

class TranslateCustomDomain
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $series = '')
    {
        $request->route()->setParameter('series', \App\Series::where(['route' => $series])->first());

        return $next($request);
    }
}
