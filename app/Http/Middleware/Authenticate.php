<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Redirect;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    // protected function redirectTo($request)
    // {
        
    //     if (! $request->expectsJson()) {
    //         // dd("asd");
    //         // return view('auth.login');
    //         // return route('login_page');
    //         // return redirect('/login');
    //         return redirect()->route('login_page');
    //     }
        
    // }

    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // dd("asd");
            // return Redirect::route('register');
            header('Location: ' . route('login_page'));
            exit();
            // header()
            // return redirect()->route('register');
        }
    }
}
