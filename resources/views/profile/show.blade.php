@extends('template')

@section('content')
<div class="container-fluid">
    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Mon Profil</h1>
    </div>

    <div class="row">
        <!-- Profil Card -->
        <div class="col-lg-8">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Informations Personnelles</h6>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('profile.update') }}">
                        @csrf
                        @method('patch')

                        <!-- Nom -->
                        <div class="form-group">
                            <label for="nom">Nom</label>
                            <input 
                                type="text" 
                                class="form-control @error('nom') is-invalid @enderror" 
                                id="nom" 
                                name="nom" 
                                value="{{ old('nom', $user->nom) }}"
                                required
                            >
                            @error('nom')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input 
                                type="email" 
                                class="form-control @error('email') is-invalid @enderror" 
                                id="email" 
                                name="email" 
                                value="{{ old('email', $user->email) }}"
                                required
                            >
                            @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Type d'utilisateur -->
                        <div class="form-group">
                            <label for="type_user">Type d'utilisateur</label>
                            <input 
                                type="text" 
                                class="form-control" 
                                id="type_user" 
                                name="type_user" 
                                value="{{ ucfirst($user->type_user) }}"
                                disabled
                            >
                            <small class="form-text text-muted">Non modifiable</small>
                        </div>

                        <!-- Dates -->
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="created_at">Compte créé le</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="created_at" 
                                        value="{{ $user->created_at->format('d/m/Y H:i') }}"
                                        disabled
                                    >
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="updated_at">Dernière modification</label>
                                    <input 
                                        type="text" 
                                        class="form-control" 
                                        id="updated_at" 
                                        value="{{ $user->updated_at->format('d/m/Y H:i') }}"
                                        disabled
                                    >
                                </div>
                            </div>
                        </div>

                        @if (session('status') === 'profile-updated')
                            <div class="alert alert-success alert-dismissible fade show" role="alert">
                                <strong>Succès !</strong> Votre profil a été mis à jour.
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save"></i> Enregistrer les modifications
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <!-- Infos Rapides -->
        <div class="col-lg-4">
            <!-- Card - Profile Picture -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Profil</h6>
                </div>
                <div class="card-body text-center">
                    <img class="img-profile rounded-circle mb-3" style="max-width: 150px;" src="{{ asset('sbadmin2/img/undraw_profile.svg') }}">
                    <h5>{{ $user->nom }}</h5>
                    <p class="text-muted mb-0">{{ $user->email }}</p>
                </div>
            </div>

            <!-- Card - Account Status -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Statut du Compte</h6>
                </div>
                <div class="card-body">
                    <div class="mb-3">
                        <strong>Type:</strong>
                        <span class="badge badge-{{ $user->type_user === 'super_administrateur' ? 'danger' : ($user->type_user === 'administrateur' ? 'warning' : 'info') }}">
                            {{ ucfirst($user->type_user) }}
                        </span>
                    </div>
                    <div class="mb-3">
                        <strong>Email vérifié:</strong>
                        @if ($user->email_verified_at)
                            <span class="badge badge-success">Oui - {{ $user->email_verified_at->format('d/m/Y') }}</span>
                        @else
                            <span class="badge badge-warning">Non vérifié</span>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
