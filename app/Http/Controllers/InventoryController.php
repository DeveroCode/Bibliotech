<?php

namespace App\Http\Controllers;

use App\Models\Headers;
use App\Models\Libro;
use App\Models\Prestamo;
use App\Models\UserActivity;
use Barryvdh\DomPDF\Facade\Pdf;
use ZipArchive;

class InventoryController extends Controller
{
    // Set the footer to print
    public function update()
    {
        return view('administrator.piepagina');
    }

    // public function printInventory($page = 1)
    // {

    //     $perPage = 2000;
    //     $libros = Libro::with('autores', 'usuario')->latest()->paginate($perPage, ['*'], 'page', $page);
    //     $headers = Headers::first();
    //     $count = $libros->total(); // Usar total() para obtener el número total de registros

    //     $pdf = PDF::loadView('pdf.inventory_2', ['libros' => $libros, 'count' => $count, 'headers' => $headers])
    //         ->setPaper('a4', 'portrait')
    //         ->set_option('isHtml5ParserEnabled', true)
    //         ->set_option('isRemoteEnabled', true)
    //         ->set_option('isPhpEnabled', true);

    //     return $pdf->stream("reporte_de_inventario_pagina_{$page}.pdf");
    // }

    public function printInventory()
    {
        // Aumenta el tiempo de ejecución permitido
        set_time_limit(300); // 5 minutos

        $perPage = 50; // Menos libros por PDF para aligerar el proceso
        $totalLibros = Libro::count();
        $totalPages = ceil($totalLibros / $perPage);

        // Cargar headers una sola vez fuera del loop (sigue disponibles dentro)
        $headers = Headers::first();

        if ($totalLibros === 0) {
            return redirect()->route('dashboard.print')->with('error', 'Sin existencia de libros en la base de datos.');
        }

        if (!$headers || !$headers->header || !$headers->footer) {
            return redirect()->route('dashboard.print')->with('error', 'Encabezados incompletos o faltantes.');
        }

        $pdfPath = sys_get_temp_dir() . '/pdfs/';
        if (!file_exists($pdfPath)) {
            mkdir($pdfPath, 0777, true);
        }

        $zip = new ZipArchive();
        $zipName = 'reportes_inventario.zip';
        $zipPath = sys_get_temp_dir() . '/' . $zipName;

        if ($zip->open($zipPath, ZipArchive::CREATE) !== true) {
            exit("No se pudo abrir el archivo ZIP");
        }

        for ($page = 1; $page <= $totalPages; $page++) {
            $libros = Libro::with('autores', 'usuario')
                ->latest()
                ->skip(($page - 1) * $perPage)
                ->take($perPage)
                ->get();

            // Crear PDF con membrete (headers) en cada vista
            $pdf = PDF::loadView('pdf.inventory_2', [
                'libros' => $libros,
                'count' => $totalLibros,
                'headers' => $headers
            ])
                ->setPaper('a4', 'portrait')
                ->set_option('isHtml5ParserEnabled', true)
                ->set_option('isRemoteEnabled', true)
                ->set_option('isPhpEnabled', true);

            $pdfFileName = "reporte_de_inventario_pagina_{$page}.pdf";
            $pdfFilePath = $pdfPath . $pdfFileName;

            $pdf->save($pdfFilePath);
            $zip->addFile($pdfFilePath, $pdfFileName);
        }

        $zip->close();

        // Limpiar archivos PDF temporales
        foreach (glob($pdfPath . '*.pdf') as $file) {
            unlink($file);
        }

        // Guardar actividad del usuario
        UserActivity::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Actualización de inventario',
            'description' => 'Exportación de inventario realizada por ' . auth()->user()->name . ' ' . auth()->user()->last_name,
        ]);

        return response()->download($zipPath)->deleteFileAfterSend(true);
    }


    public function printLoans()
    {
        $headers = Headers::first();
        $loans = Prestamo::all();

        if (!$loans) {
            return redirect()->route('dashboard.print')->with('error', 'No se encontró ningún préstamo, favor de realizar mínimo un préstamo.');
        }

        if (!$headers || !$headers->header || !$headers->footer) {
            return redirect()->route('dashboard.print')->with('error', 'No los encabezados. Por favor, actualice los datos de encabezados en "pie de página".');
        }
        $loans = Prestamo::with('user', 'alumnos', 'libros', 'tipo_prestamo')->latest()->get();

        // Encabezados
        $headers = Headers::first();
        $count = $loans->count();

        $pdf = PDF::loadView('pdf.loans', ['loans' => $loans, 'count' => $count, 'headers' => $headers])->setPaper('a4', 'portrait')
            ->set_option('isPhpEnabled', true);

        UserActivity::create([
            'user_id' => auth()->user()->id,
            'activity' => 'Actualización de prestamos',
            'description' => 'Exportación de prestamos realizada' . ' por ' . auth()->user()->name . ' ' . auth()->user()->last_name,
        ]);
        return $pdf->stream('reporte_de_prestamos.pdf');
    }
}
