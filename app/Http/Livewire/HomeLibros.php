<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Libro;
use Livewire\Component;

class HomeLibros extends Component
{
    public function render()
    {

        $libros =Libro::with('autores')->latest()->limit(6)->get();
        $categorias = Categoria::all();
        return view('livewire.home-libros', [
            'libros' => $libros,
            'categorias' => $categorias
        ]);
    }
}
