<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Enquete;
use App\Models\Question;
use App\Models\Choix;
use App\Models\Reponse;
use App\Models\Contrat;
use App\Models\Echange;
use App\Models\Etablissement;
use App\Models\Formation;
use App\Models\Participant;
use App\Models\FormulaireReponse;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
// use App\Models\Etablissement;
// use App\Models\Formation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    // use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        
        // User::factory()->create([
            //     'name' => 'Test User',
            //     'email' => 'test@example.com',
            // ]);
            
            User::factory(3)->create();
            Enquete::factory(10)->create(); 
            Question::factory(10)->create();
            Choix::factory(5)->create();  
            FormulaireReponse::factory(10)->create(); 

            // gère la relation entre deux tables --> ici on est dans une table pivot 
            $etabs = Etablissement::factory(10)->create();
            $formations = Formation::factory(20)->create();

            foreach ($etabs as $etab) {
                $etab->formations()->attach(
                    $formations->random(3)->pluck('id')
                );
            }
            // Formation::factory(10)->create(); 
            // Etablissement::factory(10)->create(); 

            // mm idée mais avec contrat et participant 
            $contrats = Contrat::factory(4)->create(); 
            $participants = Participant::factory(6)->create(); 

            foreach ($contrats as $cont) {
                $cont->participants()->attach(
                    $participants->random(2)->pluck('id')
                );
            }
            // Contrat::factory(5)->create(); 
            // Participant::factory(10)->create(); 


            Echange::factory(5)->create(); 
            Reponse::factory(5)->create(); 
        
        User::factory(3)->create();
        Etablissement::factory(3)->create();
        Formation::factory(3)->create();
    }
}
