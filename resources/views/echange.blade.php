<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    {{-- stack sert à envoyer tel champ vers une page qui appellera  @push('name') --}}
    <title> @stack('title', 'Les échanges - Excellence Pro Franche-Comté') </title>

    <!-- Custom fonts for this template-->
    <link href="{{ asset('/') }}sbadmin2/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/') }}sbadmin2/css/sb-admin-2.min.css" rel="stylesheet">
    <link href="{{ asset('/') }}sbadmin2/css/sbadminTemplate.css" rel="stylesheet">

    {{-- envoie des styles --}}
    @stack('styles')
</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        <!-- Sidebar -->
        {{-- utilisation d'un include pour que le code soit plus propre et segmenter sur plusieurs fichiers ici renvoie vers sidebar.blade.php --}}
        @include('layouts.sidebar')
        <!-- End of Sidebar -->

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <!-- Main Content -->
            <div id="content">

                <!-- Topbar -->
                @include('layouts.navbar')
                <!-- End of Topbar -->

                <!-- Begin Page Content -->
                {{-- instanciation d'un champ vide => l'endroit où notre contenu principal sera affiché  --}}
                <div class="container-fluid">

                    <!-- Page Heading -->
                    <div class="d-sm-flex align-items-center justify-content-between mb-4">
                        <h1 class="h3 mb-0 text-gray-800">Les échanges</h1>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                     <!-- Content Row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Échanges</h6>
                                </div>
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                            <thead>
                                                <tr>
                                                    <th>ID</th>
                                                    <th>User ID</th>
                                                    <th>Type</th>
                                                    <th>Date de Contact</th>
                                                    <th>Enquête ID</th>
                                                    <th>Participant ID</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach($echanges as $echange)
                                                <tr>
                                                    <td>{{ $echange->id }}</td>
                                                    <td>{{ $echange->user_id }}</td>
                                                    <td>{{ $echange->type }}</td>
                                                    <td>{{ $echange->date_de_contact }}</td>
                                                    <td>{{ $echange->enquete_id }}</td>
                                                    <td>{{ $echange->participant_id }}</td>
                                                </tr>
                                                @endforeach
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>