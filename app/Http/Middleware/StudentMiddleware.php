<?php


namespace App\Http\Middleware;


use Auth;
use Closure;

class StudentMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        if (!Auth::user()->isStudent()) {
            return redirect()->route('homepage');
        }

        return $next($request);
    }
}