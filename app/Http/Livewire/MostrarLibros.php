<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;

class MostrarLibros extends Component
{
    public $isbn;
    protected $listeners = ['deleteBook', 'leerDatos' => 'buscar'];

    // Set the colors
    public $categoryColors = [
        1 => 'bg-sea-100 text-blue-600',
        2 => 'bg-indigo-100 text-blue-600',
        3 => 'bg-blue-100 text-blue-600',
        4 => 'bg-amber-100 text-blue-600',
        5 => 'bg-red-100 text-blue-600',
        6 => 'bg-emerald-100 text-blue-600',
        7 => 'bg-orange-100 text-blue-500',
    ];

    // Create function of sweet alert to delete books
    public function deleteBook(Libro $libro)
    {
        // Eliminar el libro y autores relacionados
        $autores = $libro->autores;

        // Eliminar los autores correspondientes al libro
        foreach ($autores as $autor) {
            $autor->libros()->detach($libro->id);
            // Eliminar el autor si no tiene más libros relacionados
            if ($autor->libros()->count() == 0) {
                $autor->delete();
            }
        }

        // Eliminar el libro
        $libro->delete();

    }

    public function buscar($isbn)
    {
        $this->isbn = $isbn;
    }

    public function render()
    {
        if ($this->isbn) {
            $libros = Libro::where('isbn', $this->isbn)->paginate(1);
        } else {
            $libros = Libro::paginate(10);
        }
        // $libros = Libro::where('user_id', auth()->user()->id)->paginate(50);
        return view('livewire.librarian.mostrar-libros', [
            'libros' => $libros,
            'categoryColors' => $this->categoryColors
        ]);
    }
}
