<?php

namespace App\Http\Livewire;

use App\Models\Headers;
use Livewire\Component;

class HeaderFooter extends Component
{
    public function render()
    {
        // Header
        $header = Headers::all();
        $encabezado = public_path('/storage/logos/' . $header[0]->header);
        $type = pathinfo($encabezado, PATHINFO_EXTENSION);
        $data = file_get_contents($encabezado);
        $base64Header = 'data:/image/' . $type . ';base64,' . base64_encode($data);

        // Footer
        $footer = Headers::all();
        $pie = public_path('/storage/logos/' . $footer[0]->footer);
        $type = pathinfo($pie, PATHINFO_EXTENSION);
        $data = file_get_contents($pie);
        $base64Footer = 'data:/image/' . $type . ';base64,' . base64_encode($data);

        return view('livewire.header-footer', [
            'base64Header' => $base64Header,
            'base64Footer' => $base64Footer,
        ]);
    }
}
