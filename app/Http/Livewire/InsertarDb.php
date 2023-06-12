<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class InsertarDb extends Component
{
    use WithFileUploads;

    public $archivo;

    protected $rules = [
        'archivo' => 'required|file|max:1024|mimes:xlsx,xls',
    ];

    public function crearAlumnos()
    {
        $datos = $this->validate([
            'archivo' => 'required|mimes:xlsx,xls',
        ]);

        if ($this->archivo) {
            $path = $datos['archivo']->getRealPath();

            // Leer el archivo Excel y obtener los datos
            $alumnos = Excel::toCollection(null, $path)->flatten(1);
            // Insertar los datos en la base de datos
            foreach ($alumnos as $alumno) {
                Alumno::create([
                    'nombre' => $alumno[0],
                    'apellidoP' => $alumno[1],
                    'apellidoM' => $alumno[2],
                    'email' => $alumno[3],
                    'telefono' => $alumno[4],
                    'direccion' => $alumno[5],
                    'fecha_nacimiento' => $alumno[6],
                    'anio_ingreso' => $alumno[7],
                    'carrera' => $alumno[8],
                ]);
            }

            // Crear mensaje de éxito
            session()->flash('message', 'Alumnos creados con éxito');

            // Redirigir al dashboard u otra ubicación deseada
            return redirect()->route('admin.index');
        }

    }

    public function render()
    {
        return view('livewire.insertar-db');
    }
}