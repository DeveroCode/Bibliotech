<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alumno_libro_prestamo extends Model
{
    use HasFactory;

    protected $fillable = [
        'libro_id',
        'alumno_id',
        'user_id',
    ];

}
