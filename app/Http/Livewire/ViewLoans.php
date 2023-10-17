<?php

namespace App\Http\Livewire;

use App\Models\Prestamo;
use Livewire\Component;

class ViewLoans extends Component
{
    public function render()
    {
        $loans = Prestamo::all();
        return view('livewire.view-loans', [
            'loans' => $loans,
        ]);
    }
}
