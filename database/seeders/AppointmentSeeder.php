<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $patient = Patient::first() ?? Patient::create([
            'user_id' => User::factory()->create(['name' => 'Paciente de Prueba'])->id,
        ]);

        $doctor = User::firstWhere('email', 'admin@test.com') ?? User::factory()->create(['name' => 'Dr. House', 'specialty' => 'Diagnóstico']);

        // Cita Completada (para el historial clínico)
        Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'date' => Carbon::yesterday(),
            'start_time' => '10:00:00',
            'end_time' => '10:30:00',
            'reason' => 'Chequeo rutinario anterior',
            'status' => 2, // Atendida
            'diagnosis' => 'Paciente con buena salud general, leve fatiga.',
            'treatment' => 'Reposo y vitaminas.',
            'notes' => 'Cita de prueba completada.',
            'medicines' => [
                ['name' => 'Vitamina C', 'dosage' => '1g', 'frequency' => 'Cada 24 horas']
            ]
        ]);

        // Cita Pendiente (para hoy)
        Appointment::create([
            'patient_id' => $patient->id,
            'doctor_id' => $doctor->id,
            'date' => Carbon::today(),
            'start_time' => '09:00:00',
            'end_time' => '09:15:00',
            'reason' => 'Consulta de seguimiento hoy',
            'status' => 1, // Pendiente
        ]);
    }
}
