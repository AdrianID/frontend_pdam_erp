<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class CheckJwt
{
    public function handle(Request $request, Closure $next)
    {
        if (!Cache::has('jwt_token')) {
            return redirect()->route('login');
        }

        return $next($request);
    }
} 