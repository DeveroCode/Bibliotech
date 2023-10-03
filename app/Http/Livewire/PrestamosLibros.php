<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use App\Models\Libro;
use Illuminate\Support\Carbon;
use Livewire\Component;

class PrestamosLibros extends Component
{
    // variables for the front-end
    public $nombre;
    public $carrera;
    public $correo;
    public $user_biblio;
    public $fecha_inicial;
    public $titulo;
    public $autores;
    public $identificacion;
    public $no_adquisicion;
    public $fecha_renovacion;
    public $cantidad;

    // Datas for search the books and alumnos
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

        //concatenating variables to the front-end
        $datos = $this->alumno;

        $this->nombre = $datos[0]->nombre;
        $this->carrera = $datos[0]->carrera;
        $this->correo = $datos[0]->email;
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

        //concatenating variables to the front-end
        $datos = $this->isbn;

        $this->user_biblio = auth()->user()->name;
        // $this->folio =
        $this->fecha_inicial = Carbon::now()->format('Y-m-d');
        $this->titulo = $datos[0]->titulo;
        $this->autores = $datos[0]->autores[0]->autor;
        $this->identificacion = $datos[0]->isbn;
        $this->no_adquisicion = $datos[0]->no_adquisicion;
        // $this->fecha_renovacion = $datos[0]->fecha_renovacion;
        $this->cantidad = $datos[0]->cantidad;
    }
    public function render()
    {
        return view('livewire.prestamos-libros', [
            'alumno' => $this->alumno,
            'isbn' => $this->isbn,
        ]);
    }
}