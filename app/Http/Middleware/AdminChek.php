<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminChek
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->approved_at) {
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    
    }
}
