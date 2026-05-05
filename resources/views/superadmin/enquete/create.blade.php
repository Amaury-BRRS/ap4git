@extends('template')
@section('content')

<div class="col-12 col-md-6 mb-4">
    <label for="public_cible" class="form-label">Cible de l'enquête</label>
    <select class="form-control" id="public_cible" name="public_cible">
        <option selected>— Sélectionner le type d'enquête —</option>
        <option value="1">Employeur</option>
        <option value="2">Ancien formateur</option>
        <option value="3">Ancien apprenti</option>
    </select>
</div>

<div id="form-employeur" style="display:none;">
    @include('superadmin.enquete.enqueteEmployeur')
</div>

<div id="form-formateur" style="display:none;">
    @include('superadmin.enquete.enqueteFormateur')
</div>

<div id="form-apprenti" style="display:none;">
    @include('superadmin.enquete.enqueteApprenti')
</div>

<script>
    const select = document.getElementById('public_cible');
    const forms = {
        1: document.getElementById('form-employeur'),
        2: document.getElementById('form-formateur'),
        3: document.getElementById('form-apprenti'),
    };

    select.addEventListener('change', function () {
        // Cache tous les formulaires
        Object.values(forms).forEach(f => f.style.display = 'none');

        // Affiche uniquement si une vraie option est choisie
        if (this.value !== '0' && forms[this.value]) {
            forms[this.value].style.display = 'block';
        }
    });
</script>

@endsection