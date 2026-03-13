@extends('superadmin.templateSA')
@section('content')
<div class="etablissement">
<h2>Etablissement</h2>
<p>Voici les informations des établissement enregistrés.</p>
</div>
<table class="table-etablissement">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Adresse</th>
            <th>Ville</th>
            <th>Code Postal</th>
            <th>Email</th>
            <th>Numéro de téléphone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($etablissements as $etablissement)
        <tr>
            <td>{{ $etablissement->nom }}</td>
            <td>{{ $etablissement->adresse }}</td>
            <td>{{ $etablissement->ville }}</td>
            <td>{{ $etablissement->code_postal }}</td>
            <td>{{ $etablissement->email }}</td>
            <td>{{ $etablissement->telephone }}</td>
            <td>
                <a href="{{ route('superadmin.etablissement.edit', $etablissement->id) }}" class="btn btn-primary">Modifier</a>
                <form action="{{ route('superadmin.etablissement.destroy', $etablissement->id) }}" method="POST" style="display: inline-block;"
                    onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet établissement ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Supprimer</button>
                </form>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection