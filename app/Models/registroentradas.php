<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registroentradas extends Model
{
    use HasFactory;

    protected $fillable =[
      'alumnos_id',
      'materias',
      'fecha',
      'hora',
      'sexo',
      'actividades_id',
      'categorias_id',
    ];

    public function categorias()
    {
        return $this->belongsTo(Categoria::class);  
    }
    public function actividad()
    {
        return $this->belongsTo(Actividad::class);  
    }

    public function alumnos()
    {
        return $this->belongsTo(Alumno::class);
    }
}
