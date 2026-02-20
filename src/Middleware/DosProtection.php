<?php 

class DosProtection
{
    public function handle($request, Closure $next)
    {
        if (app()->environment('production')) {
            $key = $request->ip();

            $maxAttempts = config('security.dos.max_attempts');
            $decay = config('security.dos.decay_seconds');

            if (cache()->has($key) && cache()->get($key) >= $maxAttempts) {
                abort(429, 'Too Many Requests');
            }

            cache()->increment($key);
            cache()->put($key, cache()->get($key), $decay);
        }

        return $next($request);
    }
}