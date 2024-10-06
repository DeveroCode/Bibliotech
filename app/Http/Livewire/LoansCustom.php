<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class LoansCustom extends Component
{
    public $categoria;
    public $trimestre;
    public function searchLoan()
    {
        $this->emit('searchLoan', $this->categoria, $this->trimestre);
    }

    public function render()
    {
        $categorias = Categoria::select('id', 'categoria')->take(6)->get();
        return view('livewire.librarian.loans-custom', [
            'categorias' => $categorias,
        ]);
    }
}
