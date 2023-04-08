<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;
use App\Models\Categoria;

class MostrarLibro extends Component
{
    public $libro;

    public function render()
    {

        $categorias = Categoria::all();
        $librosRelacionados = Libro::where('categoria_id', $this->libro->categoria_id)
                                    ->where('id', '<>', $this->libro->id)
                                    ->limit(12)
                                    ->get();
        return view('livewire.mostrar-libro',[
            'categorias' => $categorias,
            'librosRelacionados' => $librosRelacionados
        ]);
    }
}
