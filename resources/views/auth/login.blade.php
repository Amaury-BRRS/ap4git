{{-- resources/views/login.blade.php --}}
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Connexion</title>

    <!-- Fonts / CSS SB Admin 2 -->
    <link href="{{ asset('sbadmin2/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">
    <link href="{{ asset('sbadmin2/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <div class="row">
                            <!-- Colonne image / déco -->
                            <div class="col-lg-6 d-none d-lg-block"
                                 style="background: linear-gradient(135deg, rgba(78,115,223,.9), rgba(34,74,190,.9));">
                                <img src="{{ asset('/image/logo.png') }}" alt="Logo" class="img-fluid">
                            </div>

                            <!-- Colonne formulaire -->
                            <div class="col-lg-6">
                                <div class="p-5">

                                    <div class="text-center mb-4">
                                        <h1 class="h4 text-gray-900 mb-2">Connexion</h1>
                                        <p class="text-muted mb-0">Ravi de vous revoir.</p>
                                    </div>

                                    @if (session('status'))
                                        <div class="alert alert-success">
                                            {{ session('status') }}
                                        </div>
                                    @endif

                                    @if (session('error'))
                                        <div class="alert alert-danger">
                                            {{ session('error') }}
                                        </div>
                                    @endif

                                    <form class="user" method="POST" action="{{ route('login') }}">
                                        @csrf

                                        <!-- Email -->
                                        <div class="form-group">
                                            <input
                                                type="email"
                                                name="email"
                                                value="{{ old('email') }}"
                                                class="form-control form-control-user @error('email') is-invalid @enderror"
                                                id="email"
                                                placeholder="Adresse e‑mail"
                                                required
                                                autofocus
                                                autocomplete="username"
                                            >
                                            @error('email')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Mot de passe -->
                                        <div class="form-group">
                                            <input
                                                type="password"
                                                name="password"
                                                class="form-control form-control-user @error('password') is-invalid @enderror"
                                                id="password"
                                                placeholder="Mot de passe"
                                                required
                                                autocomplete="current-password"
                                            >
                                            @error('password')
                                                <div class="invalid-feedback d-block">
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>

                                        <!-- Remember -->
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                                <label class="custom-control-label" for="remember">
                                                    Se souvenir de moi
                                                </label>
                                            </div>
                                        </div>

                                        <!-- Bouton -->
                                        <button type="submit" class="btn btn-primary btn-user btn-block">
                                            Se connecter
                                        </button>

                                        <hr>

                                        <div class="text-center">
                                            @if (Route::has('password.request'))
                                                <a class="small" href="{{ route('password.request') }}">
                                                    Mot de passe oublié ?
                                                </a>
                                            @endif
                                        </div>

                                        <div class="text-center">
                                            @if (Route::has('register'))
                                                <a class="small" href="{{ route('register') }}">
                                                    Pas de compte ? Créer un compte
                                                </a>
                                            @endif
                                        </div>
                                    </form>

                                </div>
                            </div> <!-- /col form -->
                        </div>
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