<?php 
$router = $this->app['router'];

$router->aliasMiddleware('security.headers', SecurityHeaders::class);
$router->aliasMiddleware('security.csp', ContentSecurityPolicy::class);
$router->aliasMiddleware('security.dos', DosProtection::class);