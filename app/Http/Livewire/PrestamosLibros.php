<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use Livewire\Component;

class PrestamosLibros extends Component
{
    public $no_institucional;
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
    }

    public function render()
    {
        return view('livewire.prestamos-libros', [
            'alumno' => $this->alumno,
        ]);
    }
}
