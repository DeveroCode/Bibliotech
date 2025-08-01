<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use App\Models\EntriesUsers;
use Livewire\Component;

class UserActivityRegistration extends Component
{
    public $data = [];
    public $listeners = ['dataUser'];
    public $actividad;
    public $sexo;
    public $materia;
    public $alumno_id;

    public $nombre;
    public $apellidos;
    public $no_control;
    public $carrera;


    protected $rules = [
        'alumno_id' => 'required',
        'actividad' => 'required',
        'sexo' => 'required',
        'materia' => 'required|max:100',
    ];

    public function dataUser($data_user)
    {
        $this->data = $data_user;
        $this->alumno_id = $data_user['id'] ?? '';
        $this->nombre = $data_user['nombre'] ?? '';
        $this->apellidos =  ($data_user['apellidoP'] ?? '') . ' ' . ($data_user['apellidoM'] ?? '');
        $this->no_control = $data_user['no_institucional'] ?? '';
        $this->carrera = $data_user['carrera'] ?? '';
        $this->sexo = $data_user['sexo'] ?? '';
    }

    public function createActivity()
    {
        $datos = $this->validate();
       
        EntriesUsers::create([
            'alumno_id' => $datos['alumno_id'],
            'sexo'=> $datos['sexo'],
            'materia'=> $datos['materia'],
            'actividad' =>  $datos['actividad'],
        ]);

        session()->flash('message', 'Actividad registrada con éxito ✅');

        $this->emit('resetForm');
        $this->reset();
    }

    public function render()
    {

        return view('livewire.librarian.forms.user-activity-registration', [
            'data' => $this->data
        ]);
    }
}
