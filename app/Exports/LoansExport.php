<?php

namespace App\Exports;

use App\Models\LibroPrestamo;
use Illuminate\Support\Facades\DB;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LoansExport implements FromView
{
    protected $categoria;
    protected $trimestre;
    protected $palabra;

    public function __construct($categoria = null, $trimestre = null, $palabra = null)
    {
        $this->categoria = $categoria;
        $this->trimestre = $trimestre;
        $this->palabra = $palabra;
    }
    

    public function view(): View
    {
        $prestamos = LibroPrestamo::query();

        if ($this->categoria) {
            $prestamos->whereHas('libro.categoria', function ($q) {
                $q->where('id', $this->categoria);
            });
        }

        $plazos = [
            1 => [1, 2, 3],
            2 => [4, 5, 6],
            3 => [7, 8, 9],
            4 => [10, 11, 12],
        ];

        if ($this->trimestre && isset($plazos[$this->trimestre])) {
            $months = $plazos[$this->trimestre];
            $prestamos->whereYear('created_at', date('Y'))
                ->whereMonth('created_at', '>=', $months[0])
                ->whereMonth('created_at', '<=', $months[2]);
        }

        if ($this->palabra) {
            $prestamos->whereHas('libro', function ($q) {
                $q->where('titulo', 'like', '%' . $this->palabra . '%');
            });
        }

        $prestamos = $prestamos->with('libro.categoria')
            ->select('libro_id', DB::raw('count(*) as total_prestamos'))
            ->groupBy('libro_id')
            ->get();

        return view('administrator.exports.prestamos', [
            'prestamos' => $prestamos,
            'categoria' => $this->categoria,
            'trimestre' => $this->trimestre,
            'palabra' => $this->palabra,
        ]);
    }
}
