<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;


class FiltrarUsuarios extends Component
{
    public $categoria;
  
    public function searchWord(){
        $this->emit('busqueda', $this->categoria);
    }

    public function render()
    {
        return view('livewire.filtrar-usuarios');
    }
}
