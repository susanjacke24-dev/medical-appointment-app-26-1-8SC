<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
         User::factory()->create([
            'name' => 'Test User',
            'email' => 'susanjacke.24@gmail.com',
            'password' => bcrypt('12345678'),
            'id_number' => '123456789',
            'phone' => '9999999999',
            'address' => 'Test Address',
        ])->assignRole('Administrador');
    }
}


