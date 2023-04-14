<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;

class FiltrarBusquedas extends Component
{
    public $palabra;

    public function searchWord(){
        $this->emit('leerPalabra', $this->palabra);
    }

    public function render()
    {
        $categorias = Categoria::all();
        return view('livewire.filtrar-busquedas',[
            'categorias' => $categorias,
        ]);
    }
}
