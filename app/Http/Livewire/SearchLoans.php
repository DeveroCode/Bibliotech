<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchLoans extends Component
{
    public $folio;

    public function readFolio()
    {
        $this->emit('readFolio', $this->folio);
    }

    public function render()
    {
        return view('livewire.search-components.search-loans');
    }
}
