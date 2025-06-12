<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evidencia extends Model
{
    protected $fillable = [
        'indicador_id',
        'alumno_id',
        'profesor_id',
        'fecha',
        'descripcion',
        'grupo_id',
    ];

    public function indicador()
    {
        return $this->belongsTo(Indicador::class);
    }

    public function alumno()
    {
        return $this->belongsTo(Alumno::class);
    }

    public function profesor()
    {
        return $this->belongsTo(Profesor::class);
    }

    public function grupo()
    {
        return $this->belongsTo(Grupo::class);
    }
}
