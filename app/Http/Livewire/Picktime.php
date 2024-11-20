<?php

namespace App\Http\Livewire;

use Livewire\Component;

class Picktime extends Component
{
    /* //variables que voy a buscar

    /* public $titulo; */

    // Variable por la cual sucede la búsqueda
   /*  public $plazo;
    public $categoria;

    protected $listeners = ['searchWord' => 'buscar']; */
    

    //esta función recibirá nuestra variable 
    //plazo y categoria, la cual contiene el plazo y categoria que deseamos Buscar
    /* public function buscar($categoria)
    {
        $this-> categoria = $categoria; */
 /* $Libro = $this->Libro = Libro::where('categoria_id', 'LIKE', '%' 
        . $this->categoria . '%')->get();
        $this->titulo = $titulo; */
    
       /*  $datos = $this->titulo;

         /* Asignamos las variables  */
       /*  $this->titulo=$datos[0]->titulo; */ 
    
        // lo enviamos a traves del emit
   /*  $this->emit('tituloLibro', [
        'titulo' => $this->titulo;
    ]);
    /*  */
   /*  }  */


    public function render()
    {

        return view('livewire.picktime');
    }
}
