<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;

class MostrarLibros extends Component
{
    public function render()
    {
        $libros = Libro::where('user_id', auth()->user()->id)->paginate(50);

        return view('livewire.mostrar-libros', [
            'libros' => $libros
        ]);
    }
}
