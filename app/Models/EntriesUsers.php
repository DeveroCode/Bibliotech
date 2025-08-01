<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EntriesUsers extends Model
{
    use HasFactory;

    protected $fillable = [
        'alumno_id',
        'actividad',
        'sexo',
        'materia'
    ];


    public function alumno()
    {
        return $this->belongsTo(Alumno::class, 'alumno_id');
    }
}
