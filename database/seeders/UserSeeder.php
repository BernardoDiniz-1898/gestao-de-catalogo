<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Administrador
        User::updateOrCreate(
            ['email' => 'admin'],  // Busca por este "email" (login)
            [
                'name' => 'Administrador',
                'password' => Hash::make('123'),
            ]
        );

        // Professor
        User::updateOrCreate(
            ['email' => 'prof'],
            [
                'name' => 'Professor',
                'password' => Hash::make('qwer'),
            ]
        );
    }
}
