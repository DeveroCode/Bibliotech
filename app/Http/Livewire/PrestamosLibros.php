<?php

namespace App\Http\Livewire;

use App\Mail\NotificarPrestamo;
use App\Models\Alumno;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\UserActivity;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
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
    public $found = null;
    public $loan = null;

    public $nombre_alumno;

    protected $rules = [
        'fecha_inicio' => 'required|string',
        'fecha_limite' => 'required|string',
        'user_id' => 'required|int',
        'cantidad' => 'required|int',
        'folio' => 'required|string',
    ];

    protected $listeners = ['dataStudent' => 'loadDataStudent', 'dataBook' => 'loadDataBook', 'dataLoan' => 'mountTypeLoan', 'total_books' => 'mount_total_books', 'status' => 'leerStatus', 'loan' => 'loanStatus'];

    public function loadDataStudent($datos)
    {
        $this->id_student = $datos['id'];
        $this->nombre_alumno = $datos['nombre'];
    }

    public function leerStatus($found)
    {
        $this->found = $found;
        if (!$this->found) {
            $this->dispatchBrowserEvent('alumnoNoEncontrado');
        }
    }
    public function loanStatus($loan)
    {
        $this->loan = $loan;
        if (!$this->loan) {
            $this->dispatchBrowserEvent('isbnNoEncontrado');
        }
    }

    public function mountTypeLoan($datos)
    {
        $this->tipo_prestamo_id = $datos['type_loan'];
    }

    public function mount_total_books($datos)
    {
        $this->cantidad = $datos['cantidad_libros']; // Cantidad insertada desde el input - front - ni idea para que sirve, pero no lo borren
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
        $datos = $this->validate();

        DB::beginTransaction();

        try {

            $libro = Libro::lockForUpdate()->find($this->libro_id);

            // Validar stock
            if (!$libro || $this->cantidad > $libro->cantidad) {
                DB::rollBack();
                $this->dispatchBrowserEvent('stockInsuficiente');
                return;
            }

            // Fechas
            $fechaInicio = Carbon::parse($this->fecha_inicio)->format('Y-m-d');
            $fechaLimite = Carbon::parse($this->fecha_limite)->format('Y-m-d');

            // Crear préstamo
            $prestamo = Prestamo::create([
                'fecha_inicio' => $fechaInicio,
                'fecha_limite' => $fechaLimite,
                'user_id' => auth()->id(),
                'cantidad' => $this->cantidad,
                'folio' => $this->folio,
                'tipo_prestamo_id' => $this->tipo_prestamo_id,
            ]);

            // Pivot
            DB::table('libro_prestamo')->insert([
                'alumno_id' => $this->id_student,
                'libro_id' => $this->libro_id,
                'prestamo_id' => $prestamo->id,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            // Restar stock
            $libro->cantidad -= $this->cantidad;
            $libro->save();

            // Email
            $alumno = Alumno::find($this->id_student);
            Mail::to($alumno->email)
                ->send(new NotificarPrestamo($alumno, $prestamo, $libro));
            // Activity log
            UserActivity::create([
                'user_id' => auth()->id(),
                'activity' => 'Préstamo realizado',
                'description' => 'Se prestó el libro ' . $libro->titulo . ' a ' .
                    $alumno->nombre . ' ' . $alumno->apellidoP,
            ]);

            DB::commit();

            session()->flash('message', 'Préstamo realizado exitosamente.');
            return redirect()->route('dashboard');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }


    public function render()
    {
        return view('livewire.librarian.prestamos-libros', [
            'found' => $this->found,
            'loan' => $this->loan,
        ]);
    }
}
