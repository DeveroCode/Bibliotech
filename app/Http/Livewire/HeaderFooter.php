<?php

namespace App\Http\Livewire;

use App\Models\Headers;
use Livewire\Component;

class HeaderFooter extends Component
{
    public function render()
    {
        // Obtener el primer registro de Headers
        $headerFooter = Headers::first();

        // Verificar si existe y contiene valores válidos
        if (!$headerFooter || !$headerFooter->header || !$headerFooter->footer) {
            $this->redirectToAdmin('El archivo del encabezado no existe.');
            return;
        }

        // Procesar el header
        $headerPath = public_path('storage/logos/' . $headerFooter->header);
        if (!file_exists($headerPath)) {
            $this->redirectToAdmin('El archivo del encabezado no existe.');
            return;
        }
        $headerType = pathinfo($headerPath, PATHINFO_EXTENSION);
        $headerData = file_get_contents($headerPath);
        $base64Header = 'data:image/' . $headerType . ';base64,' . base64_encode($headerData);

        // Procesar el footer
        $footerPath = public_path('storage/logos/' . $headerFooter->footer);
        if (!file_exists($footerPath)) {
            $this->redirectToAdmin('El archivo del encabezado no existe.');
            return;
        }
        $footerType = pathinfo($footerPath, PATHINFO_EXTENSION);
        $footerData = file_get_contents($footerPath);
        $base64Footer = 'data:image/' . $footerType . ';base64,' . base64_encode($footerData);

        // Retornar la vista con los datos procesados
        return view('livewire.header-footer', [
            'base64Header' => $base64Header,
            'base64Footer' => $base64Footer,
        ]);
    }

    public function redirectToAdmin($errorMessage = 'El encabezado o pie de página no están configurados.')
    {
        session()->flash('error', $errorMessage);
        return redirect()->route('dashboard.print');
    }
}
