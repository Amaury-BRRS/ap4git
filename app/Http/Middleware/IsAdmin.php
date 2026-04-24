<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {

        if (auth()->user() && (auth()->user()->user_type === 'administrateur' || auth()->user()->user_type === 'super_administrateur' )) { 
            return $next($request);
        }
        return redirect()->route('accueil')->with('error', "Vous n'avez pas accès à cette section."); 
    }
}