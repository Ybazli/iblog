<?php

namespace App\Http\Middleware;

use Closure;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return app(Authenticate::class)->handle($request, function ($request) use ($next) {
            //Put your awesome stuff there. Like:
            if (!auth()->user()->is_admin) {
//                return redirect()->home();
                return abort(403);
            }

            //Then process the next request if every tests passed.
            return $next($request);
        });
    }
}
