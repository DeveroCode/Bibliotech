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
        'edicion',
        'autores_id',
        'tomo',
        'categoria_id',
        'fecha',
        'cantidad',
        'isbn',
        'descripcion',
        'imagen',
        'user_id'
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function usuario()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function autores()
    {
        return $this->belongsToMany(Autor::class, 'autor_libro', 'libros_id', 'autores_id');
    }
}
