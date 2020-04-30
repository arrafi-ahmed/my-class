<?php

namespace App\Http\Middleware;

use Closure;

class checkRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, ... $roles)
    {
        $found = false;
        foreach ($roles as $role) {
            if (session('type') == $role) {
                $found = true; break;
            }
        }

        if (!$found) {
            return back()->with('error','Access denied!');
        }
        
        return $next($request);
    }
}
