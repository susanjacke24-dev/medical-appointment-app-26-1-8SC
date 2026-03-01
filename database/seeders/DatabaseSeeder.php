<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    public function run(): void
    {
        // Crear roles
        $this->call(RoleSeeder::class);

        // Crear usuario
        $user = User::factory()->create([
            'name' => 'Test User',
            'email' => 'susanjacke.24@gmail.com',
            'password' => bcrypt('12345678'),
        ]);

        // Asignar rol al usuario
        $user->assignRole('Super administrador');
    }
}