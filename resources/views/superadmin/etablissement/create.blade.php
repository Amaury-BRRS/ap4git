@extends('superadmin.templateSA')
@section('content')
<div class="create-etablissement">
    <h2>Créer un établissement</h2>
    <form action="{{ route('superadmin.etablissement.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nom">Nom de l'établissement</label>
            <input type="text" class="form-control" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" class="form-control" id="adresse" name="adresse" required>
        </div>
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" class="form-control" id="ville" name="ville" required>
        </div>
        <div class="form-group">
            <label for="code_postal">Code Postal</label>
            <input type="text" class="form-control" id="code_postal" name="code_postal" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="telephone">Numéro de téléphone</label>
            <input type="text" class="form-control" id="telephone" name="telephone" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
    <button class="btn btn-secondary mt-3" onclick="window.history.back()">Retour</button>
</div>
@endsection