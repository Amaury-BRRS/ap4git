@extends('superadmin.templateSA')
@section('content')
<div class="superadmin" style="text-align: center; margin-top: 50px;">
    <h2>Bienvenue sur votre espace Super Administrateur</h2>
    <p>Vous pouvez gérer les établissements et les formations depuis cet espace.</p>
</div>
<div class="superadmin-actions" style="display: flex; justify-content: center; gap: 20px; margin-top: 30px;">
    <a href="{{ route('superadmin.etablissement.index') }}" class="btn btn-primary">Voir les établissements</a>
    <a href="#" class="btn btn-secondary">Voir les formations</a>
</div>
@endsection