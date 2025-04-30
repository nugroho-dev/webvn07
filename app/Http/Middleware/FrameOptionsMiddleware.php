<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class FrameOptionsMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $response = $next($request);
        // Blok semua iframe
        $response->headers->set('X-Frame-Options', 'DENY');

        // Atau hanya izinkan iframe dari domain tertentu
        // $response->headers->set('X-Frame-Options', 'ALLOW-FROM https://yourdomain.com');

        return $response;
    }
}
