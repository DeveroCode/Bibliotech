<?php

namespace App\Http\Livewire;

use App\Exports\LoansExport;
use App\Models\LibroPrestamo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class TableCustomLoans extends Component
{
    public $categoria;
    public $trimestre;
    public $palabra;
    public $listeners = ['searchLoan' => 'search'];

    // Set the colors
    public $categoryColors = [
        1 => 'bg-sea-100 text-blue-600',
        2 => 'bg-indigo-100 text-blue-600',
        3 => 'bg-blue-100 text-blue-600',
        4 => 'bg-amber-100 text-blue-600',
        5 => 'bg-red-100 text-blue-600',
        6 => 'bg-emerald-100 text-blue-600',
        7 => 'bg-orange-100 text-blue-500',
    ];

    public function search($categoria, $trimestre, $palabra)
    {
        $this->categoria = $categoria;
        $this->trimestre = $trimestre;
        $this->palabra = $palabra;
    }

    public function export()
    {
        return Excel::download(new LoansExport($this->categoria, $this->trimestre, $this->palabra), 'prestamos.xlsx');
    }

    public function openModal()
    {
        $prestamos = LibroPrestamo::query();

        $prestamos->when($this->categoria, function ($query) {
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

        $prestamos->when($this->trimestre && isset($plazos[$this->trimestre]), function ($query) use ($plazos) {
            $months = $plazos[$this->trimestre];

            $query->whereYear('created_at', '=', date('Y'))
                ->whereMonth('created_at', '>=', $months[0])
                ->whereMonth('created_at', '<=', $months[2]);
        });

        $prestamos->when($this->palabra, function ($query) {
            $query->whereHas('libro', function ($q) {
                $q->where('titulo', 'like', '%' . $this->palabra . '%');
            });
        });

        $prestamos = $prestamos->with('libro')
            ->select('libro_id', DB::raw('count(*) as total_prestamos'))
            ->groupBy('libro_id')
            ->orderByDesc('total_prestamos')
            ->limit(10)
            ->get()
            ->map(function ($p) {
                return [
                    'titulo' => $p->libro->titulo,
                    'cantidad' => $p->total_prestamos,
                ];
            });

        $this->emit('openModal', $prestamos);
    }


    public function render()
    {

        $prestamos = LibroPrestamo::query();

        $prestamos->when($this->categoria, function ($query) {
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

        $prestamos->when($this->trimestre && isset($plazos[$this->trimestre]), function ($query) use ($plazos) {
            $months = $plazos[$this->trimestre];

            $query->whereYear('created_at', '=', date('Y'))
                ->whereMonth('created_at', '>=', $months[0])
                ->whereMonth('created_at', '<=', $months[2]);
        });

        $prestamos->when($this->palabra, function ($query) {
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
            'categoryColors' => $this->categoryColors
        ]);
    }
}
