<?php

namespace App\Http\Controllers;

use App\Models\User;

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

    public function activities()
    {
        return view('admin.activities');
    }
}
