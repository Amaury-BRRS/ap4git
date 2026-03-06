<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Etablissement;
use App\Models\Formation;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(3)->create();
        Etablissement::factory(3)->create();
        Formation::factory(3)->create();
    }
}
