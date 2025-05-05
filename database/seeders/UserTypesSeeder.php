<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserTypesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user_types')->insert([
            [
                'name' => 'Patient',
                'slug' => 'patient',
                'description' => 'Utilisateur standard qui cherche des services médicaux',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Médecin',
                'slug' => 'medecin',
                'description' => 'Professionnel de santé',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Pharmacie',
                'slug' => 'pharmacie',
                'description' => 'Établissement pharmaceutique',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Hôpital',
                'slug' => 'hopital',
                'description' => 'Établissement de santé',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'name' => 'Banque de sang',
                'slug' => 'blood-bank',
                'description' => 'Établissement de collecte et stockage de sang',
                'created_at' => now(),
                'updated_at' => now()
            ]
        ]);
    }
}
