<?php

namespace App\Http\Livewire;

use App\Models\Prestamo;
use Livewire\Component;

class ShowLoans extends Component
{
    public function render()
    {
        $loans = Prestamo::all();
        return view('livewire.show-loans',
            [
                'loans' => $loans,
            ]);
    }
}
