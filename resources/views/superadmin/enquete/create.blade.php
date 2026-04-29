@extends('template')
@section('content')

<h3>Ajout d'une enquête</h3>
<div class="form-enquete">
    <form method="POST" action="{{ route('superadmin.enquete.store') }}">
        @if ($errors->any())
            <div class="alert alert-danger mb-3">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        @csrf
        @method('POST')

        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre"
                       placeholder="Satisfaction-1">
            </div>

            <div class="col-12 col-md-6">
                <label for="public_cible" class="form-label">Cible de l'enquête</label>
                <select class="form-control" id="public_cible" name="public_cible">
                    <option value="1">Salarié</option>
                    <option value="2">Ancien tuteur/professeur</option>
                    <option value="3">Ancien apprenti</option>
                </select>
            </div>

            {{-- Dates sur la même ligne --}}
            <div class="col-12 col-md-6">
                <label for="date_debut" class="form-label">Date de début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut">
            </div>

            <div class="col-12 col-md-6">
                <label for="date_fin" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin">
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description"
                          rows="3"
                          placeholder="Cette enquête a pour vocation d'obtenir un retour sur la formation"></textarea>
            </div>

        </div>


        <div class="mt-4">
            <button type="submit" class="btn btn-success" id="Btn_modif">
                Ajouter cette enquête
            </button>
        </div>

    </form>
</div>

<style>
    .form-enquete {
        margin: 5vh;
    }
</style>
@endsection