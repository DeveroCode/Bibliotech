<?php

namespace App\Http\Livewire;

use App\Models\Autor;
use App\Models\Libro;
use Livewire\Component;

class MostrarLibros extends Component
{
    protected $listeners = ['deleteBook'];

    // Create function of sweet alert to delete books
    public function deleteBook(Libro $libro)
    {
        // Eliminar el libro y autor
        // Obtener los autores correspondientes al libro
        $autores = $libro->autores;
        // Obtener los autores correspondientes al libro
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

    public function render()
    {
        $libros = Libro::where('user_id', auth()->user()->id)->paginate(50);

        return view('livewire.mostrar-libros', [
            'libros' => $libros
        ]);
    }
}
