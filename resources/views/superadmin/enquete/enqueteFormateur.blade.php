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

        {{-- ─── Métadonnées de l'enquête ─────────────────────────────────────── --}}
        <div class="row g-3">

            <div class="col-12 col-md-6">
                <label for="titre" class="form-label">Titre</label>
                <input type="text" class="form-control" id="titre" name="titre"
                       placeholder="Satisfaction-Formateurs-1">
            </div>

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

        <hr class="my-4">

        {{-- ─── Questions de l'enquête ────────────────────────────────────────── --}}

        {{-- Q1 – Établissement(s) --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">
                1. Au sein de quel(s) établissement(s) avez-vous exercé au cours de l'année passée ?
                <span class="text-muted fw-normal">(Choix multiple)</span>
            </label>
            <div class="row g-2">
                @php
                    $etablissements = [
                        'bernard_cordier_besancon'          => 'Bernard Cordier – Besançon',
                        'jeanne_arc_champagnole'             => 'Jeanne d\'Arc – Champagnole',
                        'jeanne_arc_pontarlier'              => 'Jeanne d\'Arc – Pontarlier',
                        'pasteur_mont_roland_dole'           => 'Pasteur Mont Roland – Dole',
                        'notre_dame_anges_belfort'           => 'Notre Dame des Anges – Belfort',
                        'notre_dame_compassion_villersexel'  => 'Notre Dame de la Compassion – Villersexel',
                        'saint_pierre_fourier_gray'          => 'Saint Pierre Fourier – Gray',
                        'saint_benigne_pontarlier'           => 'Saint Bénigne – Pontarlier',
                        'notre_dame_saint_jean_besancon'     => 'Notre Dame Saint Jean – Besançon',
                        'saint_joseph_belfort'               => 'Saint Joseph – Belfort',
                        'saint_joseph_saint_paul_besancon'   => 'Saint Joseph - Saint Paul – Besançon',
                        'sainte_anne_saint_joseph_belfort'   => 'Sainte Anne - Saint Joseph – Belfort',
                        'sainte_famille_besancon'            => 'Sainte Famille – Besançon',
                        'sainte_marie_lons_le_saunier'       => 'Sainte Marie – Lons-le-Saunier',
                    ];
                @endphp

                @foreach ($etablissements as $value => $label)
                    <div class="col-12 col-md-6">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                   id="etablissement_{{ $value }}"
                                   name="etablissements[]"
                                   value="{{ $value }}"
                                   {{ in_array($value, old('etablissements', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="etablissement_{{ $value }}">
                                {{ $label }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Q2 – Niveau(x) de formation --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">
                2. À quel(s) niveau(x) de formation avez-vous enseigné durant l'année passée ?
                <span class="text-muted fw-normal">(Choix multiple)</span>
            </label>
            <div class="row g-2">
                @php
                    $niveaux = [
                        'bac_pro'               => 'BAC PRO',
                        'bp'                    => 'BP',
                        'bts_btsa'              => 'BTS – BTSA',
                        'cap'                   => 'CAP',
                        'certificat_specialisation' => 'Certificat de Spécialisation',
                        'licence_bachelor'      => 'Licence – Bachelor',
                        'mastere'               => 'Mastère',
                    ];
                @endphp

                @foreach ($niveaux as $value => $label)
                    <div class="col-12 col-md-4">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox"
                                   id="niveau_{{ $value }}"
                                   name="niveaux[]"
                                   value="{{ $value }}"
                                   {{ in_array($value, old('niveaux', [])) ? 'checked' : '' }}>
                            <label class="form-check-label" for="niveau_{{ $value }}">
                                {{ $label }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>

        {{-- Q3 – Niveau de satisfaction (énoncé incomplet dans le document source) --}}
        {{-- TODO : compléter les modalités de réponse de cette question --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">
                3. Quel est votre niveau de satisfaction en tant que formateur au sein de votre établissement ?
            </label>
            <p class="text-muted fst-italic small">
                ⚠️ Les modalités de réponse de cette question n'ont pas été fournies — à compléter.
            </p>
            {{-- Exemple : remplacer par des radio buttons, une liste déroulante, etc. --}}
            <textarea class="form-control" name="satisfaction_etablissement"
                      rows="2"
                      placeholder="Votre réponse…">{{ old('satisfaction_etablissement') }}</textarea>
        </div>

        {{-- Q4 – Note sur 10 --}}
        <div class="mb-4">
            <label for="note_satisfaction" class="form-label fw-semibold">
                4. Sur 10, quel est votre degré de satisfaction ?
                <span class="text-muted fw-normal">(1 = note la plus basse, 10 = note la plus élevée)</span>
            </label>
            <select class="form-control" id="note_satisfaction" name="note_satisfaction">
                <option value="" disabled {{ old('note_satisfaction') === null ? 'selected' : '' }}>
                    -- Choisissez une note --
                </option>
                @for ($i = 1; $i <= 10; $i++)
                    <option value="{{ $i }}" {{ old('note_satisfaction') == $i ? 'selected' : '' }}>
                        {{ $i }}
                    </option>
                @endfor
            </select>
        </div>

        {{-- Q5 – Commentaires et suggestions --}}
        <div class="mb-4">
            <label for="commentaires" class="form-label fw-semibold">
                5. N'hésitez pas à nous laisser vos commentaires ainsi qu'à nous faire part de vos suggestions d'amélioration.
            </label>
            <textarea class="form-control" id="commentaires" name="commentaires"
                      rows="4"
                      placeholder="Vos commentaires…">{{ old('commentaires') }}</textarea>
        </div>

        {{-- Q6 – Ressentez-vous le besoin (énoncé incomplet dans le document source) --}}
        {{-- TODO : compléter les modalités de réponse de cette question --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">
                6. Ressentez-vous le besoin :
            </label>
            <p class="text-muted fst-italic small">
                ⚠️ Les modalités de réponse de cette question n'ont pas été fournies — à compléter.
            </p>
            {{-- Exemple : remplacer par des checkboxes ou radio buttons --}}
            <textarea class="form-control" name="besoins"
                      rows="2"
                      placeholder="Votre réponse…">{{ old('besoins') }}</textarea>
        </div>

        {{-- Q7 – Difficultés rencontrées --}}
        <div class="mb-4">
            <label for="difficultes" class="form-label fw-semibold">
                7. Si vous rencontrez des difficultés, n'hésitez pas à nous en faire part ici.
            </label>
            <textarea class="form-control" id="difficultes" name="difficultes"
                      rows="3"
                      placeholder="Vos difficultés…">{{ old('difficultes') }}</textarea>
        </div>

        {{-- Q8 – Suggestions apprentissage --}}
        <div class="mb-4">
            <label for="suggestions_apprentissage" class="form-label fw-semibold">
                8. Si vous avez des suggestions concernant l'apprentissage, vous pouvez nous en faire part ici.
            </label>
            <textarea class="form-control" id="suggestions_apprentissage" name="suggestions_apprentissage"
                      rows="3"
                      placeholder="Vos suggestions sur l'apprentissage…">{{ old('suggestions_apprentissage') }}</textarea>
        </div>

        {{-- Q9 – Suggestions formations --}}
        <div class="mb-4">
            <label for="suggestions_formations" class="form-label fw-semibold">
                9. Si vous avez des suggestions concernant les formations que vous jugez pertinentes de suivre, vous pouvez nous en faire part ici.
            </label>
            <textarea class="form-control" id="suggestions_formations" name="suggestions_formations"
                      rows="3"
                      placeholder="Vos suggestions de formations…">{{ old('suggestions_formations') }}</textarea>
        </div>

        {{-- Q10 – Nom Prénom --}}
        <div class="mb-4">
            <label for="nom_prenom" class="form-label fw-semibold">
                10. NOM Prénom
            </label>
            <input type="text" class="form-control" id="nom_prenom" name="nom_prenom"
                   placeholder="DUPONT Jean"
                   value="{{ old('nom_prenom') }}">
        </div>

        {{-- Q11 – Adresse e-mail --}}
        <div class="mb-4">
            <label for="email" class="form-label fw-semibold">
                11. Adresse e-mail
            </label>
            <input type="email" class="form-control" id="email" name="email"
                   placeholder="jean.dupont@exemple.fr"
                   value="{{ old('email') }}">
        </div>

        {{-- Q12 – Matière enseignée --}}
        <div class="mb-4">
            <label for="matiere" class="form-label fw-semibold">
                12. Matière enseignée
            </label>
            <input type="text" class="form-control" id="matiere" name="matiere"
                   placeholder="Ex : Mathématiques, Français…"
                   value="{{ old('matiere') }}">
        </div>

        {{-- ─── Bouton de soumission ──────────────────────────────────────────── --}}
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