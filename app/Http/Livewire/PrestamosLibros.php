<?php

namespace App\Http\Livewire;

use Illuminate\Validation\ValidationException;
use Livewire\Component;

class PrestamosLibros extends Component
{
    public $id_student;
    public $libro_id;
    public $fecha_inicio;
    public $fecha_limite;
    public $user_id;
    public $cantidad;
    public $tipo_prestamo_id;

    protected $rules = [
        'fecha_inicio' => 'required|string',
        'fecha_limite' => 'required|string',
        'user_id' => 'required|exists:users,id',
        'cantidad' => 'required|integer|min:0',
    ];

    protected $listeners = ['dataStudent' => 'loadDataStudent', 'dataBook' => 'loadDataBook'];

    public function loadDataStudent($datos)
    {
        dd($datos);
        $this->id_student = $datos['id'];
    }

    public function loadDataBook($datos)
    {
        $this->libro_id = $datos['id'];
        $this->fecha_inicio = $datos['fecha_inicio'];
        $this->fecha_limite = $datos['fecha_limite'];
        $this->user_id = $datos['user_id'];
        $this->cantidad = $datos['cantidad'];
        dd($this->user_id);
        // $this->tipo_prestamo_id = $datos['tipo_prestamo_id'];
    }

    public function processLoan()
    {
        try {
            // Validar los datos según las reglas
            $datos = $this->validate();

            $datos['fecha_inicio'] = $this->fecha_inicio;
            $datos['fecha_limite'] = $this->fecha_limite;
            $datos['user_id'] = $this->user_id;
            $datos['cantidad'] = $this->cantidad;

            dd($datos);

        } catch (ValidationException $e) {
            $errors = $e->validator->getMessageBag()->all();
            // Puedes mostrar los errores al usuario aquí
            dd($errors);
        }

    }

    public function render()
    {
        return view('livewire.prestamos-libros');
    }
}
