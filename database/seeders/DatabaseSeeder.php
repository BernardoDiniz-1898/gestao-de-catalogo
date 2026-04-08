<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Criando o primeiro administrador
        User::factory()->create([
            'name' => 'Admin Sistema',
            'email' => 'admin@email.com',
            'password' => Hash::make('senha123'),  // Define uma senha fixa
        ]);

        // Criando o segundo administrador
        User::factory()->create([
            'name' => 'Bernardo Admin',
            'email' => 'bernardo@email.com',
            'password' => Hash::make('senha456'),
        ]);

        // Opcional: Criar mais 10 usuários aleatórios
        // User::factory(10)->create();
    }
}
