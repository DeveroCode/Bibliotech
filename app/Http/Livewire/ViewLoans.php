<?php

namespace App\Http\Livewire;

use App\Models\Prestamo;
use Livewire\Component;
use Livewire\WithPagination;

class ViewLoans extends Component
{
    use WithPagination;


    public $folio;
    protected $listeners = [
        'deleteBook',
        'leerDatos' => 'buscar',
    ];

    public function updatedFolio()
    {
        $this->resetPage();
    }

    public function deleteBook(Prestamo $prestamo)
    {
        $prestamo->libros()->detach();
        $prestamo->alumnos()->detach();
        $prestamo->delete();
    }

    public function buscar($folio)
    {
        $this->folio = $folio;
    }

    public function getLoansByFolio()
    {
        $loans = Prestamo::where('folio', 'LIKE', '%' . $this->folio . '%')
        ->orWhereHas('libros', function ($query) {
            $query->where('isbn', 'LIKE', '%' . $this->folio . '%')
                ->orWhere('titulo', 'LIKE', '%' . $this->folio . '%');
        })->latest()->paginate(50);

        if($loans){
            return $loans;
        }
        return Prestamo::latest()->paginate(50);
    }


    public function render()
    {

        $loans = $this->getLoansByFolio();

        return view('livewire.librarian.view-loans', [
            'loans' => $loans,
        ]);
    }
}
