<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use Livewire\Component;

class PrestamosLibros extends Component
{
    public $no_institucional;
    protected $listeners = ['searchWord' => 'buscar'];
    public function buscar($no_institucional)
    {
        $this->no_institucional = $no_institucional;
    }

    public function render()
    {
        $alumno = Alumno::where('no_institucional', 'LIKE', '%' . $this->no_institucional . '%')->get();
        return view('livewire.prestamos-libros', [
            'alumno' => $alumno,
        ]);
    }
}
