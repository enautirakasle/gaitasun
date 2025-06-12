<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Indicador extends Model
{
    protected $fillable = [ 
    'nombre',
    'valor',
    'competencia_transversal_id',
    ];

    public function competenciaTransversal()
    {
        return $this->belongsTo(CompetenciaTransversal::class);
    }

    public function evidencias()
    {
        return $this->hasMany(Evidencia::class);
    }
}
