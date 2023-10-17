<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tipo_prestamo extends Model
{
    use HasFactory;

    protected $fillable = ['nombre'];

    public function prestamos()
    {
        return $this->hasMany(Prestamo::class, 'tipo_prestamo_id');
    }
}
