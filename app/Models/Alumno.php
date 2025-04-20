<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    use HasFactory;

    protected $table = 'alumnos';

    protected $fillable = [
        'nombre',
        'apellidoP',
        'apellidoM',
        'email',
        'telefono',
        'direccion',
        'no_institucional',
        'fecha_nacimiento',
        'anio_ingreso',
        'carrera',
    ];

    public function libros()
    {
        return $this->belongsToMany(Libro::class);
    }

    public function libro_prestamo()
    {
        return $this->belongsToMany(LibroPrestamo::class, 'alumnno_id', 'libro_id', 'prestamo_id');
    }

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class);
    }

    public function actividades()
    {
        return $this->hasMany(EntriesUsers::class, 'alumno_id');
    }
}
