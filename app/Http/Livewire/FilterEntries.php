<?php

namespace App\Http\Livewire;

use Livewire\Component;

class FilterEntries extends Component
{
    public $actividad;
    public $genero;
    public $trimestre;
    public $start;
    public $end;

    public function updated()
    {
        $this->emit('filters', $this->actividad, $this->genero, $this->trimestre, $this->start, $this->end);
    }
    
    public function render()
    {
        return view('livewire.search-components.filter-entries');
    }
}
