<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;

class MostrarLibro extends Component
{
    public $libro;

    public function render()
    {

        //show related books
        $librosRelacionados = Libro::where('categoria_id', $this->libro->categoria_id)
            ->where('id', '<>', $this->libro->id)
            ->limit(12)
            ->get();
        return view('livewire.mostrar-libro', [
            // 'categorias' => $categorias,
            // 'estantes' => $estantes,
            'librosRelacionados' => $librosRelacionados,
        ]);
    }
}
