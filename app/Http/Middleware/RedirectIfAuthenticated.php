<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Contracts\Auth\Guard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     *
     * /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  \Closure $next
     * @param  string|null ...$guards
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        if ($this->auth->check()) {

            $auth = Auth::user()->role_id;

            switch ($auth) {
                case 1:
                    return redirect()->route('admin.dashboard');
                    break;
                case 2:
                    return redirect()->route('user.dashboard');
                    break;
                case 3:
                    return redirect()->route('admin.dashboard');
                    break;

            }

        }
        return $next($request);
//
//        $guards = empty($guards) ? [null] : $guards;
//        foreach ($guards as $guard) {
//            if (Auth::guard($guard)->check() && Auth::user()->role_id == 1 ) {
//                return redirect()->route('admin.dashboard');
//            }elseif (Auth::guard($guard)->check() && Auth::user()->role_id == 2) {
//                return redirect()->route('user.dashboard');
//            }else{
//                return $next($request);
//            }
//        }

    }
}
