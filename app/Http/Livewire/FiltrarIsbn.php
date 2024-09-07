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

    public function getLabelTextProperty()
    {
        if (request()->routeIs('loans*')) {
            return 'Búsqueda de préstamos';
        }

        return 'Búsqueda de libros';
    }

    public function getPlaceholderTextProperty()
    {
        if (request()->routeIs('loans*')) {
            return 'Buscar por Folio: ej. 19CAR4143';
        }

        return 'Buscar por ISBN: ej. ISBN-13:978-6073235853';
    }

    public function render()
    {
        // Model Book
        $libros = Libro::all();
        return view('livewire.search-components.filtrar-isbn', [
            'libros' => $libros,
        ]);
    }
}
