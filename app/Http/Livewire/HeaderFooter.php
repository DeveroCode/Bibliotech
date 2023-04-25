<?php

namespace App\Http\Livewire;

use App\Models\Headers;
use Livewire\Component;

class HeaderFooter extends Component
{
    public function render()
    {
        $header = Headers::all();
        $logo = public_path('/storage/logos/' . $header[0]->imagen);
        $type = pathinfo($logo, PATHINFO_EXTENSION);
        $data = file_get_contents($logo);
        $base64 = 'data:/image/' . $type . ';base64,' . base64_encode($data);

        return view('livewire.header-footer', [
            'base64' => $base64,
        ]);
    }
}