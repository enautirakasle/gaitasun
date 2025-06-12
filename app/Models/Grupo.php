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

    public function alumnos()
    {
        return $this->belongsToMany(Alumno::class, 'alumno_grupo', 'grupo_id', 'alumno_id');    
    }

       public function profesores()
    {
        return $this->belongsToMany(Profesor::class, 'grupo_profesor', 'grupo_id', 'profesor_id');    
    }
}
