<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use Carbon\Carbon;
use Livewire\Component;

class ViewStudentData extends Component
{
    public $nombre;
    public $carrera;
    public $correo;
    public $id_student;
    public $no_folio;
    public $found = null;

    // Datas for search the books and alumnos
    public $no_institucional;

    // Iniciar vació el array
    public $alumno = [];
    protected $listeners = ['searchWord' => 'buscar'];

    public function createFolio($no, $name)
    {
        $first = substr($no, 0, 2);
        $second = substr($name, 0, 3);
        $third = Carbon::now()->format('ss');
        $folio = $first . strtoupper($second) . $third;

        return $folio;
    }

    public function searchUser($no_institucional)
    {
        $alumno = $this->alumno = Alumno::where('no_institucional', 'LIKE', '%' . $no_institucional . '%')->get();
        return $alumno;
    }

    public function buscar($no_institucional)
    {
        $this->no_institucional = $no_institucional;

        if (empty($this->no_institucional)) {
            return;
        }
        $alumno = $this->searchUser($no_institucional);
        if ($alumno && $alumno->count() > 0) {
            $datos = $alumno->first();

            // Asignar los valores correspondientes
            $this->id_student = $datos->id;
            $this->no_folio = $this->createFolio($datos->no_institucional, $datos->nombre);
            $this->nombre = $datos->nombre;
            $this->carrera = $datos->carrera;
            $this->correo = $datos->email;

            // Emitir los datos encontrados
            $this->emit('dataStudent', [
                'id' => $this->id_student,
                'nombre' => $this->nombre,
                'carrera' => $this->carrera,
                'correo' => $this->correo,
            ]);

            $this->emit('dataFolio', [
                'folio' => $this->no_folio,
            ]);
            $this->found = false; // Asegúrate de establecer found
            $this->emit('status', $this->found); // Emite el estado actualizado
        } else {
            $this->found = true; // No se encontró, actualiza el estado
            $this->emit('status', $this->found); // Emite el estado
        }
    }

    // Create folio

    public function render()
    {
        return view('livewire.librarian.view-student-data', [
            'alumno' => $this->alumno,
        ]);
    }
}
