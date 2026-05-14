<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $specialties = [
            'Pediatría', 
            'Cardiología', 
            'Ginecología', 
            'Dermatología', 
            'Oftalmología', 
            'Neurología', 
            'Psiquiatría', 
            'Traumatología', 
            'Oncología', 
            'Urología'
        ];

        foreach ($specialties as $specialty) {
            $user = User::create([
                'name' => 'Dr. ' . fake()->name(),
                'email' => Str::lower(Str::random(10)) . '@medical.com',
                'password' => Hash::make('password'),
                'id_number' => fake()->unique()->numerify('########'),
                'phone' => fake()->phoneNumber(),
                'address' => fake()->address(),
                'specialty' => $specialty,
                'email_verified_at' => now(),
            ]);

            // Asignamos el rol de Doctor usando Spatie
            $user->assignRole('Doctor');
        }
    }
}
