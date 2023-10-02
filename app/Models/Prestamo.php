<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'numero_adquisicion',
        'tipo_prestamo',
        'fecha_devolucion',
        'fecha_prestamo',
        'user_id',
    ];

    public function alumnos()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function libros()
    {
        return $this->belongsToMany(Libro::class);
    }

    public function alumnos_libros_prestamos()
    {
        return $this->belongsToMany(Alumno_libro_prestamo::class, 'alumnno_id', 'libros_id', 'prestamo_id');
    }
}
