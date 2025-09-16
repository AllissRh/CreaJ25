<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Vacunacion;
use App\Models\Desparasitacion;
use Illuminate\Support\Facades\Mail;
use App\Mail\RecordatorioCartilla;
use Carbon\Carbon;

class EnviarRecordatorioCartilla extends Command
{
    // Nombre del comando que usarás en artisan
    protected $signature = 'cartilla:recordatorio';

    // Descripción del comando
    protected $description = 'Enviar recordatorio de vacunas y desparasitaciones a los usuarios';

    public function handle()
    {
        $hoy = Carbon::now()->toDateString();

        // Vacunas
        $vacunas = Vacunacion::with('mascota.user')
    ->whereDate('Proxima_dosis', $hoy)
    ->get();


        foreach ($vacunas as $vacuna) {
    if ($vacuna->mascota && $vacuna->mascota->user) {
        Mail::to($vacuna->mascota->user->email)
            ->send(new RecordatorioCartilla($vacuna, 'Vacuna'));

        $this->info('Correo enviado (Vacuna) a: ' . $vacuna->mascota->user->email);
    } else {
        $this->warn('Vacuna ID '.$vacuna->id.' no tiene mascota o usuario asociado.');
    }
}


        // Desparasitaciones
        $desparasitaciones = Desparasitacion::with('mascota.user')
    ->whereDate('Proxima_dosis', $hoy)
    ->get();


        foreach ($desparasitaciones as $desparasitacion) {
    if ($desparasitacion->mascota && $desparasitacion->mascota->user) {
        Mail::to($desparasitacion->mascota->user->email)
            ->send(new RecordatorioCartilla($desparasitacion, 'Desparasitacion'));

        $this->info('Correo enviado (Desparasitacion) a: ' . $desparasitacion->mascota->user->email);
    } else {
        $this->warn('Desparasitacion ID '.$desparasitacion->id.' no tiene mascota o usuario asociado.');
    }
}

        $this->info('Todos los recordatorios enviados.');
    }
}
