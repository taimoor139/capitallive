<?php

namespace App\Http\Middleware;

use App\Models\Deposit;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SystemAccess
{
    /**
     * Handle an incoming request.
     *
     * @param \Illuminate\Http\Request $request
     * @param \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse) $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $deposits = Deposit::query()->where('userId', auth()->user()->id)->first();
        if ($deposits) {
            return $next($request);
        } else {
            return redirect()->route('deposit-dashboard');
        }
    }
}
