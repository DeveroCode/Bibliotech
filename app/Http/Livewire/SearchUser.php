<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SearchUser extends Component
{
    public $no_institucional;
    public $found = null;
    public $listeners = ['status' => 'leerStatus'];

    public function leerStatus($found)
    {
        $this->found = $found;
    }

    public function leerDatosBuscar()
    {
        $this->emit('searchWord', $this->no_institucional);
    }
    public function render()
    {
        return view('livewire.search-components.search-user', [
            'found' => $this->found,
        ]);
    }
}
