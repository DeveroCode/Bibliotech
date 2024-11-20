<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;

class MostrarLibros extends Component
{
    public $isbn;
    public $found = false;
    protected $listeners = ['deleteBook', 'leerDatos' => 'buscar'];

    // Create function of sweet alert to delete books
    public function deleteBook(Libro $libro)
    {
        // Eliminar el libro y autor - Obtener los autores correspondientes al libro
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

    public function buscar($isbn)
    {
        $this->isbn = $isbn;

        // Realizar búsqueda
        $libros = Libro::where('isbn', 'LIKE', '%' . $this->isbn . '%')
            ->orWhere('titulo', 'LIKE', '%' . $this->isbn . '%')
            ->paginate(50);

        // Verificar si se encontraron libros
        if ($libros->isEmpty()) {
            $this->found = false;
            $this->emit('status', $this->found);
        } else {
            $this->found = true;
            $this->emit('status', $this->found);
        }
    }

    public function render()
    {
        $libros = Libro::paginate(13);

        return view('livewire.librarian.mostrar-libros', [
            'libros' => $libros,
        ]);
    }
}
