<?php

namespace App\Http\Livewire;

use App\Models\EntriesUsers;
use Livewire\Component;
use Livewire\WithPagination;

class TableEntriesUsers extends Component
{   
    public $actividad;
    public $genero;
    public $trimestre;
    public $start;
    public $end;

    public $listeners = ['filters' => 'search'];

    public function search($actividad, $genero, $trimestre, $start, $end)
    {
        $this->actividad = $actividad;
        $this->genero = $genero;
        $this->trimestre = $trimestre;
        $this->start = $start;
        $this->end = $end;
    }

    public function render()
    {
        $entries = EntriesUsers::query();

        $plazos = [
            1 => [1, 2, 3],
            2 => [4, 5, 6],
            3 => [7, 8, 9],
            4 => [10, 11, 12],
        ];

        $entries->when($this->trimestre && isset($plazos[$this->trimestre]), function ($query) use ($plazos) {
            $months = $plazos[$this->trimestre];

            $query->whereYear('created_at', '=', date('Y'))
            ->whereMonth('created_at', '>=', $months[0])
            ->whereMonth('created_at', '<=', $months[2]);
        });

        $entries->when($this->actividad, function ($query) {
            $query->where('actividad', $this->actividad);
        });

        $entries->when($this->genero, function ($query) {
            $query->whereHas('alumno', function($q){
                $q->where('sexo', $this->genero);
            });
        });

        $entries->when($this->start, function ($query) {
            $query->where('created_at', '>=', $this->start);
        });
        $entries->when($this->end, function ($query) {
            $query->where('created_at', '>=', $this->end);
        });

        $entries = $entries->with('alumno')->paginate(20);
        return view('livewire.table-entries-users', [
            'entries' => $entries
        ]);
    }
}
