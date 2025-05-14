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
            "font-src 'self' https://rsms.me https://fonts.gstatic.com/ data:",
            "script-src 'self' 'nonce-{$nonce}' https://code.jquery.com https://cdn2.woxo.tech https://platform.twitter.com/ https://www.instagram.com/ https://cdnjs.cloudflare.com/ https://buttons.github.io/",
            "connect-src 'self' https://www.google-analytics.com https://analytics.google.com",
            "style-src 'self' 'unsafe-inline' https://rsms.me/ https://code.jquery.com https://fonts.googleapis.com/",
            "img-src 'self' data: https://www.google-analytics.com https://www.google.co.id",
            "frame-src https://verifikasipdf.rootca.id/ https://www.google.com/ https://widgets.woxo.tech/ https://www.facebook.com/ https://platform.twitter.com https://syndication.twitter.com/ https://www.instagram.com https://www.youtube.com",
            "base-uri 'self'",
            "form-action 'self'",
        ]));

        return $response;
    }
}
