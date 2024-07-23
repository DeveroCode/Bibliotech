<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use App\Models\Prestamo;
use Livewire\Component;

class ViewLoans extends Component
{
    public $isbn;
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
    }

    public function render()
    {

        if ($this->isbn) {
            // Obtener los IDs de los libros que coincidan con el criterio de búsqueda
            $librosIds = Libro::where('isbn', 'LIKE', '%' . $this->isbn . '%')
                ->orWhere('titulo', 'LIKE', '%' . $this->isbn . '%')
                ->pluck('id');

            // Buscar préstamos que tengan alguno de esos libros
            $loans = Prestamo::whereHas('libros', function ($query) use ($librosIds) {
                $query->whereIn('libro_id', $librosIds);
            })->latest()->paginate(50);
        } else {
            $loans = Prestamo::latest()->paginate(50);
        }

        return view('livewire.view-loans', [
            'loans' => $loans,
        ]);
    }
}
