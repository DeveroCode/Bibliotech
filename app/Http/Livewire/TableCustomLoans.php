<?php

namespace App\Http\Livewire;

use App\Models\LibroPrestamo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableCustomLoans extends Component
{
    public $categoria;
    public $trimestre;
    public $palabra;
    public $listeners = ['searchLoan' => 'search'];

    public function search($categoria, $trimestre, $palabra)
    {
        $this->categoria = $categoria;
        $this->trimestre = $trimestre;
        $this->palabra = $palabra;
    }

    public function render()
    {

        $prestamos = LibroPrestamo::query();

        $prestamos->when($this->categoria, function($query){
            $query->whereHas('libro.categoria', function ($q) {
                $q->where('id', $this->categoria);
            });
        });

        $plazos = [
            1 => [1, 2, 3],
            2 => [4, 5, 6],
            3 => [7, 8, 9],
            4 => [10, 11, 12],
        ];

        $prestamos->when($this->trimestre && isset($plazos[$this->trimestre]), function($query) use ($plazos) {
            $months = $plazos[$this->trimestre];
        
            $query->whereYear('created_at', '=', date('Y'))
                ->whereMonth('created_at', '>=', $months[0])
                ->whereMonth('created_at', '<=', $months[2]);
        });

        $prestamos->when($this->palabra, function($query){
            $query->whereHas('libro', function ($q) {
                $q->where('titulo', 'like', '%' . $this->palabra . '%');
            });
        });

        $prestamos = $prestamos->with('libro.categoria')
            ->select('libro_id', DB::raw('count(*) as total_prestamos'))
            ->groupBy('libro_id')
            ->get();

        return view('livewire.librarian.table-custom-loans', [
            'prestamos' => $prestamos,
        ]);
    }
}
