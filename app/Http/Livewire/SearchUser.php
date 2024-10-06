<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use Livewire\Component;

class SearchUser extends Component
{
    public $no_institucional;

    public function leerDatosBuscar()
    {
        $this->emit('searchWord', $this->no_institucional);
    }

    public function render()
    {
        $alumno = Alumno::all();
        return view('livewire.search-components.search-user', [
            'alumno' => $alumno,
        ]);
    }
}
