<?php

// Le middleware se trouve dans l'espace de noms HTTP Middleware de l'application.
namespace App\Http\Middleware;

// Closure représente la fonction anonyme $next qui enchaîne le prochain middleware.
use Closure;
// Request représente la requête HTTP entrante (URL, paramètres, utilisateur connecté, etc.).
use Illuminate\Http\Request;
// Response représente la réponse HTTP qui sera renvoyée au navigateur.
use Symfony\Component\HttpFoundation\Response;

// Middleware personnalisé qui permet de restreindre l'accès aux super administrateurs.
class IsSuperAdmin
{
    /**
     * Méthode appelée automatiquement à chaque fois que ce middleware est appliqué sur une route.
     *
     * @param  \Illuminate\Http\Request  $request  La requête HTTP reçue.
     * @param  \Closure  $next  La fonction qui appelle le prochain middleware / la route.
     * @return \Symfony\Component\HttpFoundation\Response  La réponse HTTP renvoyée au client.
     */
    public function handle(Request $request, Closure $next): Response
    {
        // On récupère l'utilisateur actuellement connecté via le helper auth().
        // Si un utilisateur est connecté ET qu'il possède le rôle de super administrateur,
        // on le laisse continuer vers la prochaine étape du pipeline (autres middlewares ou contrôleur).
         if (auth()->user() && auth()->user()->user_type === 'super_administrateur') { 
            return $next($request);
        }

        // Si l'utilisateur n'est pas super administrateur (ou pas connecté),
        // on le redirige vers la page de connexion avec un message d'erreur en session.
        return redirect()
            ->route('login')
            ->with('error', "Vous n'avez pas accès à cette section.");
    }
}