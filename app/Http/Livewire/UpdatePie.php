<?php

namespace App\Http\Livewire;

use App\Models\Headers;
use Livewire\Component;
use Livewire\WithFileUploads;

class UpdatePie extends Component
{

    public $header;
    public $footer;

    use WithFileUploads;

    protected $rules = [
        'header' => 'required|image|max:1024',
        'footer' => 'required|image|max:1024',
    ];

    public function updatePie()
    {
        $datos = $this->validate();
        // Guardar imagen
        $header = $this->header->store('public/logos');
        $datos['header'] = str_replace('public/logos/', '', $header);
        // Save footer
        $footer = $this->footer->store('public/logos');
        $datos['footer'] = str_replace('public/logos/', '', $footer);

        $updateImages = Headers::find(1);
        if ($updateImages) {
            $updateImages->update([
                'header' => $datos['header'],
                'footer' => $datos['footer'],
            ]);

            session()->flash('message', 'Encabezado actualizado');
            return redirect()->route('dashboard.print');
        } else {
            Headers::create([
                'header' => $datos['header'],
                'footer' => $datos['footer'],
            ]);

            session()->flash('message', 'Encabezado colocado correctamente');
            return redirect()->route('dashboard.print');
        }
    }

    public function render()
    {
        return view('livewire.update-pie');
    }
}
