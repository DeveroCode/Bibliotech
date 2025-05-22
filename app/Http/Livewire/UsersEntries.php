<?php

namespace App\Http\Livewire;

use App\Models\Alumno;
use Livewire\Component;

class UsersEntries extends Component
{

    public $user_control;
    protected $listeners = ['resetForm'];

    public function shearchUser()
    {
        $data_user = Alumno::where('no_institucional', $this->user_control)->first();
        $this->emit('dataUser', $data_user ? $data_user->toArray() : []);
    }

    public function resetForm()
    {
        $this->reset();
    }

    public function render()
    {
        return view('livewire.public-views.users-entries');
    }
}
