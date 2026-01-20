<?php
namespace App\Http\Livewire;

use App\Models\Headers;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;

class HeaderFooter extends Component
{
    public $base64Header;
    public $base64Footer;
    public $redirectToDashboard = false;

    public function mount()
    {
        $headerFooter = Headers::first();

        // if (!$headerFooter || !$headerFooter->header || !$headerFooter->footer) {
        //     session()->flash('error', 'El encabezado o pie de página no están configurados.');
        //     $this->redirectToDashboard = true;
        //     return;
        // }

        $headerPath = public_path('storage/logos/' . $headerFooter->header);
        if (!Storage::exists($headerPath)) {
            session()->flash('error', 'El archivo del encabezado no existe.');
            return redirect()->route('dashboard.print')->with('error', 'No se encontraron encabezados o pie de país. Por favor, actualice los datos de encabezados.');
        }
        // if (!file_exists($headerPath)) {
        //     session()->flash('error', 'El archivo del encabezado no existe.');
        //     $this->redirectToDashboard = true;
        //     return;
        // }

        $footerPath = public_path('storage/logos/' . $headerFooter->footer);
        if (!Storage::exists($footerPath)) {
            session()->flash('error', 'El archivo del encabezado no existe.');
            return redirect()->route('dashboard.print')->with('error', 'No se encontraron encabezados o pie de país. Por favor, actualice los datos de encabezados.');
        }
        // if (!file_exists($footerPath)) {
        //     session()->flash('error', 'El archivo del pie de página no existe.');
        //     $this->redirectToDashboard = true;
        //     return;
        // }

        $headerType = pathinfo($headerPath, PATHINFO_EXTENSION);
        $headerData = file_get_contents($headerPath);
        $this->base64Header = 'data:image/' . $headerType . ';base64,' . base64_encode($headerData);

        $footerType = pathinfo($footerPath, PATHINFO_EXTENSION);
        $footerData = file_get_contents($footerPath);
        $this->base64Footer = 'data:image/' . $footerType . ';base64,' . base64_encode($footerData);
    }

    public function render()
    {
        if ($this->redirectToDashboard) {
            return redirect()->route('dashboard.print');
        }

        return view('livewire.header-footer', [
            'base64Header' => $this->base64Header,
            'base64Footer' => $this->base64Footer,
        ]);
    }
}
