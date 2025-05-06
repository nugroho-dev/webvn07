<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ContentSecurityPolicy
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
       

        //$response = $next($request);
        //$response->headers->set('Content-Security-Policy', "default-src 'self'; script-src 'self'; style-src 'self';");
        //return $response;

        // Generate nonce
        $nonce = base64_encode(random_bytes(16));

        // Share nonce ke semua views
        view()->share('cspNonce', $nonce);

        // Set CSP Header
        $response = $next($request);
        $response->headers->set('Content-Security-Policy', implode('; ', [
            "default-src 'none'",
            "font-src 'self'",
            "script-src 'self' 'nonce-{$nonce}'",
            "style-src 'self' 'nonce-{$nonce}'",
            "img-src 'self' data:",
            "frame-src https://verifikasipdf.rootca.id/",
            "base-uri 'self'",
            "form-action 'self'",
        ]));

        return $response;
    }
}
