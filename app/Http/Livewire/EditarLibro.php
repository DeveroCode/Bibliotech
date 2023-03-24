<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;
use App\Models\Categoria;
use Livewire\WithFileUploads;
use Illuminate\Support\Carbon;

class EditarLibro extends Component
{
    public $libro_id;
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
    public $imagen_nueva;

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
        'imagen_nueva' => 'nullable|image|max:1024',
    ];


    public function mount(Libro $libro){
        $this->libro_id = $libro->id;
        $this->titulo = $libro->titulo;
        $this->edicion = $libro->edicion;
        $this->tomo = $libro->tomo;
        $this->categoria = $libro->categoria_id;
        $this->fecha = Carbon::parse($libro->fecha)->format('Y-m-d');
        $this->cantidad = $libro->cantidad;
        $this->isbn = $libro->isbn;
        $this->descripcion = $libro->descripcion;
        $this->imagen = $libro->imagen;

        $autores = explode(';', $libro->autores);
        $formatted_autores = [];
        foreach ($autores as $autor) {
            $name_parts = explode(',', $autor);
            $formatted_autores[] = trim($name_parts[1]) . ' ' . trim($name_parts[0]);
        }
        $this->autores = implode(', ', $formatted_autores);
    }


    // Edit and create libro
    public function editarLibro(){
        $datos = $this->validate();
        //check if a new image exists
        if ($this->imagen_nueva) {
            $imagen = $this->imagen_nueva->store('public/libros');
            $datos['imagen'] = str_replace('public/libros', '', $imagen);
        }
        // find the book
        $libro = Libro::find($this->libro_id);
        // value assignment to the book
        $libro->titulo = $datos['titulo'];
        $libro->autores = $datos['autores'];
        $libro->edicion = $datos['edicion'];
        $libro->tomo = $datos['tomo'];
        $libro->categoria_id = $datos['categoria'];
        $libro->fecha = $datos['fecha'];
        $libro->cantidad = $datos['cantidad'];
        $libro->isbn = $datos['isbn'];
        $libro->descripcion = $datos['descripcion'];
        $libro->imagen = $datos['imagen'] ?? $libro->imagen;
        // Save the book
        $libro->save();
        // Redirect
        session()->flash('message', 'Libro actualizado correctamente');
        return redirect()->route('dashboard.show');
    }

    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.editar-libro', [
            'categorias' => $categorias
        ]);
    }
}
