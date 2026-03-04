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
        if (auth()->user() && auth()->user()->est_admin) { 
        return $next($request);
    }
     return redirect()->route('A MODIFIER POUR METTRE PAGE DE LOGIN OU PAGE ACCUEIL !!! ')->with('error', "Vous n'avez pas accès à cette section."); 
}
}