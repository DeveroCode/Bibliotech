<?php

namespace App\Exports;

use App\Models\registroentradas;
use Maatwebsite\Excel\Concerns\FromCollection;

class EntradasExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return registroentradas::with(['alumnos', 'categorias'])
            ->get()
            ->map(function ($entrada) {
                return [
                    'No. Control' => $entrada->alumnos->no_Control,
                    'Nombre' => $entrada->alumnos->nombre,
                    'Apellido Paterno' => $entrada->alumnos->apellidoP,
                    'Apellido Materno' => $entrada->alumnos->apellidoM,
                    'Materia' => $entrada->materias,
                    'Actividad' => $entrada->actividad->nombre ?? 'sin nombre de actividad',
                    'Fecha' => $entrada->fecha,
                    'Hora' => $entrada->hora,
                ];
            });
    }

    public function headings(): array
    {
        // Encabezados de la tabla
        return [
            'No. Control',
            'Nombre',
            'Apellido Paterno',
            'Apellido Materno',
            'Materia',
            'Actividad',
            'Fecha',
            'Hora',
        ];
    }
}
