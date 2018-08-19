<?php

namespace App\Http\Middleware;

use Closure;

class RemoveCookiesWithoutConsent
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
        $response = $next($request);

        if (config('cookie-consent.enabled') && ! $request->cookies->has(config('cookie-consent.cookie_name'))) {
            $response->headers->remove('set-cookie');
        }

        return $response;
    }
}
