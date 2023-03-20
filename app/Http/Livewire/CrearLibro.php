<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\Libro;
use Livewire\WithFileUploads;

class CrearLibro extends Component
{
    public $titulo;
    public $autores;
    public $edicion;
    public $tomo;
    public $categoria;
    public $fecha;
    public $cantidad;
    public $isbn;
    public $descripcion;
    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'titulo' => 'required|string',
        'autores' => 'required|string',
        'edicion' => 'required|string',
        'tomo' => 'nullable|string',
        'categoria' => 'required|integer',
        'fecha' => 'required|date',
        'cantidad' => 'required|integer',
        'isbn' => 'required|string',
        'descripcion' => 'required|string',
        'imagen' => 'required|image|max:1024',
    ];

    public function crearLibro()
    {
        $datos = $this->validate();

        // Save image
        $imagen = $this->imagen->store('public/libros');
        $datos['imagen'] = str_replace('public/libros/', '', $imagen);

        // Create book
        Libro::create([
            'titulo' => $datos['titulo'],
            'autores' => $datos['autores'],
            'edicion' => $datos['edicion'],
            'tomo' => $datos['tomo'],
            'categoria_id' => $datos['categoria'],
            'fecha' => $datos['fecha'],
            'cantidad'  => $datos['cantidad'],
            'isbn' => $datos['isbn'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);
        // create message of success
        session()->flash('message', 'Libro creado con éxito');

        // redirect to home
        return redirect()->route('dashboard');
    }

    public function render()
    {
        // DB
        $categorias = Categoria::all();
        return view('livewire.crear-libro', [
            'categorias' => $categorias,
        ]);
    }
}
