<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use App\Models\Libro;
use Livewire\Component;

class FiltrarBusquedas extends Component
{
    public $palabra;
    public $categoria;
    public $edicion;

    public function updated(){
        $this->emit('leerPalabra', $this->palabra, $this->categoria, $this->edicion);
    }

    public function searchWord()
    {
        $this->emit('leerPalabra', $this->palabra, $this->categoria, $this->edicion);
    }

    public function render()
    {
        $categorias = Categoria::all();
        $editoriales = Libro::all();
        return view('livewire.search-components.filtrar-busquedas', [
            'categorias' => $categorias,
            'editoriales' => $editoriales,
        ]);
    }
}
