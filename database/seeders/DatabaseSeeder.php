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
        User::firstOrCreate(
            ['email' => 'admin@dronek.net'],
            [
                'name'     => 'Administrateur DRONEK',
                'password' => Hash::make('Dronek@2024'),
            ]
        );
    }
}
