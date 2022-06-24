<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        // switch ($guard) {
        //     case 'admin':
        //       if (Auth::guard($guard)->check()) {
        //         return redirect()->route('admin.dashboard');
        //       }
        //       break;
        //     case 'writer':
        //       if (Auth::guard($guard)->check()) {
        //         return redirect()->route('writer.dashboard');
        //       }
        //       break;
        //     default:
        //       if (Auth::guard($guard)->check()) {
        //           return redirect('/home'); 
        //       }
        //       break;
        //   }
        $guards = empty($guards) ? [null] : $guards;
        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                if ($guard == 'user') {
                    $guard = 'recruiter';
                }
                return redirect('/' . $guard . '/dashboard');
            }
        }

        return $next($request);
    }
}
