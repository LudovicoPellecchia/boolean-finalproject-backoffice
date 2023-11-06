<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        // Disabilita temporaneamente i vincoli di chiave esterna
        DB::statement('SET FOREIGN_KEY_CHECKS=0');

        // Esegui la query per eliminare i dati
        DB::table('specialization_user')->truncate();

        // Riabilita i vincoli di chiave esterna
        DB::statement('SET FOREIGN_KEY_CHECKS=1');

        $specializationsUsers = [
            [
                'user_id' => 1,
                'specialization_id' => 1, // ID della specializzazione
            ],
            [
                'user_id' => 1,
                'specialization_id' => 4, // ID della specializzazione
            ],
            [
                'user_id' => 1,
                'specialization_id' => 3, // ID della specializzazione
            ],
            [
                'user_id' => 2,
                'specialization_id' => 2,
            ],
            [
                'user_id' => 3,
                'specialization_id' => 7, // ID della specializzazione
            ],
            [
                'user_id' => 3,
                'specialization_id' => 3, // ID della specializzazione
            ],
            [
                'user_id' => 3,
                'specialization_id' => 2, // ID della specializzazione
            ],
            [
                'user_id' => 3,
                'specialization_id' => 6, // ID della specializzazione
            ],
            [
                'user_id' => 4,
                'specialization_id' => 9,
            ],
            [
                'user_id' => 5,
                'specialization_id' => 1, // ID della specializzazione
            ],
            [
                'user_id' => 5,
                'specialization_id' => 8, // ID della specializzazione
            ],
        ];

        // Inserisci i dati nella tabella ponte specialization_user
        DB::table('specialization_user')->insert($specializationsUsers);
    }
}
