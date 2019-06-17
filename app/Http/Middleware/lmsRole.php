<?php

namespace App\Http\Middleware;

use Closure;
use App\Models\User;
use Auth;


class lmsRole
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

        // $user = User::Auth();

        if (Auth::User()->roleId == 2){

            return redirect('/admin');

        } elseif ( Auth::User()->roleId == 3) {

            return redirect('/admin');

        }

        return $next($request);
    }
}
