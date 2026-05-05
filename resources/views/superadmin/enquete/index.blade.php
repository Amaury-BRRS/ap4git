@extends('template')
@section('content')

<table class="table">
  <thead>
    <tr> 
    <th> Titre </th> 
    <th> Description </th> 
    <th> Cible </th> 
    @if(Auth::user() && Auth::user()->user_type==='super_administrateur')
    <th>Date de début</th>
    <th>Date de fin</th>
    <th>Utilisateur lié</th>
    <th> Modifier </th> 
    <th> Supprimer </th> 
    @endif
    </tr>
  </thead>
  <tbody>
    @forelse ($enquetes as $e)
    <tr class="table-active">
    </tr>
    <tr>
        <td>{{$e->titre}}</td>
        <td>{{$e->description}}</td>
        <td>
            @if($e->public_cible == 1)
                Ancien Professeur
            @elseif($e->public_cible == 2)
                Ancien Tuteur
            @elseif($e->public_cible == 3)
                Ancien Apprenti
            @else
                Non défini
            @endif
        </td>         
       <td>{{ $e->date_debut->format('d/m/Y') }}</td>
       <td>{{ $e->date_fin->format('d/m/Y') }}</td>
       <td>{{$e->user->email ?? 'Non défini'}}</td>

        @if(Auth::user() && Auth::user()->user_type === 'super_administrateur')
        <td>
         <form action="{{route('superadmin.enquete.edit', ['id' => $e->id]) }} " method="GET">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-outline-info" id="Btn_modif"> Modifier </button>
        </form>

        </td>
        <td>
            <form action={{route('superadmin.enquete.delete',['id' => $e->id])}} method="POST">
            @csrf
            @method('DELETE') 
            <button type="submit"  class="btn btn-outline-danger" id="Btn_supp" onclick="return confirm('Voulez-vous supprimer cette enquête ?')">Supprimer </button>
        </form>
        </td>  
        @endif

    </tr>
    <tr>
      @empty
        <tr><td colspan="3">pas de données</td></tr>
    @endforelse
    </tr>

  </tbody>
</table>

@if(Auth::user() && Auth::user()->user_type === 'super_administrateur')
    <a href="{{ route('superadmin.enquete.create') }}" class="btn btn-outline-success" role="button">
    Ajouter une enquête 
</a>
@endif 

@endsection