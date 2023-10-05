<?php

namespace App\Http\Livewire;

use App\Models\Prestamo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PrestamosLibros extends Component
{
    // variables for the front-end
    public $nombre;
    public $carrera;
    public $correo;
    public $no_institucional;
    public $alumno_id;
    public $libro_id;
    public $user_biblio;
    public $fecha_inicial;
    public $titulo;
    public $autores;
    public $identificacion;
    public $no_adquisicion;
    public $fecha_renovacion;
    public $cantidad;
    public $isbn;

    // Validating fields
    protected $rules = [
        'nombre' => 'required|string',
        'carrera' => 'required|string',
        'correo' => 'required|email',
        'user_biblio' => 'required|string',
        'fecha_inicial' => 'required|date',
        'titulo' => 'nullable|string',
        'autores' => 'required|string',
        'identificacion' => 'required|string',
        'fecha_renovacion' => 'nullable|date',
        'cantidad' => 'required|int',
    ];

    protected $listeners = ['dataStudent' => 'loadDataStudent', 'dataBook' => 'loadDataBook'];

    public function loadDataStudent($datos)
    {
        $this->nombre = $datos['nombre'];
        $this->alumno_id = $datos['id'];
        $this->carrera = $datos['carrera'];
        $this->correo = $datos['correo'];
    }

    public function loadDataBook($datos)
    {
        $this->libro_id = $datos['id'];
        $this->user_biblio = $datos['user_biblio'];
        $this->fecha_inicial = $datos['fecha_inicial'];
        $this->titulo = $datos['titulo'];
        $this->autores = $datos['autores'];
        $this->identificacion = $datos['identificacion'];
        $this->no_adquisicion = $datos['no_adquisicion'];
        // $this->fecha_renovacion = $datos['fecha_renovacion'];
        $this->cantidad = $datos['cantidad'];
    }

    public function processLoan()
    {
        $datos = $this->validate();

        $datos['nombre'] = $this->nombre;
        $datos['carrera'] = $this->carrera;
        $datos['correo'] = $this->correo;
        $datos['alumno_id'] = $this->alumno_id;
        $datos['user_biblio'] = $this->user_biblio;
        $datos['fecha_inicial'] = $this->fecha_inicial;
        $datos['titulo'] = $this->titulo;
        $datos['autores'] = $this->autores;
        $datos['identificacion'] = $this->identificacion;
        $datos['no_adquisicion'] = $this->no_adquisicion;
        $datos['fecha_renovacion'] = $this->fecha_renovacion;
        $datos['cantidad'] = $this->cantidad;
        // dd($datos);

        $prestamo = Prestamo::create([
            'numero_adquisicion' => $datos['cantidad'],
            'tipo_prestamo' => $datos['cantidad'],
            'fecha_devolucion' => $datos['fecha_inicial'],
            'fecha_prestamo' => $datos['fecha_inicial'],
            'user_id' => auth()->user()->id,
        ]);

        DB::table('alumno_libro_prestamos')->insert([
            'alumno_id' => $this->alumno_id,
            'libro_id' => $this->libro_id,
            'prestamo_id' => $prestamo->id,
        ]);

        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.prestamos-libros');
    }
}
