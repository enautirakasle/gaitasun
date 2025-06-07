<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Grupo extends Model
{
    protected $fillable = [
        'nombre',
        'curso_id',
        'turno',
        'aula'
    ];

    public function curso()
    {
        return $this->belongsTo(Curso::class);
    }
}
