<?php

namespace App\Http\Livewire;

use App\Models\Prestamo;
use Livewire\Component;

class ViewLoans extends Component
{
    public $isbn;
    public $found = false;
    public $message;
    protected $listeners = [
        'deleteBook',
        'leerDatos' => 'buscar',
    ];

    public function deleteBook(Prestamo $prestamo)
    {
        $prestamo->libros()->detach();
        $prestamo->alumnos()->detach();
        $prestamo->delete();
    }

    public function buscar($isbn)
    {
        $this->isbn = $isbn;

        if ($this->isbn) {
            $loans = Prestamo::where('folio', 'LIKE', '%' . $this->isbn . '%')
                ->orWhereHas('libros', function ($query) {
                    $query->where('isbn', 'LIKE', '%' . $this->isbn . '%')
                        ->orWhere('titulo', 'LIKE', '%' . $this->isbn . '%');
                })->latest()->paginate(50);
            $this->found = $loans->count() > 0 ? true : false;
            $this->emit('status', $this->found);
        } else {
            $loans = Prestamo::latest()->paginate(50);
        }

    }

    public function render()
    {

        $loans = Prestamo::latest()->paginate(50);
        return view('livewire.librarian.view-loans', [
            'loans' => $loans,
        ]);
    }
}
