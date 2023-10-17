<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'fecha_inicio',
        'fecha_limite',
        'user_id',
        'tipo_prestamo_id',
        'cantidad',
    ];

    public function alumnos()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function libros()
    {
        return $this->belongsToMany(Libro::class);
    }

    public function tipo_prestamo()
    {
        return $this->belongsTo(Tipo_prestamo::class, 'tipo_prestamo_id');
    }

    public function libro_prestamo()
    {
        return $this->belongsToMany(Libro_prestamo::class, 'alumnno_id', 'libros_id', 'prestamo_id');
    }
}
