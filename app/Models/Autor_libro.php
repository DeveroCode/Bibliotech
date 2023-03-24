<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor_libro extends Model
{
    use HasFactory;
    protected $table = "autor_libro";
    protected $fillable = [
        'autores_id',
        'libros_id',
    ];
}
