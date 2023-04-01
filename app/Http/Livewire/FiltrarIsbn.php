<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;

class FiltrarIsbn extends Component
{
    public $isbn;

    public function leerDatosFormulario()
    {
        $this->emit('leerDatos', $this->isbn);
    }

    public function render()
    {
        // Model Book
        $libros = Libro::all();

        return view('livewire.filtrar-isbn', [
            'libros' => $libros
        ]);
    }
}
