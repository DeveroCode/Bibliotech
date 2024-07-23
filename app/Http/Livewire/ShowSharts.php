<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;

class ShowSharts extends Component
{
    public $inventoryData = [];

    public function mount()
    {
        $this->inventoryData = Libro::count();
        // dd($this->inventoryData);
    }

    public function render()
    {
        return view('livewire.show-sharts');
    }
}