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
        // in case an array is empty, it is removed
        if (empty($row['email'])) {
            return null; // o usa 'nombre' si prefieres
        }

        // Buscar si el alumno ya existe por su email
        $alumno = Alumno::where('email', $row['email'])->first();

        if ($alumno) {
            // Si existe, lo actualizamos
            $alumno->update([
                'nombre' => $row['nombre'],
                'apellidoP' => $row['apellidop'],
                'apellidoM' => $row['apellidom'],
                'no_institutcional' => $row['no_institucional'],
                'fecha_nacimiento' => $row['fecha_nacimiento'],
                'anio_ingreso' => $row['anio_ingreso'],
                'carrera' => $row['carrera'],
                'sexo' => $row['sexo'],
            ]);
            return null;
        }

        // Si no existe, lo creamos
        return new Alumno([
            'nombre' => $row['nombre'],
            'apellidoP' => $row['apellidop'],
            'apellidoM' => $row['apellidom'],
            'email' => $row['email'],
            'no_institucional' => $row['no_institucional'],
            'fecha_nacimiento' => $row['fecha_nacimiento'],
            'anio_ingreso' => $row['anio_ingreso'],
            'carrera' => $row['carrera'],
            'sexo' => $row['sexo'],
        ]);
    }
}
