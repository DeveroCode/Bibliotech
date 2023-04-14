<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FiltrarBusquedas extends Component
{
    public $palabra;

    public function search(){
        dd('Buscando...');
    }

    public function render()
    {
        return view('livewire.filtrar-busquedas');
    }
}
