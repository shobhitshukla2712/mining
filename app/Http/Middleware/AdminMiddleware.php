<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Session;

class AdminMiddleware
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
        $user = Auth::user();

        // If the logged-in user is not admin, redirect the user to '/'
        if( $user->role_id != '0' )
        {
            // Logout the user
            Auth::logout();

            Session::flash('alert-class', 'alert-danger');
            return redirect('/')->with('message', 'Unauthorized access!!'); 
        }

        return $next($request);
    }
}
