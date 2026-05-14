<!DOCTYPE html>
<html>
<head>
    <style>
        body { font-family: Arial, sans-serif; color: #333; }
        .header { background-color: #1e293b; color: white; padding: 15px; text-align: center; }
        .content { padding: 20px; }
        table { width: 100%; border-collapse: collapse; margin-top: 20px; }
        th, td { border: 1px solid #ddd; padding: 10px; text-align: left; }
        th { background-color: #f8fafc; font-size: 12px; text-transform: uppercase; }
        .footer { font-size: 11px; text-align: center; margin-top: 30px; color: #64748b; }
    </style>
</head>
<body>
    <div class="header">
        <h2>{{ $type === 'admin' ? 'Resumen General de Citas' : 'Tu Agenda para Hoy' }}</h2>
        <p>{{ now()->format('l, d \d\e F \d\e Y') }}</p>
    </div>

    <div class="content">
        @if($type === 'doctor')
            <p>Hola Dr. <strong>{{ $doctor->name }}</strong>,</p>
            <p>A continuación se detalla la lista de pacientes agendados para su consulta el día de hoy:</p>
        @else
            <p>Estimado Administrador,</p>
            <p>Este es el reporte consolidado de todas las citas médicas programadas para el día de hoy:</p>
        @endif

        <table>
            <thead>
                <tr>
                    <th>Hora</th>
                    <th>Paciente</th>
                    @if($type === 'admin')
                        <th>Doctor</th>
                    @endif
                    <th>Motivo</th>
                </tr>
            </thead>
            <tbody>
                @foreach($appointments as $app)
                    <tr>
                        <td>{{ $app->start_time }}</td>
                        <td>{{ $app->patient->user->name }}</td>
                        @if($type === 'admin')
                            <td>{{ $app->doctor->name }}</td>
                        @endif
                        <td>{{ $app->reason }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="footer">
        <p>Este es un reporte automático generado por el sistema Healthify a las 08:00 AM.</p>
    </div>
</body>
</html>
