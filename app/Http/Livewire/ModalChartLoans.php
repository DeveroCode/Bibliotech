<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ModalChartLoans extends Component
{
    public $show = false;
    public $datos = [];

    protected $listeners = ['openModal'];

    public function openModal($datos)
    {
        $this->show = true;
        $this->datos = $datos;

        $this->dispatchBrowserEvent('render-chart', ['datos' => $this->datos]);
    }

    public function close()
    {
        $this->show = false;
    }

    public function render()
    {
        return view('livewire.modals.modal-chart-loans');
    }
}
