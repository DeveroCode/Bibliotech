<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Prestamo::with('libros')->get();
        return view('administrator.view-loans',
            [
                'loans' => $loans,
            ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('administrator.lending');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $loans = Prestamo::with('libros', 'alumnos', 'autores')->get();
        return view('administrator.show-loans',
            [
                'loans' => $loans,
            ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Prestamo $prestamo)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
