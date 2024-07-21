<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Libro;
use App\Models\Categoria;

class MostrarResultados extends Component
{

    public $palabra;
    public $categoria;
    public $edicion;

    protected $listeners = ['leerPalabra' => 'search'];

    public function search($palabra, $categoria, $edicion)
    {
        $this->palabra = $palabra;
        $this->categoria = $categoria;
        $this->edicion = $edicion;
    }

    public function render()
    {
        if($this->palabra || $this->categoria || $this->edicion){
            $libros = Libro::when($this->palabra, function($query){
                $query->where('titulo', 'LIKE', "%" . $this->palabra . "%");
            })->when($this->categoria, function($query){
                $query->where('categoria_id', $this->categoria);
            })->when($this->edicion, function($query){
                $query->where('edicion', $this->edicion);
            })->with('autores')->paginate(30);
        }else if(!is_null($this->categoria) && $this->categoria != 0 || !empty($this->edicion) && $this->edicion != 0){
            $libros = Libro::paginate(12);
        }else{
            $libros = Libro::paginate(12);
        }

        return view('livewire.mostrar-resultados', [
            'libros' => $libros
        ]);
    }
}
