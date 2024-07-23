<?php

namespace App\Http\Livewire;

use App\Models\Actividad;
use App\Models\Categoria;
use App\Models\Alumno;
use App\Models\registroentradas;
use Carbon\Carbon;



use Livewire\Component;

class RegistrarUsuarios extends Component
{
    
    public $nombre;
    public $carrera;
    public $id_student;
    public $apellidoP;
    public $apellidoM;
    public $sexo;
    public $materia;
    public $actividad;
    public $fecha;
    public $hora;
    public $categoria;


    // Variable por la cual sucede la búsqueda
    public $no_institucional;


    // Iniciar vació el array
    public $alumno = [];
    protected $listeners = ['searchWord' => 'buscar'];

    protected $rules = [
        'sexo' => 'required|string',
        'categoria' => 'required|string',
        'materia' => 'required|string',
        'actividad' => 'required|string',
    ];

    public function buscar($no_institucional)
    {
        $this->no_institucional = $no_institucional;

        if (empty($this->no_institucional)) {
            $this->alumno = [];
            return;
        }

        $alumno = $this->alumno = Alumno::where('no_institucional', 'LIKE', '%' . $this->no_institucional . '%')->get();
        $this->alumno = $alumno;

        //concatenating variables to the front-end
        $datos = $this->alumno;
        $this->id_student = $datos[0]->id;
        $this->nombre = $datos[0]->nombre;
        $this->apellidoP = $datos[0]->apellidoP;
        $this->apellidoM = $datos[0]->apellidoM;
        $this->carrera = $datos[0]->carrera;

    }

    
    //funcion de insertar
    public function insert(){
     
        // Validar los datos según las reglas
        $datos = $this->validate();
        $alumno = $this->alumno[0];
        
         
        $user = registroentradas::create([
        'alumnos_id' => $alumno['id'],
        'sexo'=>$datos['sexo'],
        'categorias_id' => $datos['categoria'],
        'materias' => $datos['materia'],
        'actividades_id' => $datos['actividad'],
        'fecha' => Carbon::now(),
        'hora' => Carbon::now()->toDateTimeString(),
        ]);
        
        $this->no_institucional = '';
        $this->nombre = ''; // Limpiar el campo 'nombre'
        $this->carrera = ''; // Limpiar el campo 'carrera'
        $this->apellidoP = ''; // Limpiar el campo 'apellidoP'
        $this->apellidoM = ''; // Limpiar el campo 'apellidoM'
        $this->sexo = ''; // Limpiar el campo 'sexo'
        $this->materia = ''; // Limpiar el campo 'materia'
        $this->actividad = ''; // Limpiar el campo 'actividad'
         
    }



    public function render()
    {
        $categorias = Categoria::select('id', 'categoria')->take(7)->get();
        $actividades = Actividad::all();
        return view('livewire.registrar-usuarios',[
            'actividades'=> $actividades,
            'categorias'=> $categorias,
            'alumno' => $this->alumno
        ]);

        
    }


}
