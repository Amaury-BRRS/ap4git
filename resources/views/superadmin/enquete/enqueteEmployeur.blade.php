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

            <div class="col-12">
                <h3>Enquête de satisfaction — Employeurs</h3>
            </div>

            <div class="col-12">
                <label for="titre" class="form-label">Titre de l'enquête</label>
                <input type="text" class="form-control" id="titre" name="titre"
                       placeholder="Satisfaction-Employeur-X"
                       value="{{ old('titre') }}">
            </div>

            <div class="col-12 col-md-6">
                <label for="date_debut" class="form-label">Date de début</label>
                <input type="date" class="form-control" id="date_debut" name="date_debut"
                       value="{{ old('date_debut') }}">
            </div>

            <div class="col-12 col-md-6">
                <label for="date_fin" class="form-label">Date de fin</label>
                <input type="date" class="form-control" id="date_fin" name="date_fin"
                       value="{{ old('date_fin') }}">
            </div>

            <div class="col-12">
                <label for="description" class="form-label">Description</label>
                <textarea class="form-control" id="description" name="description" rows="3"
                          placeholder="Cette enquête a pour vocation d'obtenir un retour sur la formation">{{ old('description') }}</textarea>
            </div>

        </div>

        <hr class="my-4">

        {{-- ─── Q1 – Établissement ────────────────────────────────────────────── --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">
                1. Au sein de quel établissement était inscrit l'apprenti que vous avez accueilli cette année ?
            </label>
            <div class="row g-2">
                @php
                    $etablissements = [
                        'bernard_cordier_besancon'          => 'Bernard Cordier – Besançon',
                        'jeanne_arc_champagnole'             => "Jeanne d'Arc – Champagnole",
                        'jeanne_arc_pontarlier'              => "Jeanne d'Arc – Pontarlier",
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
                        'ne_sait_pas'                        => 'Ne sait pas',
                    ];
                @endphp

                @foreach ($etablissements as $value => $label)
                    <div class="col-12 col-md-6">
                        <div class="form-check">
                            <input class="form-check-input etab-radio"
                                   type="radio"
                                   id="etablissement_{{ $value }}"
                                   name="etablissement"
                                   value="{{ $value }}"
                                   data-target="formations_{{ $value }}"
                                   {{ old('etablissement') === $value ? 'checked' : '' }}>
                            <label class="form-check-label" for="etablissement_{{ $value }}">
                                {{ $label }}
                            </label>
                        </div>
                    </div>
                @endforeach
            </div>
            @error('etablissement')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- ─── Q2 – Formation (conditionnelle selon l'établissement) ────────── --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">
                2. Quelle formation suivait votre apprenti au sein de l'UFA ?
            </label>

            <div id="formations-wrapper" class="border rounded p-3 bg-light">
                <p class="text-muted fst-italic small mb-2" id="formations-placeholder">
                    ← Veuillez d'abord sélectionner un établissement (question 1).
                </p>

                @php
                    $formationsParEtablissement = [
                        'bernard_cordier_besancon' => [
                            'cap_coiffure_bc'      => 'CAP Coiffure',
                            'bac_pro_coiffure_bc'  => 'BAC PRO Coiffure',
                            'bp_coiffure_bc'       => 'BP Coiffure',
                        ],
                        'jeanne_arc_champagnole' => [
                            'bac_pro_agora_jac'   => 'BAC PRO AGORA',
                            'bac_pro_ma_jac'      => 'BAC PRO MA',
                            'bac_pro_mcv_a_jac'   => 'BAC PRO MCV A',
                            'bac_pro_mcv_b_jac'   => 'BAC PRO MCV B',
                            'bts_ndrc_jac'        => 'BTS NDRC',
                        ],
                        'jeanne_arc_pontarlier' => [
                            'bac_pro_mcv_jap'     => 'BAC PRO MCV',
                            'btsa_tc_alim_jap'    => 'BTSA TC Alimentation – Boisson',
                            'btsa_tc_biens_jap'   => 'BTSA TC Biens – Services',
                            'btsa_tc_vins_jap'    => 'BTSA TC Vins – Bières – Spiritueux',
                        ],
                        'pasteur_mont_roland_dole' => [
                            'bachelor_crh_pmd'    => 'BACHELOR CRH',
                            'bachelor_rdc_pmd'    => 'BACHELOR RDC',
                            'bts_cg_pmd'          => 'BTS CG',
                            'bts_ci_pmd'          => 'BTS CI',
                            'bts_gpme_pmd'        => 'BTS GPME',
                            'bts_mco_pmd'         => 'BTS MCO',
                            'bts_ndrc_pmd'        => 'BTS NDRC',
                            'bts_pi_pmd'          => 'BTS PI',
                            'bts_sio_pmd'         => 'BTS SIO',
                            'dcg_pmd'             => 'DCG',
                            'lid_pmd'             => 'LID',
                        ],
                        'notre_dame_anges_belfort' => [
                            'bts_gpme_nda'        => 'BTS GPME',
                            'bts_mco_nda'         => 'BTS MCO',
                            'bts_ndrc_nda'        => 'BTS NDRC',
                            'bts_sam_nda'         => 'BTS SAM',
                        ],
                        'notre_dame_compassion_villersexel' => [
                            'cap_aepe_ndcv'       => 'CAP AEPE',
                            'cap_ecp_ndcv'        => 'CAP ECP',
                            'cap_epc_ndcv'        => 'CAP EPC',
                        ],
                        'saint_pierre_fourier_gray' => [
                            'bac_pro_ma_spfg'     => 'BAC PRO MA',
                            'bac_pro_mcv_a_spfg'  => 'BAC PRO MCV A',
                            'bts_mco_spfg'        => 'BTS MCO',
                            'cap_epc_spfg'        => 'CAP EPC',
                            'cs_vca_spfg'         => 'CS VCA',
                        ],
                        'saint_benigne_pontarlier' => [
                            'cs_cyber_sbp'        => 'CS CYBERSECURITE',
                            'cs_prpe_sbp'         => 'CS PRPE',
                        ],
                        'notre_dame_saint_jean_besancon' => [
                            'bachelor_cgm_ndsjb'  => 'BACHELOR CGM',
                            'bts_banque_ndsjb'    => 'BTS BANQUE',
                            'bts_cg_ndsjb'        => 'BTS CG',
                            'bts_cjn_ndsjb'       => 'BTS CJN',
                            'bts_gpme_ndsjb'      => 'BTS GPME',
                            'bts_mco_ndsjb'       => 'BTS MCO',
                            'dcg_ndsjb'           => 'DCG',
                            'lpmmo_ndsjb'         => 'LPMMO',
                            'mastere_mdo_ndsjb'   => 'MASTERE EUROPÉEN MDO',
                        ],
                        'saint_joseph_belfort' => [
                            'bac_pro_agora_sjb'   => 'BAC PRO AGORA',
                            'bac_pro_ma_sjb'      => 'BAC PRO MA',
                            'bac_pro_mcv_a_sjb'   => 'BAC PRO MCV A',
                            'cs_vendeur_sjb'      => 'CS VENDEUR',
                        ],
                        'saint_joseph_saint_paul_besancon' => [
                            'bac_pro_ciel_sjsp'   => 'BAC PRO CIEL',
                            'bac_pro_melec_sjsp'  => 'BAC PRO MELEC',
                            'bac_pro_tma_sjsp'    => 'BAC PRO TMA',
                            'bma_ebeniste_sjsp'   => 'BMA EBENISTE',
                            'bts_cpi_sjsp'        => 'BTS CPI',
                            'bts_era_sjsp'        => 'BTS ERA',
                            'bts_mec_sjsp'        => 'BTS MEC',
                            'cap_ebeniste_sjsp'   => 'CAP EBENISTE',
                            'cap_elec_sjsp'       => 'CAP ELECTRICIEN',
                            'cap_menu_fab_sjsp'   => 'CAP MENUISIER FABRICANT',
                            'licence_pro_ct_sjsp' => 'LICENCE PRO CT',
                        ],
                        'sainte_anne_saint_joseph_belfort' => [
                            'bac_pro_agora_sasj'  => 'BAC PRO AGORA',
                            'bac_pro_assp_sasj'   => 'BAC PRO ASSP',
                            'bac_pro_ma_sasj'     => 'BAC PRO MA',
                            'bac_pro_mcv_b_sasj'  => 'BAC PRO MCV B',
                        ],
                        'sainte_famille_besancon' => [
                            'bac_pro_aepa_sfb'    => 'BAC PRO AEPA',
                            'bac_pro_agora_sfb'   => 'BAC PRO AGORA',
                            'bac_pro_assp_sfb'    => 'BAC PRO ASSP',
                            'bac_pro_mcv_a_sfb'   => 'BAC PRO MCV A',
                            'bts_tourisme_sfb'    => 'BTS TOURISME',
                        ],
                        'sainte_marie_lons_le_saunier' => [
                            'bac_pro_ciel_smls'   => 'BAC PRO CIEL',
                            'bac_pro_mfer_smls'   => 'BAC PRO MFER',
                            'bachelor_cda_smls'   => 'BACHELOR CDA',
                            'bts_ciel_smls'       => 'BTS CIEL',
                        ],
                    ];
                @endphp

                @foreach ($formationsParEtablissement as $etabKey => $formations)
                    <div class="formation-group row g-2"
                         id="formations_{{ $etabKey }}"
                         style="display:none;">
                        @foreach ($formations as $value => $label)
                            <div class="col-12 col-md-6">
                                <div class="form-check">
                                    <input class="form-check-input"
                                           type="radio"
                                           id="formation_{{ $value }}"
                                           name="formation"
                                           value="{{ $value }}"
                                           {{ old('formation') === $value ? 'checked' : '' }}>
                                    <label class="form-check-label" for="formation_{{ $value }}">
                                        {{ $label }}
                                    </label>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @endforeach
            </div>

            @error('formation')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- ─── Q3 – Grille d'évaluation ──────────────────────────────────────── --}}
        <div class="mb-4">
            <label class="form-label fw-semibold">
                3. Merci de renseigner votre avis sur la formation à l'aide de la grille suivante :
            </label>

            @php
                $criteres = [
                    'accueil_suivi'         => "Accueil et suivi de l'apprenti par l'UFA",
                    'qualite_formation'     => 'Qualité de la formation dispensée',
                    'adequation_poste'      => 'Adéquation de la formation avec le poste occupé',
                    'competences_acquises'  => "Compétences acquises par l'apprenti",
                    'communication_ufa'     => "Communication avec l'UFA",
                    'disponibilite_equipes' => 'Disponibilité des équipes pédagogiques',
                    'livret_apprentissage'  => "Utilisation du livret d'apprentissage",
                    'preparation_examen'    => "Préparation à l'examen",
                ];
                $niveaux_eval = [
                    'tres_satisfait' => 'Très satisfait',
                    'satisfait'      => 'Satisfait',
                    'peu_satisfait'  => 'Peu satisfait',
                    'insatisfait'    => 'Insatisfait',
                    'sans_avis'      => 'Sans avis',
                ];
            @endphp

            <div class="table-responsive">
                <table class="table table-bordered table-sm align-middle text-center">
                    <thead class="table-dark">
                        <tr>
                            <th class="text-start">Critère</th>
                            @foreach ($niveaux_eval as $nVal => $nLbl)
                                <th>{{ $nLbl }}</th>
                            @endforeach
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($criteres as $cVal => $cLbl)
                            <tr>
                                <td class="text-start fw-semibold">{{ $cLbl }}</td>
                                @foreach ($niveaux_eval as $nVal => $nLbl)
                                    <td>
                                        <input class="form-check-input"
                                               type="radio"
                                               name="evaluation[{{ $cVal }}]"
                                               value="{{ $nVal }}"
                                               {{ old("evaluation.$cVal") === $nVal ? 'checked' : '' }}>
                                    </td>
                                @endforeach
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        {{-- ─── Q4 – Note sur 10 ──────────────────────────────────────────────── --}}
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
            @error('note_satisfaction')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- ─── Q5 – Commentaires et suggestions ─────────────────────────────── --}}
        <div class="mb-4">
            <label for="commentaires" class="form-label fw-semibold">
                5. N'hésitez pas à nous laisser ci-dessous des commentaires et à nous faire part de vos suggestions d'amélioration.
            </label>
            <textarea class="form-control" id="commentaires" name="commentaires"
                      rows="4"
                      placeholder="Vos commentaires et suggestions…">{{ old('commentaires') }}</textarea>
        </div>

        {{-- ─── Q6 – Autres besoins en emploi ────────────────────────────────── --}}
        <div class="mb-4">
            <label for="besoins_emploi" class="form-label fw-semibold">
                6. Avez-vous d'autres besoins en emploi qui pourraient être couverts par le recrutement d'apprentis ?
            </label>
            <textarea class="form-control" id="besoins_emploi" name="besoins_emploi"
                      rows="3"
                      placeholder="Décrivez vos besoins…">{{ old('besoins_emploi') }}</textarea>
        </div>

        {{-- ─── Q7 – Nom de l'entreprise ──────────────────────────────────────── --}}
        <div class="mb-4">
            <label for="nom_entreprise" class="form-label fw-semibold">
                7. Nom de votre entreprise
            </label>
            <input type="text" class="form-control" id="nom_entreprise" name="nom_entreprise"
                   placeholder="Ex : SARL Dupont & Associés"
                   value="{{ old('nom_entreprise') }}">
            @error('nom_entreprise')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- ─── Q8 – Poste occupé ──────────────────────────────────────────────── --}}
        <div class="mb-4">
            <label for="poste_occupe" class="form-label fw-semibold">
                8. Poste occupé
            </label>
            <input type="text" class="form-control" id="poste_occupe" name="poste_occupe"
                   placeholder="Ex : Responsable RH, Gérant…"
                   value="{{ old('poste_occupe') }}">
            @error('poste_occupe')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- ─── Q9 – NOM Prénom ────────────────────────────────────────────────── --}}
        <div class="mb-4">
            <label for="nom_prenom" class="form-label fw-semibold">
                9. NOM Prénom
            </label>
            <input type="text" class="form-control" id="nom_prenom" name="nom_prenom"
                   placeholder="DUPONT Jean"
                   value="{{ old('nom_prenom') }}">
            @error('nom_prenom')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- ─── Q10 – Adresse e-mail ───────────────────────────────────────────── --}}
        <div class="mb-4">
            <label for="email" class="form-label fw-semibold">
                10. Adresse e-mail
            </label>
            <input type="email" class="form-control" id="email" name="email"
                   placeholder="jean.dupont@exemple.fr"
                   value="{{ old('email') }}">
            @error('email')
                <div class="text-danger small mt-1">{{ $message }}</div>
            @enderror
        </div>

        {{-- ─── Bouton de soumission ───────────────────────────────────────────── --}}
        <div class="mt-4">
            <button type="submit" class="btn btn-success" id="Btn_modif">
                Envoyer l'enquête
            </button>
        </div>

    </form>
