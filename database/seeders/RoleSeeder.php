<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role; // ← ESTA LÍNEA ES LA CLAVE

class RoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = [
            'Paciente',
            'Doctor',
            'Recepcionista',
            'Administrador',
            'Super administrador',
        ];

        foreach ($roles as $role) {
            Role::create([
                'name' => $role,
                'guard_name' => 'web', // importante
            ]);
        }
    }
}