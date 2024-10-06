<?php

namespace App\Http\Livewire;

use App\Models\Autor;
use App\Models\Categoria;
use App\Models\Estante;
use App\Models\Libro;
use App\Models\UserActivity;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Livewire\WithFileUploads;

class CrearLibro extends Component
{
    // Helpers Variables
    public $libro_id;
    public $editable = false;
    public $imagen_nueva;
    // General Variables
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

    public function mount(Libro $libro)
    {
        if ($libro) {
            $this->editable = true;
            $this->libro_id = $libro->id; // Find the book whith the id

            $this->titulo = $libro->titulo;
            $this->edicion = $libro->edicion;
            $this->tomo = $libro->tomo;
            $this->categoria = $libro->categoria_id;
            $this->fecha = Carbon::parse($libro->fecha)->format('Y-m-d');
            $this->cantidad = $libro->cantidad;
            $this->isbn = $libro->isbn;
            $this->descripcion = $libro->descripcion;
            $this->imagen = $libro->imagen;

            $autores = $libro->autores;
            $autores_array = [];
            foreach ($autores as $autor) {
                $autores_array[] = $autor->autor;
            }
            $this->autores = implode(', ', $autores_array);
        } else {
            $this->editable = false;
        }

    }

    public function crearLibro()
    {
        $datos = $this->validate();
        // Convert to lowercase
        $datos = array_map('strtolower', $datos); // Convert to lowercase - convertir a minusculas
        $autores_ids = $this->processAuthors($datos['autores']);
        if ($this->editable && $this->libro_id) {
            return $this->editBook($datos, $autores_ids);
        } else {

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
        }

        UserActivity::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Creación de un nuvo lirbo',
            'description' => 'Se ha creado el libro ' . $libro->titulo . ' por ' . auth()->user()->name . ' ' . auth()->user()->apellido_patero . ' ' . auth()->user()->apellido_matero,
        ]);

        // Crear mensaje de éxito
        session()->flash('message', 'Libro creado con éxito');

        // Redirigir al dashboard
        return redirect()->route('dashboard');
    }

    public function editBook($datos, $autoresIds)
    {
        $libro = Libro::find($this->libro_id);

        if ($this->imagen_nueva) {
            $imagen = $this->imagen_nueva->store('public/libros');
            $datos['imagen'] = str_replace('public/libros/', '', $imagen);
        } else {
            $datos['imagen'] = $this->imagen;
        }

        $libro->update($datos);
        DB::table('autor_libro')->where('libros_id', $this->libro_id)->delete();

        foreach ($autoresIds as $autor_id) {
            DB::table('autor_libro')->insert([
                'libros_id' => $libro->id,
                'autores_id' => $autor_id,
            ]);
        };

        UserActivity::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Edición de libro',
            'description' => 'Se ha editado el libro ' . $libro->titulo . ' por ' . auth()->user()->name . ' ' . auth()->user()->apellido_patero . ' ' . auth()->user()->apellido_matero,
        ]);

        session()->flash('message', 'Libro actualizado con éxito');
        return redirect()->route('dashboard');
    }

    public function processAuthors($autores)
    {
        $autores = array_map('trim', explode(',', $autores));
        $autores_ids = [];

        foreach ($autores_ids as $autor) {
            $autor = Autor::firstOrCreate(['autor' => $autor]);
            $autores_ids[] = $autor->id;
        }

        return $autores_ids;
    }

    public function render()
    {
        // DB
        $categorias = Categoria::all();
        $estantes = Estante::all();
        return view('livewire.librarian.crear-libro', [
            'categorias' => $categorias,
            'estantes' => $estantes,
        ]);
    }
}