</div>

<style>
    .form-enquete {
        margin: 5vh;
    }
</style>

<script>
document.addEventListener('DOMContentLoaded', function () {
    const radios      = document.querySelectorAll('.etab-radio');
    const placeholder = document.getElementById('formations-placeholder');
    const allGroups   = document.querySelectorAll('.formation-group');

    function showFormations(targetId) {
        // Cache tous les groupes et réinitialise leurs radios
        allGroups.forEach(function (g) {
            g.style.display = 'none';
            g.querySelectorAll('input[type="radio"]').forEach(function (r) {
                r.checked = false;
            });
        });

        // Affiche le bon groupe (sauf "Ne sait pas" qui n'a pas de formations)
        if (targetId && targetId !== 'formations_ne_sait_pas') {
            var target = document.getElementById(targetId);
            if (target) {
                target.style.display = 'flex';
                placeholder.style.display = 'none';
                return;
            }
        }
        placeholder.style.display = '';
    }

    // Initialisation (restauration après erreur de validation via old())
    radios.forEach(function (radio) {
        if (radio.checked) {
            showFormations(radio.dataset.target);
        }
    });

    // Écoute les changements
    radios.forEach(function (radio) {
        radio.addEventListener('change', function () {
            showFormations(this.dataset.target);
        });
    });
});
</script>