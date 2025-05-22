<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Prestamo;

class FiltrarLoans extends Component
{
    public $folio;
    public $found;

    public function leerDatosFormulario()
    {

        if (empty($this->folio)) {
            $this->found = false;
            $this->emit('loansNotFound');
            return;
        }

        $loan = Prestamo::where('folio', 'LIKE', '%' . $this->folio . '%')
            ->orWhereHas('libros', function ($query) {
                $query->where('isbn', 'LIKE', '%' . $this->folio . '%')
                    ->orWhere('titulo', 'LIKE', '%' . $this->folio . '%');
            })->first();

        if ($loan) {
            $this->found = true;
            $this->emit('loansFound', $this->folio);
            $this->emit('leerDatos', $this->folio);
        } else {
            $this->found = false;
            $this->emit('loansNotFound');
        }
    }
    public function render()
    {
        return view('livewire.search-components.filtrar-loans', [
            'found' => $this->found
        ]);
    }
}
