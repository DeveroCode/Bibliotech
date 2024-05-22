<?php

namespace App\Http\Controllers;

use App\Models\Alumno;
use App\Models\Prestamo;

class PrestamoController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $loans = Prestamo::with('libros')->get();
        return view('administrator.loans.view-loans',
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
        return view('administrator.loans.lending');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        return view('administrator.loans.customized');
    }

    public function showStudent($student)
    {

        $studentId = Alumno::where('id', $student)->first();
        // Obtener todos los préstamos asociados al alumno
        $studentLoans = Prestamo::with('libros', 'alumnos', 'autores')
            ->whereHas('alumnos', function ($query) use ($studentId) {
                $query->where('alumno_id', $studentId->id);
            })
            ->get();

        // dd($studentLoans->toArray());

        return view('administrator.loans.show-student-loan', [
            'studentLoans' => $studentLoans,
            'studentId' => $studentId, // Aquí pasas el nombre del alumno
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Prestamo $prestamo)
    {
        //
        return view('administrator.loans.update-loans',
            ['prestamo' => $prestamo]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Prestamo $prestamo)
    {
        //
    }
}
