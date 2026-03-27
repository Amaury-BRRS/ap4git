@extends('template')

@section('content')
<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Modifier l'échange</h1>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="row">
        <div class="col-lg-6">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Modifier l'échange</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('superadmin.echange.update', $echange->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="type">Type</label>
                            <input id="type" name="type" type="text" class="form-control" value="{{ $echange->type }}" required>
                        </div>

                        <div class="form-group">
                            <label for="date_de_contact">Date de contact</label>
                            <input id="date_de_contact" name="date_de_contact" type="date" class="form-control" value="{{ $echange->date_de_contact }}" required>
                        </div>

                        <div class="form-group">
                            <label for="user_id">Utilisateur</label>
                            <select id="user_id" name="user_id" class="form-control" required>
                                <option value="">Sélectionner</option>
                                @foreach($users ?? [] as $u)
                                    <option value="{{ $u->id }}" {{ $echange->user_id == $u->id ? 'selected' : '' }}>{{ $u->nom }} {{ $u->prenom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="enquete_id">Enquête</label>
                            <select id="enquete_id" name="enquete_id" class="form-control" required>
                                <option value="">Sélectionner</option>
                                @foreach($enquetes ?? [] as $enquete)
                                    <option value="{{ $enquete->id }}" {{ $echange->enquete_id == $enquete->id ? 'selected' : '' }}>{{ $enquete->titre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="participant_id">Participant</label>
                            <select id="participant_id" name="participant_id" class="form-control" required>
                                <option value="">Sélectionner</option>
                                @foreach($participants ?? [] as $p)
                                    <option value="{{ $p->id }}" {{ $echange->participant_id == $p->id ? 'selected' : '' }}>{{ $p->nom }} {{ $p->prenom }}</option>
                                @endforeach
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary btn-block">Mettre à jour</button>
                        <a href="{{ route('superadmin.echange.index') }}" class="btn btn-secondary btn-block">Annuler</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection