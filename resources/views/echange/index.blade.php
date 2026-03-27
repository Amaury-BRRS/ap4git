@extends('template')

@section('content')
<div class="container-fluid">
    <!-- Titre de la page -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Gestion des échanges</h1>
    </div>

    <!-- Messages de succès/erreur -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <!-- Colonne gauche : Formulaire de création -->
        <div class="col-lg-4">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Ajouter un échange</h6>
                </div>
                <div class="card-body">
                    <!-- Formulaire de création d'échange -->
                    <form action="{{ route('superadmin.echange.store') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input id="type" name="type" type="text" class="form-control" required placeholder="ex: email, téléphone">
                        </div>

                        <div class="form-group">
                            <label for="date_de_contact">Date de contact</label>
                            <input id="date_de_contact" name="date_de_contact" type="date" class="form-control" required>
                        </div>

                        <div class="form-group">
                            <label for="user_id">Utilisateur</label>
                            <select id="user_id" name="user_id" class="form-control" required>
                                <option value="">Sélectionner un utilisateur</option>
                                @foreach($users as $u)
                                    <option value="{{ $u->id }}">{{ $u->nom }} {{ $u->prenom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="enquete_id">Enquête</label>
                            <select id="enquete_id" name="enquete_id" class="form-control" required>
                                <option value="">Sélectionner une enquête</option>
                                @foreach($enquetes as $enquete)
                                    <option value="{{ $enquete->id }}">{{ $enquete->titre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="participant_id">Participant</label>
                            <select id="participant_id" name="participant_id" class="form-control" required>
                                <option value="">Sélectionner un participant</option>
                                @foreach($participants as $p)
                                    <option value="{{ $p->id }}">{{ $p->nom }} {{ $p->prenom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Créer</button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Colonne droite : Liste des échanges -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Liste des échanges</h6>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <!-- Tableau des échanges existants -->
                        <table class="table table-bordered" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Type</th>
                                    <th>Date</th>
                                    <th>Utilisateur</th>
                                    <th>Enquête</th>
                                    <th>Participant</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($echanges as $e)
                                    <tr>
                                        <td>{{ $e->id }}</td>
                                        <td>{{ $e->type }}</td>
                                        <td>{{ $e->date_de_contact }}</td>
                                        <td>{{ $e->user->nom ?? '-' }} {{ $e->user->prenom ?? '' }}</td>
                                        <td>{{ $e->enquete->titre ?? '-' }}</td>
                                        <td>{{ $e->participant->nom ?? '-' }} {{ $e->participant->prenom ?? '' }}</td>
                                        <td>
                                            <!-- Boutons d'action : modifier et supprimer -->
                                            <a href="{{ route('superadmin.echange.edit', $e->id) }}" class="btn btn-sm btn-primary">Modifier</a>
                                            <form action="{{ route('superadmin.echange.destroy', $e->id) }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet échange ?')">Supprimer</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection