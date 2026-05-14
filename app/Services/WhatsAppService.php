<?php

namespace App\Services;

use App\Models\Appointment;
use Illuminate\Support\Facades\Log;

class WhatsAppService
{
    /**
     * Envía un mensaje de WhatsApp utilizando una API externa (Simulado para pruebas locales).
     */
    public static function send(Appointment $appointment, $type = 'confirmation')
    {
        $phone = $appointment->patient->user->phone ?? 'Sin número';
        $patientName = $appointment->patient->user->name;
        $doctorName = $appointment->doctor->name;
        $date = $appointment->date->format('d/m/Y');
        $time = $appointment->start_time;

        $message = "";

        if ($type === 'confirmation') {
            $message = "✅ CONFIRMACIÓN: Hola {$patientName}, tu cita con el Dr. {$doctorName} ha sido confirmada para el día {$date} a las {$time}.";
        } elseif ($type === 'reminder') {
            $message = "⏰ RECORDATORIO: Hola {$patientName}, recuerda que tienes una cita mañana {$date} a las {$time} con el Dr. {$doctorName}.";
        }

        // SIMULACIÓN LOCAL: 
        // En lugar de intentar conectar a una API externa que fallará en local,
        // registramos el resultado en los logs para que puedas verificarlo.
        Log::info("--- SIMULACIÓN DE ENVÍO WHATSAPP ---");
        Log::info("PARA (TELÉFONO): " . $phone);
        Log::info("CONTENIDO: " . $message);
        Log::info("ESTADO: Simulación Exitosa");
        Log::info("------------------------------------");

        return true;
    }
}
