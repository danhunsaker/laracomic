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
            $series = str_replace('.'.config('app.domain'), '', $request->getHost());
        }
        $object = \App\Series::where(['route' => $series])->first();

        $request->route()->parameters = array_prepend(
            $request->route()->parameters, $object, 'series');
        \View::share('series', $object);

        return $next($request);
    }
}
