@extends('superadmin.templateSA')
@section('content')
<div class="edit-formation">
    <h2>Modifier une formation</h2>
    <form action="{{ route('superadmin.formation.update', $formation->id) }}" method="POST"
        onsubmit="return confirm('Êtes-vous sûr de vouloir enregistrer les modifications ?');">
        @csrf
        @method('PUT')
        <div class="form-group">
            <label for="libelle">Libellé de la formation</label>
            <input type="text" class="form-control" id="libelle" name="libelle" value="{{ $formation->libelle }}" placeholder="Entrez le libellé de la formation" required>
<<<<<<< HEAD
            <label for="etablissement">Etablissement effectuant la formation</label>
            <select class="form-control" id="etablissement" name="etablissement[]" multiple>
                @foreach($etablissements as $etablissement)
                    <option value="{{ $etablissement->id }}" {{ $formation->etablissement->contains($etablissement->id) ? 'selected' : '' }}>
                        {{ $etablissement->nom }}
                @endforeach
            </select>
=======
>>>>>>> origin/features/view/formation
        </div>
        <button type="submit" class="btn btn-primary">Modifier</button>
    </form>
    <button class="btn btn-secondary mt-3" onclick="window.history.back()">Retour</button>
</div>
@endsection