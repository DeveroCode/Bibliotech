<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Livewire\Component;

class FiltrarIsbn extends Component
{
    public $isbn;
    public $found;
    public $message;
    public $labelText;
    public $placeholderText;

    public $listeners = ['status' => 'leerStatus'];

    public function leerStatus($found)
    {
        $this->found = $found;
    }
    public function leerDatosFormulario()
    {
        $this->emit('leerDatos', $this->isbn);
    }
    public function mount()
    {
        if (request()->routeIs('loans.index')) {
            $this->labelText = 'Búsqueda de préstamos';
            if (!$this->found) {
                $this->message = "El folio que ha ingresado venció o no existe un préstamo asociado a este folio";
            }
            $this->placeholderText = 'Buscar por Folio: ej. 19CAR4143';
        } else if (request()->routeIs('loans.create')) {
            $this->labelText = 'Búsqueda de libros';
            $this->placeholderText = 'Buscar por ISBN: ej. ISBN-13:978-6073235853';
            if (!$this->found) {
                $this->message = "El ISBN que ha ingresado no existe o no ha sido registrado";
            }
        } else {
            $this->labelText = 'Búsqueda de libros';
            $this->message = "El ISBN que ingreso no está registrado o el nombre ingresado aún no ha sido registro";
            $this->placeholderText = 'Buscar por ISBN: ej. ISBN-13:978-6073235853';
        }
    }

    public function render()
    {
        // Model Book
        $libros = Libro::all();
        return view('livewire.search-components.filtrar-isbn', [
            'libros' => $libros,
            'found' => $this->found,
        ]);
    }
}
