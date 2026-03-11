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
<<<<<<< HEAD
        if (auth()->user() && auth()->user()->est_admin) { 
        return $next($request);
    }
     return redirect()->route('A MODIFIER POUR METTRE PAGE DE LOGIN OU PAGE ACCUEIL !!! ')->with('error', "Vous n'avez pas accès à cette section."); 
<<<<<<< HEAD
=======
        if (auth()->check() && auth()->user()->isAdmin()) { 
            return $next($request);
        }
        return redirect()->route('accueil')->with('error', "Vous n'avez pas accès à cette section."); 
>>>>>>> 87e51b9 (modif en bdd)
    }
=======
}
>>>>>>> features/teste/middleware/IsSuperAdmin
}