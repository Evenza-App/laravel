<?php

namespace App\Http\Middleware;

use App\Models\ApiCredintial;
use Closure;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class ApiMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->header('EVENZA_KEY');
        $secret = $request->header('EVENZA_SECRET');
        $credintials = ApiCredintial::first();
        if (!Hash::check($key, $credintials->key) || !Hash::check($secret, $credintials->secret)) {
            throw new AuthorizationException();
        }
        return $next($request);
    }
}
