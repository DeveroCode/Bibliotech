<?php

namespace App\Http\Livewire;

use App\Models\Prestamo;
use Carbon\Carbon;
use Livewire\Component;

class LoanMonitoring extends Component
{
    public $folio;
    protected $listeners = ['readFolio' => 'insert'];

    public function insert($folio)
    {
        $this->folio = $folio;
    }

    public function render()
    {
        $prestamos = Prestamo::where('folio', $this->folio)->with('libros', 'alumnos')->first();
        $estado = null;

        if ($prestamos) {
            $dateStart = Carbon::parse($prestamos->fecha_inicio);
            $dateEnd = Carbon::parse($prestamos->fecha_limite);
            $now = Carbon::now();

            $middleDate = $dateStart->copy()->addDays($dateStart->diffInDays($dateEnd) / 2);

            if ($now->lt($middleDate)) {
                $estado = 'entregado';
            } else if ($now->lt($dateEnd)) {
                $estado = 'pendiente de entrega';
            } else {
                $estado = 'vencido';
            }
        }

        return view('livewire.public-views.loan-monitoring', [
            'prestamos' => $prestamos,
            'estado' => $estado,
        ]);
    }
}
