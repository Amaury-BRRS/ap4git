@extends('superadmin.templateSA')
@section('content')
<div class="table-formation">
    <h2>Formations</h2>
    <p>Voici les informations des formations enregistrées.</p>
    <table>
        <thead>
            <tr>
                <th>Nom de la formation</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formations as $formation)
            <tr>
                <td>{{ $formation->libelle }}</td>
                <td>
                    <a href="{{ route('superadmin.formation.edit', $formation->id) }}" class="btn btn-primary">Modifier</a>
                    <form action="{{ route('superadmin.formation.destroy', $formation->id) }}" method="POST" style="display: inline-block;"
                        onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cette formation ?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection