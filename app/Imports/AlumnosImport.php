<?php

namespace App\Imports;

use App\Models\Alumno;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AlumnosImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (empty($row[0])) {
            return null;
        }

        return new Alumno([
            'nombre' => $row[0],
            'apellidoP' => $row[1],
            'apellidoM' => $row[2],
            'email' => $row[3],
            'telefono' => $row[4],
            'direccion' => $row[5],
            'fecha_nacimiento' => $row[6],
            'anio_ingreso' => $row[7],
            'carrera' => $row[8],
        ]);
    }
}
