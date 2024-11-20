<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use App\Models\Prestamo;
use Livewire\Component;

class ShowCardsBiblio extends Component
{
    public function render()
    {
        $libros_en_existencia = Libro::where('cantidad', '>', 0)->count();
        $loans = Prestamo::count();
        return view('livewire.librarian.show-cards-biblio', [
            'libros_en_existencia' => $libros_en_existencia,
            'loans' => $loans,
        ]);
    }
}
