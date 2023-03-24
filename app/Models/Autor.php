<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;
    protected  $table = "autores";
    protected $fillable = [
        'autor',
    ];

    // public function libros()
    // {
    //     return $this->belongsToMany(Libro::class);
    // }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autor_libro', 'libros_id', 'autores_id');
    }
}
