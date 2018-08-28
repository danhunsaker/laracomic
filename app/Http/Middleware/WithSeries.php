<?php

namespace App\Http\Middleware;

use Closure;

class WithSeries
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
        if (empty($series)) {
            $object = \App\Series::where(['route' => str_replace('.'.config('app.domain'), '', $request->getHost())])->first();
        } else {
            $object = \App\Series::where(['route' => $series])->first();
        }

        $request->route()->setParameter('series', $object);
        \View::share('series', $object);

        return $next($request);
    }
}
