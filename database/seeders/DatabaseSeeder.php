<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Compte administrateur par défaut
        User::updateOrCreate(
            ['email' => 'boncaisse@dronek.net'],
            [
                'name'     => 'Administrateur DRONEK',
                'password' => Hash::make('BonCaisseDronek@2026'),
            ]
        );
    }
}
