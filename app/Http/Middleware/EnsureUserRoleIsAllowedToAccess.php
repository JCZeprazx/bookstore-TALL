<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class EnsureUserRoleIsAllowedToAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        try {
            $userRole = auth()->user()->role;
            $currentRouteName = Route::currentRouteName();

            if(in_array($currentRouteName, $this->userAccessRole()[$userRole]))
            {
                return $next($request);
            } else {
                abort(403, 'Unauthorized Action.');
            }
        } catch (\Throwable $th) {
            abort(403, "You're not allowed to access this page" );
        }
    }

    private function userAccessRole()
    {
        return [
            'user' => [
                'dashboard',
                'product',
                'about',
                'order',
                'product/',
            ],

            'admin' => [
                'dashboard',
                'product',
                'about',
                'order',
                'manage-orders',
                'manage-books',
                'statistic',
                'product/',
                'admin/'
            ]
        ];
    }
}
