<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro_prestamo extends Model
{
    use HasFactory;
    protected $table = "libro_prestamo";
    protected $fillable = [
        'libro_id',
        'alumno_id',
        'user_id',
    ];

}
