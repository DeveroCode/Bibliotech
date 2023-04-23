<?php

namespace App\Http\Livewire;

use App\Models\Headers;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePie extends Component
{

    public $imagen;

    use WithFileUploads;

    protected $rules = [
        'imagen' => 'required|image|max:1024',
    ];

    public function updatePie()
    {
        $datos = $this->validate();
        // Guardar imagen
        $imagen = $this->imagen->store('public/logos');
        $datos['imagen'] = str_replace('public/logos/', '', $imagen);

        Headers::create([
            'imagen' => $datos['imagen'],
        ]);

        session()->flash('message', 'Libro creado con éxito');
        return redirect()->route('dashboard.print');
    }

    public function render()
    {
        return view('livewire.update-pie');
    }
}
