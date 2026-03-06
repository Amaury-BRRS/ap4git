<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Accueil</title>

    <!-- Fonts / CSS SB Admin 2 -->
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center align-items-center" style="min-height: 100vh;">
            <div class="col-xl-8 col-lg-9">

                <div class="card o-hidden border-0 shadow-lg">
                    <div class="row no-gutters">
                        <!-- Colonne image / déco -->
                        <div class="col-lg-6 d-none d-lg-block"
                            style="background: linear-gradient(135deg,rgba(241, 134, 40, 0.69),rgb(255, 255, 255));">
                             <img src="{{ asset('/image/logo.png') }}" alt="Logo" class="img-fluid">
                        </div>

                        <!-- Colonne contenu -->
                        <div class="col-lg-6">
                            <div class="p-5 d-flex flex-column h-100">
                                <div class="mb-4">
                                    <h1 class="h3 text-gray-900 mb-3">Bienvenue sur Excellence Pro Franche-Comté</h1>
                                    <p class="text-muted mb-0">
                                        Plateforme d’enquêtes et de formulaires pour Excellence Pro Franche-Comté.
                                    </p>
                                </div>

                                <div class="mt-auto">
                                    <div class="mb-3">
                                        <a href="{{ route('login') }}" class="btn btn-primary btn-user btn-block">
                                            <i class="fas fa-sign-in-alt mr-2"></i> Se connecter
                                        </a>
                                    </div>

                                    @if (Route::has('register'))
                                        <div class="mb-3">
                                            <a href="{{ route('register') }}" class="btn btn-outline-primary btn-user btn-block">
                                                <i class="fas fa-user-plus mr-2"></i> Créer un compte
                                            </a>
                                        </div>
                                    @endif

                                    <p class="text-center text-muted small mb-0">
                                        Besoin d’aide ? Contactez l’administrateur de la plateforme.
                                    </p>
                                </div>
                            </div>
                        </div> <!-- /col contenu -->
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- JS SB Admin 2 -->
    <script src="{{ asset('sbadmin2/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
    <script src="{{ asset('sbadmin2/js/sb-admin-2.min.js') }}"></script>

</body>
</html>