{{-- ce fichier est le fichier final, la vue finale, c'est comme la branche main sur git c'est ici que tout se retrouve à la fin --}}
@extends('profile.template')

{{-- récupère le titre depuis le fichier template.blade.php --}}
@push('title')
Page d'accueil
@endpush

{{-- section à modifier pour afficher le contenu principal du site  --}}
@section("content")
<div class="container-fluid">

                    <!-- Page Heading -->
                    <h1 class="h3 mb-4 text-gray-800">Blank Page</h1>

                </div>
@endsection

@push('styles')
@endpush

@push('scripts')
@endpush