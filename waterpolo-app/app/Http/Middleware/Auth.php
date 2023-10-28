<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Auth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $requestedUserId = $request->route('user')->id;

        if (auth()->id() != $requestedUserId) {

            return redirect('/home')->with('error','je mag niet naar een profiel van iemadn anders gaan!') ; // Hier kun je de URL voor ongeautoriseerde toegang instellen.
        }

        return $next($request);
    }
}
