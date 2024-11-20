<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;

class ReporteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('administrator.index');
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
    public function show(Reporte $reporte)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Reporte $reporte)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Reporte $reporte)
    {
        //
    }

    public function selectTrimestre(Request $request){
        // Obtener el trimestre seleccionado por el usuario
        $trimestre = $request->input('trimestre');

        // Determinar el rango de fechas para el trimestre seleccionado
        $rangoFechas = $this->getTrimestre($trimestre);

        // Realizar la consulta basada en el rango de fechas
        $reportes = Reporte::whereBetween('fecha', $rangoFechas)->get();

        // Devolver los reportes correspondientes
        return view('reportes', ['reportes' => $reportes]);
    }

    public function getTrimestre ($trimestre){
        switch ($trimestre){
            case 'ene-mar':
                return ['01-01' ,'03-31'];
                break;
            case 'abr-jun':
                return ['01-04' ,'06-30'];
                break;
            case 'jul-sep':
                return ['01-07' ,'09-30'];
                break;
            case 'oct-dec':
                return ['01-10' ,'12-31'];
                break;
            case 'Año':
                return ['01-01' ,'12-31'];
                break;
            default:
                return [];
                break;
        }


    }

}
