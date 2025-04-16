<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class LoansCustom extends Component
{
    public $categoria;
    public $trimestre;
    public $palabra;
    public function updated()
    {
        $this->emit('searchLoan', $this->categoria, $this->trimestre, $this->palabra);
    }

    public function render()
    {
        $categorias = Categoria::select('id', 'categoria')->take(6)->get();
        return view('livewire.librarian.loans-custom', [
            'categorias' => $categorias,
        ]);
    }
}