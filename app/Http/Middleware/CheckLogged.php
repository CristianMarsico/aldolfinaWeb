<?php

namespace App\Http\Middleware;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckLogged
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('ID_USER')) {

            return redirect('/');
        }

        return $next($request);
    }
}