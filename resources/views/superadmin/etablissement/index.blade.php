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
        </tr>
        @endforeach
    </tbody>
</table>
@endsection