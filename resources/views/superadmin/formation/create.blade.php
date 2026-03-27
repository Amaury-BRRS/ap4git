@extends('superadmin.templateSA')
@section('content')
<div class="create-formation">
    <h2>Créer une formation</h2>
    <form action="{{ route('superadmin.formation.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="libelle">Libellé de la formation</label>
            <input type="text" class="form-control" id="libelle" name="libelle" placeholder="Entrez le libellé de la formation" required>
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
    <button class="btn btn-secondary mt-3" onclick="window.history.back()">Retour</button>
</div>
@endsection