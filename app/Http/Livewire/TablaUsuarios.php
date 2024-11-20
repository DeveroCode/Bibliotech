<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Alumno;
use App\Models\Categoria;
use App\Models\registroentradas;


class TablaUsuarios extends Component
{
    public $sexo;
    public $carrera;
    public $corte;
    public $fechainicio;
    public $fechafin;
   
     

    protected $listeners = ['busqueda' => 'filtros'];

    public function filtros($carrera, $sexo, $corte,$fechainicio, $fechafin)
    {
        $this->carrera = $carrera;
        $this->sexo = $sexo;
        $this->corte = $corte;
        $this->fechainicio = $fechainicio;
        $this->fechafin = $fechafin;       
    }
 
    
    public function render()
    {
        $registros = registroentradas::query();

        if ($this->carrera) {
            $registros->whereHas('alumnos', function ($query) {
                $query->where('categorias_id', $this->carrera);
            });
        }

        if ($this->sexo) {
            $registros->whereHas('alumnos', function ($query) {
                $query->where('sexo', $this->sexo);
            });
        }

        if ($this->corte) {
            $cortes = [
                1 => [1, 2, 3],
                2 => [4, 5, 6],
                3 => [7, 8, 9],
                4 => [10, 11, 12]
            ];
            $months = $cortes[$this->corte];
            $registros->whereYear('created_at', '=', date('Y'))
                      ->whereMonth('created_at', '>=', $months[0])
                      ->whereMonth('created_at', '<=', $months[2]);
        }

        if ($this->fechainicio && $this->fechafin) {
            $registros->whereBetween('created_at', [$this->fechainicio, $this->fechafin]);
        }

        $registros = $registros->get();

        foreach ($registros as $registro) {
            $alumno = Alumno::find($registro->alumnos_id);
            $registro->alumno = $alumno;
        }

        $registros = $registros->groupBy('alumnos_id')
                               ->map(function ($items) {
                                   return [
                                       'alumnos_id' => $items->first()->alumnos_id,
                                       'total_usuarios' => $items->count()
                                   ];
                               });

        return view('livewire.tabla-usuarios', [
            'registros' => $registros,
        ]);
    }


}
