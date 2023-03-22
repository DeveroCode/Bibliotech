<?php

namespace App\Http\Livewire;

use App\Models\Autor;
use App\Models\Libro;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Facades\DB;

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
        $libro = Libro::create([
            'titulo' => $datos['titulo'],
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

        // Assign authors to book
        $autores = explode(',', $datos['autores']);
        foreach ($autores as $autor) {
            $autor = Autor::firstOrCreate(['autores_id' => $autor]);
            $libro->autor()->attach($autor->id);
        }



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
