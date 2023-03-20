<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    protected $casts = [
        'fecha' => 'datetime:d-m-Y'
    ];

    protected $fillable = [
        'titulo',
        'autores',
        'edicion',
        'tomo',
        'categoria_id',
        'fecha',
        'cantidad',
        'isbn',
        'descripcion',
        'imagen',
        'user_id'
    ];
}
