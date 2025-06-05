<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CompetenciaTransversal extends Model
{
    protected $fillable = [
        'nombre',
        'descripcion',
        'nivel',
    ];

    public function indicadors()
    {
        return $this->hasMany(Indicador::class);
    }
}
