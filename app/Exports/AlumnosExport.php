<?php

namespace App\Exports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class AlumnosExport implements FromCollection, WithHeadings
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
            'ID',
            'Nombre',
            'ApellidoP',
            'ApellidoM',
            'Email',
            'Telefono',
            'Direccion',
            'No Institucional',
            'Fecha Nacimiento',
            'Anio Ingreso',
            'Carrera',
            'Created At',
            'Updated At',
        ];
    }
}
