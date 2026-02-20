<?php

class ContentSecurityPolicy
{
    public function handle($request, Closure $next)
    {
        $response = $next($request);

        $policy = config('security.csp.policy');

        $response->headers->set('Content-Security-Policy', $policy);

        return $response;
    }
}