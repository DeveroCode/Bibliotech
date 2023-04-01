<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use App\Models\Autor_libro;
use App\Models\Libro;
use Illuminate\Http\Request;

class LibroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $libros_en_existencia = Libro::where('cantidad', '>', 0)->count();
        return view('administrator.index', [
            'libros_en_existencia' => $libros_en_existencia
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrator.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    public function showLibros()
    {
        $libros = Libro::with('autores')->get();
        return view('administrator.show',  ['libros' => $libros]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Libro $libro)
    {
        //
        return view('administrator.edit', [
            'libro' => $libro
        ]);
    }

    public function print()
    {
        return view('administrator.print');
    }
}
