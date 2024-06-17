<?php

namespace App\Http\Controllers;

use App\Models\Headers;
use App\Models\Libro;
use App\Models\Prestamo;
use Barryvdh\DomPDF\Facade\Pdf;

class InventoryController extends Controller
{
    // Set the footer to print
    public function update()
    {
        return view('administrator.piepagina');
    }

    public function printInventory()
    {
        $libros = Libro::with('autores', 'usuario')->latest()->get();
        $headers = Headers::first();
        $count = $libros->count();
        $pdf = PDF::loadView('pdf.inventory_2', ['libros' => $libros, 'count' => $count, 'headers' => $headers])->setPaper('a4', 'portrait')
            ->set_option('isPhpEnabled', true);
        return $pdf->stream('reporte_de_inventario.pdf');
    }

    public function printLoans()
    {
        $loans = Prestamo::with('user', 'alumnos', 'libros', 'tipo_prestamo')->latest()->get();

        // Encabezados
        $headers = Headers::first();
        $count = $loans->count();

        $pdf = PDF::loadView('pdf.loans', ['loans' => $loans, 'count' => $count, 'headers' => $headers])->setPaper('a4', 'portrait')
            ->set_option('isPhpEnabled', true);

        return $pdf->stream('reporte_de_prestamos.pdf');
    }

}
