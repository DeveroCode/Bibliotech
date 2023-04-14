<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;
use App\Models\Categoria;

class MostrarResultados extends Component
{

    public $palabra;
    protected $listeners = ['leerPalabra' => 'search'];

    public function search($palabra)
    {
        $this->palabra = $palabra;
    }

    public function render()
    {
        if ($this->palabra) {
            $libros = Libro::with('autores')->where('titulo', 'like', '%' . $this->palabra . '%')->paginate(20);
            $categorias = Categoria::all();
        } else {
            $libros = Libro::with('autores')->where('titulo', 'like', '%' . $this->palabra . '%')->paginate(20);
            $categorias = Categoria::all();
        }
        return view('livewire.mostrar-resultados', [
            'libros' => $libros,
            'categorias' => $categorias,
        ]);
    }
}
