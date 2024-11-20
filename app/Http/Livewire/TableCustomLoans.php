<?php

namespace App\Http\Livewire;

use App\Models\LibroPrestamo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableCustomLoans extends Component
{
    public $categoria;
    public $trimestre;

    public $listeners = ['searchLoan' => 'search'];

    public function search($categoria, $trimestre)
    {
        $this->categoria = $categoria;
        $this->trimestre = $trimestre;
    }

    public function render()
    {

        $prestamos = LibroPrestamo::query();

        if ($this->categoria) {
            $prestamos->whereHas('libro.categoria', function ($query) {
                $query->where('id', $this->categoria);
            });
        }

        if ($this->trimestre) {
            $plazos = [
                1 => [1, 2, 3],
                2 => [4, 5, 6],
                3 => [7, 8, 9],
                4 => [10, 11, 12],
            ];

            $months = $plazos[$this->trimestre];

            $prestamos->whereYear('created_at', '=', date('Y'))
                ->whereMonth('created_at', '>=', $months[0])
                ->whereMonth('created_at', '<=', $months[2]);
        }

        $prestamos = $prestamos->with('libro.categoria')
            ->select('libro_id', DB::raw('count(*) as total_prestamos'))
            ->groupBy('libro_id')
            ->get();

        return view('livewire.librarian.table-custom-loans', [
            'prestamos' => $prestamos,
        ]);
    }
}
