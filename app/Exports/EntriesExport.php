<?php

namespace App\Exports;

use App\Models\EntriesUsers;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class EntriesExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */

    public $no_control;
    public $nombre;
    public $apellidos;
    public $sexo;
    public $materia;
    public $carrera;
    public $fecha;

    // filters
    public $actividad;
    public $genero;
    public $trimestre;
    public $start;
    public $end;

    public function __construct($actividad = null, $genero = null, $trimestre = null)
    {
        $this->actividad = $actividad;
        $this->genero = $genero;
        $this->trimestre = $trimestre;
    }
    public function view(): View
    {
        $entries = EntriesUsers::query();

        $plazos = [
            1 => [1, 2, 3],
            2 => [4, 5, 6],
            3 => [7, 8, 9],
            4 => [10, 11, 12],
        ];

        if ($this->trimestre && isset($plazos[$this->trimestre])) {
            $months = $plazos[$this->trimestre];
            $entries->whereYear('created_at', '=', date('Y'))
                    ->whereMonth('created_at', '>=', $months[0])
                    ->whereMonth('created_at', '<=', $months[2]);
        }

        if ($this->actividad) {
            $entries->where('actividad', $this->actividad);
        }

        if ($this->genero) {
            $entries->whereHas('alumno', function ($q) {
                $q->where('sexo', $this->genero);
            });
        }

        if ($this->start) {
            $entries->where('created_at', '>=', $this->start);
        }

        if ($this->end) {
            $entries->where('created_at', '<=', $this->end);
        }

        return view('administrator.exports.entradas', [
            'actividad' => $this->actividad,
            'genero' => $this->genero,
            'trimestre' => $this->trimestre,
            'entries' => $entries->get()
        ]);
    }
}
