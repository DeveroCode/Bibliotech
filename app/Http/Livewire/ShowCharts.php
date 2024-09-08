<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use App\Models\Prestamo;
use Livewire\Component;

class ShowCharts extends Component
{
    public $inventoryData = [];
    public $Loans = [];

    public function mount()
    {
        $this->inventoryData = Libro::count();
        $loansData = Prestamo::selectRaw('MONTH(fecha_inicio) as month, COUNT(*) as loans')
            ->groupBy('month')
            ->pluck('loans', 'month')
            ->toArray();

        $this->Loans = array_replace(array_fill(1, 12, 0), $loansData);
    }

    public function render()
    {
        return view('livewire.show-charts');
    }
}
