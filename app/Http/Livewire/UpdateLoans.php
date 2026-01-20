<?php

namespace App\Http\Livewire;

use App\Models\Prestamo;
use App\Models\Tipo_prestamo;
use App\Models\UserActivity;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class UpdateLoans extends Component
{
    public $nombre;
    public $carrera;
    public $correo;
    public $tot_cant;

    public $prestamo_id;
    public $user_biblio;
    public $tipo_prestamo;
    public $folio;
    public $cantidad;

    protected $rules = [
        'nombre' => 'required',
        'carrera' => 'required',
        'correo' => 'required',
        'user_biblio' => 'required',
        'tipo_prestamo' => 'required',
        'folio' => 'required',
        'cantidad' => 'required',
    ];

    public function mount(Prestamo $prestamo)
    {
        // Loand table data
        $this->prestamo_id = $prestamo->id;
        $this->user_biblio = $prestamo->user()->first()->name;
        $this->tipo_prestamo = $prestamo->tipo_prestamo_id;
        $this->folio = $prestamo->folio;
        $this->tot_cant = $prestamo->libros()->first()->cantidad;
        $this->cantidad = $prestamo->cantidad;
        // Alumno table data
        $this->carrera = $prestamo->alumnos()->first()->carrera;
        $this->nombre = $prestamo->alumnos()->first()->nombre;
        $this->correo = $prestamo->alumnos()->first()->email;
    }

    public function editarPrestamo()
    {
        $datos = $this->validate();

        DB::beginTransaction();

        try {

            $prestamo = Prestamo::findOrFail($this->prestamo_id);
            $prestamo->user()->update([
                'name' => $datos['user_biblio']
            ]);

            $prestamo->cantidad = $datos['cantidad'];
            $prestamo->tipo_prestamo_id = $datos['tipo_prestamo'];
            $prestamo->folio = $datos['folio'];

            $prestamo->alumnos()->update([
                'carrera' => $datos['carrera'],
                'nombre' => $datos['nombre'],
                'email' => $datos['correo'],
            ]);

            if ($datos['tipo_prestamo'] == 3) {

                $libro = $prestamo->libros()->first();

                if (!$libro) {
                    DB::rollBack();
                    session()->flash('message', 'No se encontró el libro asociado al préstamo');
                    return;
                }

                // Regresar stock
                $libro->cantidad += $datos['cantidad'];
                $libro->save();
            }

            $prestamo->save();

            // Log de actividad
            UserActivity::create([
                'user_id' => auth()->id(),
                'activity' => 'Actualización de préstamo',
                'description' =>
                'Se actualizó el préstamo de ' .
                    $prestamo->alumnos()->first()->nombre . ' ' .
                    $prestamo->alumnos()->first()->apellidoP . ' ' .
                    $prestamo->alumnos()->first()->apellidoM .
                    ' por ' . auth()->user()->name . ' ' . auth()->user()->last_name,
            ]);

            DB::commit();

            session()->flash('message', 'Préstamo actualizado correctamente');
            return redirect()->route('loans.index');
        } catch (\Exception $e) {
            DB::rollBack();
            dd($e->getMessage());
        }
    }

    public function render()
    {
        $tipos_prestamos = Tipo_prestamo::all();
        return view('livewire.librarian.update-loans', [
            'tipos_prestamos' => $tipos_prestamos,
        ]);
    }
}
