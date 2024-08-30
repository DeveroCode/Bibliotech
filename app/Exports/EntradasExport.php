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
        return registroentradas::all();
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
