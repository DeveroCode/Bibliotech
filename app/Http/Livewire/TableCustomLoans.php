<?php

namespace App\Http\Livewire;

use App\Models\LibroPrestamo;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class TableCustomLoans extends Component
{
    public $categoria;

    public $listeners = ['searchLoan' => 'search'];

    public function search($categoria)
    {
        $this->categoria = $categoria;

    }

    public function render()
    {

        // $prestamos = LibroPrestamo::whereHas('libro.categoria', function ($query) {
        //     $query->where('id', $this->categoria);
        // })->get();

        // $prestamos = LibroPrestamo::whereHas('libro.categoria', function ($query) {
        //     $query->where('id', $this->categoria);
        // })
        //     ->with('libro', 'prestamo') // Cargar las relaciones 'libro' y 'prestamo' aquí
        //     ->select('libro_id', DB::raw('count(*) as total_prestamos'))
        //     ->groupBy('libro_id')
        //     ->get();

        $prestamos = LibroPrestamo::whereHas('libro.categoria', function ($query) {
            $query->where('id', $this->categoria);
        })
            ->with('libro')
            ->select('libro_id', DB::raw('count(*) as total_prestamos'))
            ->groupBy('libro_id')
            ->get();

        if (!$prestamos->isEmpty()) {
            dd('Buscando libro con la categoria ' . $this->categoria);

        }

        return view('livewire.table-custom-loans', [
            'prestamos' => $prestamos,
        ]);
    }
}