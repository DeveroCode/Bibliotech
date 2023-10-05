<?php

namespace App\Http\Livewire;

use App\Models\Libro;
use Illuminate\Support\Carbon;
use Livewire\Component;

class ViewBookDetails extends Component
{

    public $libro_id;
    public $user_biblio;
    public $fecha_inicial;
    public $titulo;
    public $autores;
    public $identificacion;
    public $no_adquisicion;
    public $fecha_renovacion;
    public $cantidad;

    public $isbn;
    protected $listeners = ['leerDatos' => 'isb'];

    public function isb($isbn)
    {
        $this->isbn = $isbn;

        if (empty($this->isbn)) {
            $this->isbn = [];
            return;
        };

        $isbn = $this->isbn = Libro::where('isbn', 'LIKE', '%' . $this->isbn . '%')->get();
        $this->isbn = $isbn;

        //concatenating variables to the front-end
        $datos = $this->isbn;

        $this->libro_id = $datos[0]->id;
        $this->user_biblio = auth()->user()->name;
        // $this->folio =
        $this->fecha_inicial = Carbon::now()->format('Y-m-d');
        $this->titulo = $datos[0]->titulo;
        $this->autores = $datos[0]->autores[0]->autor;
        $this->identificacion = $datos[0]->isbn;
        $this->no_adquisicion = $datos[0]->no_adquisicion;
        // $this->fecha_renovacion = $datos[0]->fecha_renovacion;
        $this->cantidad = $datos[0]->cantidad;

        $this->emit('dataBook', [
            'id' => $this->libro_id,
            'user_biblio' => $this->user_biblio,
            'fecha_inicial' => $this->fecha_inicial,
            'titulo' => $this->titulo,
            'autores' => $this->autores,
            'identificacion' => $this->identificacion,
            'no_adquisicion' => $this->no_adquisicion,
            'fecha_renovacion' => $this->fecha_renovacion,
            'cantidad' => $this->cantidad,
        ]);
    }
    public function render()
    {
        return view('livewire.view-book-details', [
            'isbn' => $this->isbn,
        ]);
    }
}
