<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Categoria;
use App\Models\LibroPrestamo;
class MetodosTrimestres extends Component
{

    public $plazo;
    public $categoria;

    public function searchWord(){
        $this->emit('loans', $this->categoria,$this->plazo);        
    }

    public function render()
    {   $libroPrestamo = LibroPrestamo::select('created_at')->get();
        $categorias=categoria::select('id','categoria')->take(6)->get();
        return view('livewire.metodos-trimestres',[
            'categorias'=>$categorias,
            'prestamos' => $libroPrestamo 
        ]);
    }
}
