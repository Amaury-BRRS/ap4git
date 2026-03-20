<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- stack sert à envoyer tel champ vers une page qui appellera  @push('name') --}}
    <title> @stack('title', 'Excellence Pro Franche-Comté') </title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/') }}sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/') }}sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}sbadmin2/css/sbadminTemplate.css" rel="stylesheet">
    {{-- @vite('resources/css/styles.css') --}}
    

    {{-- envoie des styles --}}
    @stack('styles')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        {{-- utilisation d'un include pour que le code soit plus propre et segmenter sur plusieurs fichiers ici renvoie vers sidebar.blade.php --}}
        <ul class="navbar-nav sidebar sidebar-dark accordion" id="accordionSidebar">
 
            <a class="sidebar-brand d-flex align-items-center justify-content-center" style="padding-top: 15px !important; height: auto;">
 
                <div class="sidebar-brand-icon rotate-n-15"></div>
                <div class="sidebar-brand-text mx-3"><img class="logo" src="#" width="50%" height="50%">Excellence Pro Franche-Comté<br></div>
            </a>
 
            <hr class="sidebar-divider my-0">

            <li class="nav-item active">
                <a class="nav-link" href="{{ route('superadmin.index') }}">
                    <i class="fas fa-home"></i>
                    <span>Accueil</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">

            <li class="nav-item active">
                <a class="nav-link" href={{ route('superadmin.etablissement.create') }}>
                    <i class="fas fa-building"></i>
                    <span>Ajouter un établissement</span>
                </a>
            </li>

            <hr class="sidebar-divider d-none d-md-block">
 
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-graduation-cap"></i>
                    <span>Ajouter une formation</span>
                </a>
            </li>
 
            <hr class="sidebar-divider d-none d-md-block">

            {{-- lien vers gestion des enquetes --}}
            <li class="nav-item active">
                <a class="nav-link" href={{ route('enquete.liste') }}>
                    <i class="fa-solid fa-clipboard-list"></i>
                    <span>Gérer les enquêtes</span>
                </a>
            </li>
 
            <hr class="sidebar-divider d-none d-md-block">
 
            <li class="nav-item active">
                <a class="nav-link" href="#">
                    <i class="fas fa-user-tie"></i>
                    <span>Page administrateur</span>
                </a>
            </li>
 
            <hr class="sidebar-divider d-none d-md-block">
 
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>
 
        </ul>       
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
                    <h2>Super Administrateur</h2>
                    <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                    </button>
 
                    <ul class="navbar-nav ml-auto">
 
                        <div class="topbar-divider d-none d-sm-block"></div>
 
                        <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="mr-2 d-none d-lg-inline text-gray-600 small">Nom Prenom</span>
                        <img class="img-profile rounded-circle" src="{{ asset('sbadmin2/img/undraw_profile.svg') }}">
                        </a>
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown"></div>
                        </li>
                    </ul>
                </nav>
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                {{-- instanciation d'un champ vide => l'endroit où notre contenu principal sera affiché  --}}
                @session('success')
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endsession
                @session('error')
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endsession
                @yield('content')
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->
            
            <!-- Footer -->
            @include('layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Logout Modal-->
    <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                    <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <a class="btn btn-primary" href="login.html">Logout</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/') }}sbadmin2/vendor/jquery/jquery.min.js"></script>
    <script src="{{ asset('/') }}sbadmin2/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/') }}sbadmin2/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/') }}sbadmin2/js/sb-admin-2.min.js"></script>

    @stack('scripts')

</body>

</html>