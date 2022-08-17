<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {

            //dd($request);

            if($request->is('admin') || $request->is('admin/*'))

                return route('admin.login.index');


            else if($request->is('partner') || $request->is('partner/*'))

                return route('partner.login.index');

            else

            return route('login');
            /* if(Auth::guard('admin'))
                return route('admin.login.index');

            else if(Auth::guard('partner'))

                 return route('painel');
            else
                return route('login'); */

    }
}
}
