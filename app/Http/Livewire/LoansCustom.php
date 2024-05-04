<?php

namespace App\Http\Livewire;

use App\Models\Categoria;
use Livewire\Component;

class LoansCustom extends Component
{
    public $categoria;
    public function searchLoan()
    {
        $this->emit('searchLoan', $this->categoria);

        // dd($this->categoria);
    }

    public function render()
    {
        $categorias = Categoria::select('id', 'categoria')->take(6)->get();
        return view('livewire.loans-custom', [
            'categorias' => $categorias,
        ]);
    }
}