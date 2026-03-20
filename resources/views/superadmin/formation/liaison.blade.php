@extends('superadmin.templateSA')
@section('content')
<div class="table-liaison">
    <h2>Liaison</h2>
    <p>Voici la liste des liaison qui on déjà été effectuer</p>

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
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection