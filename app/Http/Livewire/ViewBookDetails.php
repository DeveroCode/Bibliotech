<?php
namespace App\Http\Livewire;

use App\Models\Libro;
use App\Models\Tipo_prestamo;
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
    public $tipo_prestamo;
    public $fecha_limite;
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
        $this->fecha_limite = $datos[0]->fecha_limite;
        $this->cantidad = $datos[0]->cantidad;

        $this->emit('dataBook', [
            'id' => $this->libro_id,
            'user_id' => $this->user_biblio,
            'fecha_inicio' => $this->fecha_inicial,
            'fecha_limite' => $this->fecha_limite,
            'cantidad' => $this->cantidad,
        ]);
    }
    public function render()
    {
        $tipo_prestamos = Tipo_prestamo::all();
        return view('livewire.view-book-details', [
            'tipo_prestamos' => $tipo_prestamos,
            'isbn' => $this->isbn,
        ]);
    }
}
