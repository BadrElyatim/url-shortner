<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Http\Client\ConnectionException;

class UrlIsReachable
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $request->validate([
            'url' => ['required', 'url']
        ]);

        try {
            $response = Http::get($request->input('url'));
            return $next($request);
        }
        catch (ConnectionException $e) {
            return redirect()->route('home')->withErrors(['url' => 'This site can’t be reached']);
        }
        
    }
}
