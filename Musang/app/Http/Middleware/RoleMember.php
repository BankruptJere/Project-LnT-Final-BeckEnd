<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class RoleMember
{
    public function handle(Request $request, Closure $next)
    {
        $user = $request->user();
        return ($user && $user->role == 'Member') ? $next($request) : redirect('/');
        // if ($user) {
        //     if ($user->role == 'Member') {
        //         return $next($request);
        //     }
        // }
        // return redirect('/');
    }
}
