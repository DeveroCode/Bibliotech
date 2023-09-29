<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use App\Models\Libro;
use Livewire\Component;

class PrestamosLibros extends Component
{
    public $no_institucional;
    public $isbn;

    // Iniciar vació el array
    public $alumno = [];
    public $isb = [];
    protected $listeners = ['searchWord' => 'buscar', 'leerDatos' => 'isb'];
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

    public function isb($isbn)
    {
        $this->isbn = $isbn;

        if (empty($this->isbn)) {
            $this->isbn = [];
            return;
        };

        $isbn = $this->isbn = Libro::where('isbn', 'LIKE', '%' . $this->isbn . '%')->get();
        $this->isbn = $isbn;
    }
    public function render()
    {
        return view('livewire.prestamos-libros', [
            'alumno' => $this->alumno,
            'isbn' => $this->isbn,
        ]);
    }
}
