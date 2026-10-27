<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Session;
use Symfony\Component\HttpFoundation\Response;

class Localization
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // If a locale is stored in the session, set it as the app locale for this request
        if(Session::has('locale')){
            app()->setlocale(Session::get('locale'));
        }
        return $next($request);
    }
}
