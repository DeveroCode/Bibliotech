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
        'folio',
        'tipo_prestamo_id',
        'cantidad',
    ];

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'libro_prestamo', 'libro_id', 'prestamo_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function libros()
    {
        return $this->belongsToMany(Libro::class);
    }

    public function tipo_prestamo()
    {
        return $this->belongsTo(Tipo_prestamo::class, 'tipo_prestamo_id');
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autor_libro', 'libros_id', 'autores_id');
    }

    public function libro_prestamo()
    {
        return $this->belongsToMany(Libro_prestamo::class, 'alumnno_id', 'libros_id', 'prestamo_id');
    }
}
