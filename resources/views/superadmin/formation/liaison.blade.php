@extends('superadmin.templateSA')
@section('content')
<div class="table-liaison">
    <h2>Liaison</h2>
    <p>Voici la liste des formations effectuer dans les différent établissements.</p>

    <table>
        <thead>
            <tr>
                <th>Formation</th>
                <th>Etablissement</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($formations as $formation)
            <tr>
                <td>{{ $formation->libelle }}</td>
                <td>
                    @foreach($formation->etablissement as $etablissement)
                            {{ $etablissement->nom }} @if(!$loop->last), @endif
                    @endforeach
                </td>
                <td>
                <form action="{{ route('superadmin.formation.detach', [$formation->id, $etablissement->id]) }}" method="POST" style="display: inline-block;"
                    onsubmit="return confirm('Êtes-vous sûr de vouloir détacher cette liaison ?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Detacher</button>
                </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection