<?php

namespace App\Exports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\FromCollection;

class AlumnosExport implements FromCollection
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection()
    {
        return Alumno::all();
    }

    public function headings(): array
    {
        return [
            'Nombre',
            'Apellido Paterno',
            'Apellido Materno',
            'Email',
            'Telefono',
            'Direccion',
            'Fecha de Nacimiento',
            'Anio de Ingreso',
            'Carrera',
        ];
    }
}
