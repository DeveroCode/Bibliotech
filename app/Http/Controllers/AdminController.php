<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('admin.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    // Actualizar la base de datos de los alumnos
    public function create()
    {
        $editMode = false;
        return view('admin.create', [
            'editMode' => $editMode,
        ]);
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
        return view('admin.show');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        $editMode = true;
        return view('admin.create', [
            'user' => $user,
            'editMode' => $editMode,
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update()
    {
        return view('admin.update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
