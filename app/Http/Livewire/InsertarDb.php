<?php

namespace App\Http\Livewire;

use App\Exports\AlumnosExport;
use App\Imports\AlumnosImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class InsertarDb extends Component
{
    use WithFileUploads;

    public $archivo;

    protected $rules = [
        'archivo' => 'required|file|max:2048|mimes:xlsx,xls',
    ];

    public function crearAlumnos()
    {
        if ($this->validate()) {

            Excel::import(new AlumnosImport, $this->archivo);

            session()->flash('message', 'Alumnos creados con éxito');

            return redirect()->route('admin.index');
        } else {
            session()->flash('message', 'Algo salio mal');
            return back();
        }
    }

    public function export()
    {
        return Excel::download(new AlumnosExport, 'alumnos.xlsx');
    }

    public function render()
    {
        return view('livewire.admin.insertar-db');
    }

}
