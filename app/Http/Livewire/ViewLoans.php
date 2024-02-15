<?php

namespace App\Http\Livewire;

use App\Models\Prestamo;
use Livewire\Component;

class ViewLoans extends Component
{
    protected $listeners = [
        'deleteBook',
    ];
    public function deleteBook(Prestamo $prestamo)
    {
        $prestamo->libros()->detach();
        $prestamo->alumnos()->detach();
        $prestamo->delete();
    }

    public function render()
    {
        $loans = Prestamo::all();
        return view('livewire.view-loans', [
            'loans' => $loans,
        ]);
    }
}
