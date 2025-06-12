<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumno extends Model
{
    protected $fillable = [
        'user_id'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function grupos()
    {
        return $this->belongsToMany(Grupo::class, 'alumno_grupo', 'alumno_id', 'grupo_id');
    }

    public function evidencias()
    {
        return $this->hasMany(Evidencia::class);
    }
}
