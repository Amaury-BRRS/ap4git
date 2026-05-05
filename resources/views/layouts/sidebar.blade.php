<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

            <!-- Sidebar - Brand -->
            <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{ route('template') }}">
                <div class="sidebar-brand-icon rotate-n-15">
                    <i class="fas fa-laugh-wink"></i>
                </div>
                <div class="sidebar-brand-text mx-6">Excellence Pro Franche-Comté</div>
            </a>

            <!-- Divider -->
            <hr class="sidebar-divider my-0">
            
            <!-- Nav Item - Dashboard -->
            <li class="nav-item">
                <a class="nav-link" href="{{ route('template') }}">
                    <i class="fas fa-fw fa-tachometer-alt"></i>
                    <span>Tableau de bord</span></a>

            </li>

            <!-- Divider -->
            <hr class="sidebar-divider">



            @if(auth()->user() && (auth()->user()->user_type === 'super_administrateur' ))
            <!-- Heading -->
            <div class="sidebar-heading">
                Interface
            </div>

            <!-- Nav Item - Pages Collapse Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
                    aria-expanded="true" aria-controls="collapseTwo">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>liste d'utilisateurs</span>
                </a>
                <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Les utilisateurs :</h6>
                        
                        @if (auth()->user() && (auth()->user()->user_type === 'super_administrateur' ))
                            <a class="collapse-item" href="{{ route('liste_utilisateurs.user') }}">Liste des users</a>
                            <a class="collapse-item" href="{{ route('liste_utilisateurs.admin') }}">Liste des admin</a>
                            <a class="collapse-item" href="{{ route('liste_utilisateurs.super_admin') }}">Liste des super admin</a>
                            <a class="collapse-item" href="{{ route('register') }}">Créer un utilisateur</a>
                        @else
                            <a class="collapse-item" href="{{ route('liste_utilisateurs.user') }}">Liste des users</a>
                        @endif
                    </div>
                </div>
            </li>
            @endif

            <!-- Nav Item - Utilities Collapse Menu -->
                @if(auth()->user() && (auth()->user()->user_type === 'super_administrateur' ))
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEnquetes"
                    aria-expanded="true" aria-controls="collapseEnquetes">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>liste des enquêtes</span>
                </a>
                <div id="collapseEnquetes" class="collapse" aria-labelledby="headingEnquetes"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Les enquêtes :</h6>
                        <a class="collapse-item" href="{{ route('superadmin.enquete.index') }}">Gérer les enquêtes</a>
                        {{-- <a class="collapse-item" href="">Gérer les enquêtes</a> --}}
            </li>
             @endif

              @if(auth()->user() && (auth()->user()->user_type === 'super_administrateur' ))
            <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseEchanges"
                    aria-expanded="true" aria-controls="collapseEchanges">
                    <i class="fas fa-fw fa-wrench"></i>
                    <span>Les échanges</span>
                </a>
                <div id="collapseEchanges" class="collapse" aria-labelledby="headingEchanges"
                    data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Les échanges :</h6>
                        <a class="collapse-item" href="{{ route('superadmin.echange.index') }}">Liste des échanges</a>
            </li>
             @endif

            

            

            <!-- Nav Item - Tables -->
            <li class="nav-item">
                <a class="nav-link" href="tables.html">
                    <i class="fas fa-fw fa-table"></i>
                    <span>Tables</span></a>
            </li>

            <!-- Divider -->
            <hr class="sidebar-divider d-none d-md-block">

            <!-- Sidebar Toggler (Sidebar) -->
            <div class="text-center d-none d-md-inline">
                <button class="rounded-circle border-0" id="sidebarToggle"></button>
            </div>

        </ul>