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

    public function buscar($no_institucional)
    {
        $this->no_institucional = $no_institucional;

        if (empty($this->no_institucional)) {
            $this->alumno = [];
            return;
        }

        $alumno = $this->alumno = Alumno::where('no_institucional', 'LIKE', '%' . $this->no_institucional . '%')->get();
        $this->alumno = $alumno;

        //concatenating variables to the front-end
        $datos = $this->alumno;

        $this->id_student = $datos[0]->id;
        $this->no_folio = $this->createFolio($datos[0]->no_institucional, $datos[0]->nombre);
        $this->nombre = $datos[0]->nombre;
        $this->carrera = $datos[0]->carrera;
        $this->correo = $datos[0]->email;

        //
        $this->emit('dataStudent', [
            'id' => $this->id_student,
            'nombre' => $this->nombre,
            'carrera' => $this->carrera,
            'correo' => $this->correo,
        ]);

        $this->emit('dataFolio', [
            'folio' => $this->no_folio,
        ]);
    }

    // Create folio

    public function render()
    {
        return view('livewire.view-student-data', [
            'alumno' => $this->alumno,
        ]);
    }
}
