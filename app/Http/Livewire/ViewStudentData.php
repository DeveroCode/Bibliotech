<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use Livewire\Component;

class ViewStudentData extends Component
{
    public $nombre;
    public $carrera;
    public $correo;

    // Datas for search the books and alumnos
    public $no_institucional;

    // Iniciar vació el array
    public $alumno = [];
    protected $listeners = ['searchWord' => 'buscar'];

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

        $this->nombre = $datos[0]->nombre;
        $this->carrera = $datos[0]->carrera;
        $this->correo = $datos[0]->email;
    }

    public function render()
    {
        return view('livewire.view-student-data', [
            'alumno' => $this->alumno,
        ]);
    }
}
