<?php

namespace App\Http\Livewire\Stat;

use Livewire\Component;
use App\Models\LibroPrestamo;
use App\Models\Categoria;

class MetodosTabla extends Component
{
    public $found = null;
    public $plazo;
    public $categoria;
    
    public $statusMessage = '';

    protected $listeners = ['loans' => 'buscar'];
    
    //4/11/2024

 public function searchCaPla()
{
    $buscando = $this->buscando = LibroPrestamo::where('plazo', 'LIKE', '%' . $plazo . '%')
        ->where('categoria', 'LIKE', '%' . $categoria . '%')
        ->get();

    return $buscando;
} 

    // Esta función recibirá nuestra variable 
    // plazo y categoria, la cual contiene el plazo y categoria que deseamos buscar
    public function buscar($categoria, $plazo)
    {
        $this->categoria = $categoria;
        $this->plazo = $plazo;
        

 // Determinar el estado basado en la entrada
 $status = null;

            if (empty($this->categoria) && empty($this->plazo)) {
                $status = 'empty_both';
            }elseif (empty($this->categoria)){
                    $status = 'empty_categoria';
            } elseif (empty($this->plazo)) {
                $status = 'empty_plazo';
            } else {
                $buscando = $this->searchCaPla($this->categoria, $this->plazo);
                $status = $buscando->isEmpty() ? 'empty_results' : 'results_found';
            }

            
        switch ($status) {
            case 'empty_both':
                
                $this->found = false;
                $this->statusMessage = "Por favor selecciona una categoría y un plazo.";
                //$this->emitSelf('refresh');
                return;

             case 'empty_categoria':
                 $this->found = false;
                 $this->statusMessage = "Selecciona una categoría por favor.";
                 //$this->emitSelf('refresh');
                 return;

            case 'empty_plazo':
                $this->found = false;
                $this->statusMessage = "Selecciona un plazo por favor.";
                //$this->emitSelf('refresh');
                return;

            case 'empty_results':
                $this->found = false;
                $this->statusMessage = "No se encontraron datos dentro del filtro.";
                // $this->emitSelf('refresh');
                return;

            case 'results_found':
                $this->found = true;
                $this->emit('buscando', $this->categoria, $this->plazo);
                break;
        }
    }

    

    public function render()
    {

        $meses = [];

        $prestamos = LibroPrestamo::query();

        if ($this->categoria) {
            $prestamos->WhereHas('libro.categoria', function($query){
                $query->where('id', $this->categoria);
            });
          
        } 
        if ($this->plazo) {
           $plazos = [
            1=>[1,2,3],
            2=>[4,5,6],
            3=>[7,8,9],
            4=>[10,11,12]
           ];
           $months = $plazos[$this->plazo];
           $prestamos->whereYear('created_at', '=', date('Y'))
            ->whereMonth('created_at', '>=', $months[0])
            ->whereMonth('created_at', '<=', $months[2]);
        }
        $prestamos = $prestamos->with('libro.categoria')
            ->select('libro_id', \DB::raw('count(*) as total_prestamos'))
            ->groupBy('libro_id')
            ->get();

        return view('livewire.librarian.others.metodos-tabla', [
            'prestamos' => $prestamos,
            'categoria' => $this->categoria, // Corregí la variable aquí
            'found' => $this->found, 
            'plazo' => $this->plazo, 
            'statusMessage' => $this->statusMessage,
        ]);
    }

    public function getTrimestres($trimestre)
    {
        switch ($trimestre) {
            case 'ene-mar':
                return ['2024-01-01 00:00:00', '2024-03-31 23:59:59'];
                break;
            case 'abr-jun':
                return ['2024-04-01 00:00:00', '2024-06-30 23:59:59'];
                break;
            case 'jul-sep':
                return ['2024-07-01 00:00:00', '2024-09-30 23:59:59'];
                break;
            case 'oct-dec':
                return ['2024-10-01 00:00:00', '2024-12-31 23:59:59'];
                break;
            case 'Año':
                return ['2024-01-01 00:00:00', '2024-12-31 23:59:59'];
                break;
            default:
                return ['2024-01-01 00:00:00', '2024-01-01 00:00:00'];
                break;
        }
    }
}
    


