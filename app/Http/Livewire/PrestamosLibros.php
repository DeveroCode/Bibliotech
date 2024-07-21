<?php

namespace App\Http\Livewire;

use App\Models\Prestamo;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class PrestamosLibros extends Component
{
    public $id_student;
    public $libro_id;
    public $fecha_inicio;
    public $fecha_limite;
    public $user_id;
    public $cantidad;
    public $cantidad_prestamo;
    public $folio;
    public $tipo_prestamo_id;

    protected $rules = [
        'fecha_inicio' => 'required|string',
        'fecha_limite' => 'required|string',
        'user_id' => 'required|int',
        'cantidad' => 'required|int',
        'folio' => 'required|string',
    ];

    protected $listeners = ['dataStudent' => 'loadDataStudent', 'dataBook' => 'loadDataBook', 'dataLoan' => 'mountTypeLoan', 'total_books' => 'mount_total_books'];

    public function loadDataStudent($datos)
    {
        $this->id_student = $datos['id'];
    }

    public function mountTypeLoan($datos)
    {
        $this->tipo_prestamo_id = $datos['type_loan'];
    }

    public function mount_total_books($datos)
    {
        $this->cantidad = $datos['cantidad_libros'];
    }

    public function loadDataBook($datos)
    {
        $this->libro_id = $datos['id'];
        $this->fecha_inicio = date('Y-m-d', strtotime($datos['fecha_inicio']));
        $this->fecha_limite = date('Y-m-d', strtotime($datos['fecha_limite']));
        $this->folio = $datos['folio'];
        $this->user_id = auth()->user()->id;
        $this->cantidad_prestamo = $datos['cantidad'];
    }

    public function processLoan()
    {

        // Validar los datos según las reglas
        $datos = $this->validate();

        $datos['fecha_inicio'] = $this->fecha_inicio;
        $datos['fecha_limite'] = $this->fecha_limite;
        $datos['user_id'] = $this->user_id;
        $datos['cantidad'] = $this->cantidad;
        $datos['folio'] = $this->folio;
        $datos['tipo_prestamo_id'] = $this->tipo_prestamo_id;

        // verifica que la cantidad es mayor a cantidad_restamo y si es verdadero, no crees el prestamo
        if ($datos['cantidad'] > $this->cantidad_prestamo) {
            dd('No se puede realizar el prestamo');
        }

        $prestamo = Prestamo::create([
            'fecha_inicio' => $datos['fecha_inicio'],
            'fecha_limite' => $datos['fecha_limite'],
            'user_id' => $datos['user_id'],
            'cantidad' => $datos['cantidad'],
            'folio' => $datos['folio'],
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'tipo_prestamo_id' => $datos['tipo_prestamo_id'],
        ]);

        DB::table('libro_prestamo')->insert([
            'alumno_id' => $this->id_student,
            'libro_id' => $this->libro_id,
            'prestamo_id' => $prestamo->id,
            'created_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            'updated_at'=> Carbon::now()->format('Y-m-d H:i:s'),
            
        ]);

        session()->flash('message', 'Prestamo realizado exitosamente.');
        return redirect()->route('dashboard');
    }

    public function render()
    {
        return view('livewire.prestamos-libros');
    }
}
