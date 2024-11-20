<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Support\Facades\Auth;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = Auth::user();

        if ($user->rol == 1) {
            return view('administrator.index');
        } elseif ($user->rol == 2) {
            return redirect()->route('admin.index');
        }

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $editMode = false;
        return view('administrator.create', ['editMode' => $editMode]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function show()
    {
        //
        $libros = Libro::with('autores')->get();
        return view('administrator.show', ['libros' => $libros]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        //
        $editMode = true;
        return view('administrator.create', [
            'libro' => $libro,
            'editMode' => $editMode,
        ]);
    }
<<<<<<< HEAD

    public function pie()
    {
        return view('administrator.piepagina');
    }

    public function printPDF()
    {
        $libros = Libro::with('autores', 'usuario')->latest()->get();
        $headers = Headers::first();
        $count = $libros->count();
        $pdf = PDF::loadView('pdf.inventory_2', ['libros' => $libros, 'count' => $count, 'headers' => $headers])->setPaper('a4', 'portrait')
            ->set_option('isPhpEnabled', true);
        return $pdf->stream('inventory.pdf');
    }
=======
>>>>>>> features

    public function print()
    {
        return view('administrator.print');
    }
}
