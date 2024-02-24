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
    public $fecha_limite;
    public $cantidad;
    public $cantidad_libros;

    public $isbn;
    public $tipo_prestamo;
    public $type_loan_id;
    public $folio;
    protected $listeners = ['leerDatos' => 'isb', 'dataFolio' => 'mount_folio'];

    // calculate loan days
    public function calculateLoanDays($days)
    {
        $days = Carbon::parse($days)->addWeekdays(10);

        if ($days->isSunday()) {
            $days->addDays(1);
        }

        return $days->format('d-m-Y');
    }

    public function mount_folio($datos)
    {
        $this->folio = $datos['folio'];
    }

    // Set the datas for the view with the isbn
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
        $this->fecha_inicial = Carbon::now()->format('d-m-Y');
        $this->titulo = $datos[0]->titulo;
        $this->autores = $datos[0]->autores[0]->autor;
        $this->folio;
        $this->fecha_limite = $this->calculateLoanDays($this->fecha_inicial);
        $this->identificacion = $datos[0]->isbn;
        $this->cantidad = $datos[0]->cantidad;
        $this->emit('dataBook', [
            'id' => $this->libro_id,
            'fecha_inicio' => $this->fecha_inicial,
            'fecha_limite' => $this->fecha_limite,
            'folio' => $this->folio,
            'cantidad' => $this->cantidad,
        ]);
    }

    // Set the datas for the view with the type of loan
    public function type_loan($type_loan_id)
    {
        $this->tipo_prestamo = $type_loan_id;
        $this->emit('dataLoan', [
            'type_loan' => $this->tipo_prestamo,
        ]);
    }

    //  Set total number books
    public function total_books($cantidad_libros)
    {
        $this->cantidad = $cantidad_libros;

        $this->emit('total_books', [
            'cantidad_libros' => $this->cantidad,
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
