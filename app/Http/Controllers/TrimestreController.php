<?php

namespace App\Http\Controllers;

use App\Models\trimestre;
use Illuminate\Http\Request;

class TrimestreController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrator.registersR.layout');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
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
    public function show(trimestre $trimestre)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(trimestre $trimestre)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, trimestre $trimestre)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(trimestre $trimestre)
    {
        //
    }
}
