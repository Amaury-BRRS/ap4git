<p> liste des enquetes</p>

{{-- 
@if(Auth::user())
<a href="{{ route('entreprise.create') }}" class="btn btn-outline-success" role="button">
    Ajouter une entreprise
</a>
@endif --}}

<table class="table">
  <thead>
    <tr> 
    <th> Titre </th> 
    <th> Description </th> 
    <th> cible </th> 
    @if(Auth::user())
    <th>Date de début</th>
    <th>Date de fin</th>
    <th>Statut</th>
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
        <td>{{$e->public_cible}}</td>
        <td>{{$e->date_debut}}</td>
        <td>{{$e->date_fin}}</td>
        {{-- <td>{{$e->user->id ?? 'Non défini'}}</td> --}}

        @if(Auth::user())
        <td>
         <form action={{route('superadmin.enquete.edit',['id' => $e->id ])}} method="GET">
            @csrf
            @method('PUT')
            <button type="submit" class="btn btn-outline-info" id="Btn_modif"> Modifier </button>
        </form>
        </td>
        <td>
            <form action={{route('superadmin.enquete.delete',['id' => $e->id])}} method="POST">
            @csrf
            @method('DELETE') 
            <button type="submit"  class="btn btn-outline-danger" id="Btn_supp" onclick="return confirmation(this)">Supprimer </button>
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


@section('script')
<script language="javascript">

   function confirmation(button){
    if( button.style.backgroundColor == "white"){
        return true
    }
    else{
        button.style.backgroundColor = "white";
        button.style.color="red"; 
    button.innerText= " confirmer";
     return false;
    } 
}    
</script>
@stop