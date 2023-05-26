<?php

namespace App\Http\Livewire;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Libro;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearLibro extends Component
{

    public $titulo;
    public $autores;
    public $edicion;
    public $tomo;
    public $paginas;
    public $categoria;
    public $estante;
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
        'paginas' => 'required|string',
        'categoria' => 'required|integer',
        'estante' => 'nullable|string',
        'fecha' => 'required|date',
        'cantidad' => 'required|integer',
        'isbn' => 'required|string|unique:libros,isbn',
        'descripcion' => 'required|string',
        'imagen' => 'required|image|max:1024',
    ];

    public function crearLibro()
    {
        $datos = $this->validate();
        // Convert to lowercase
        $datos['autores'] = strtolower($datos['autores']);
        $datos['titulo'] = strtolower($datos['titulo']);
        $datos['edicion'] = strtolower($datos['edicion']);
        $datos['categoria_id'] = strtolower($datos['categoria']);
        $datos['estante_id'] = strtolower($datos['estante']);
        $datos['descripcion'] = strtolower($datos['descripcion']);
        $autores = explode(',', $datos['autores']);
        $autores_ids = [];
        foreach ($autores as $autor) {
            $autor = Autor::firstOrCreate(['autor' => $autor]);
            $autores_ids[] = $autor->id;
        }

        // Guardar imagen
        $imagen = $this->imagen->store('public/libros');
        $datos['imagen'] = str_replace('public/libros/', '', $imagen);

        // Verificar si el ISBN ya existe en la base de datos
        if (Libro::where('isbn', $datos['isbn'])->exists()) {
            // Crear mensaje de error
            session()->flash('error', 'El ISBN ya existe en la base de datos.');

            // Redirigir al formulario
            return redirect()->back();
        }

        // Crear el libro
        $libro = Libro::create([
            'titulo' => $datos['titulo'],
            'edicion' => $datos['edicion'],
            'tomo' => $datos['tomo'],
            'paginas' => $datos['paginas'],
            'categoria_id' => $datos['categoria'],
            'estante_id' => $datos['estante'],
            'fecha' => $datos['fecha'],
            'cantidad' => $datos['cantidad'],
            'isbn' => $datos['isbn'],
            'descripcion' => $datos['descripcion'],
            'imagen' => $datos['imagen'],
            'user_id' => auth()->user()->id,
        ]);

        // Adjuntar autores al libro
        foreach ($autores_ids as $autor_id) {
            DB::table('autor_libro')->insert([
                'libros_id' => $libro->id,
                'autores_id' => $autor_id,
            ]);
        }

        // Crear mensaje de éxito
        session()->flash('message', 'Libro creado con éxito');

        // Redirigir al dashboard
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