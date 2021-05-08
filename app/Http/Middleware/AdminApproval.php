<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminApproval
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
        if (auth()->user()->approved_at == null) {

            return redirect()->route('approval');
        }
        return $next($request);
    }
}
