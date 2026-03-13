@extends('superadmin.templateSA')
@section('content')
<div class="edit-etablissement">
    <h2>Modifier l'établissement</h2>
    <form action="{{ route('superadmin.etablissement.update', $etablissement->id) }}" method="POST"
        onsubmit="return confirm('Êtes-vous sûr de vouloir enregistrer les modifications ?');">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="nom">Nom</label>
            <input type="text" name="nom" id="nom" class="form-control" value="{{ $etablissement->nom }}" placeholder="Entrez le nom" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse</label>
            <input type="text" name="adresse" id="adresse" class="form-control" value="{{ $etablissement->adresse }}" placeholder="Entrez l'adresse" required>
        </div>
        <div class="form-group">
            <label for="ville">Ville</label>
            <input type="text" name="ville" id="ville" class="form-control" value="{{ $etablissement->ville }}" placeholder="Entrez la ville" required>
        </div>
        <div class="form-group">
            <label for="code_postal">Code Postal</label>
            <input type="text" name="code_postal" id="code_postal" class="form-control" value="{{ $etablissement->code_postal }}" placeholder="Format: 01234" required>
        </div>
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" class="form-control" value="{{ $etablissement->email }}" placeholder="Entrez l'email" required>
        </div>
        <div class="form-group">
            <label for="telephone">Numéro de téléphone</label>
            <input type="text" name="telephone" id="telephone" class="form-control" value="{{ $etablissement->telephone }}" placeholder="Format: 0123456789" required>
        </div>
        <button type="submit" class="btn btn-primary">Enregistrer les modifications</button>
    </form>
</div>
@endsection