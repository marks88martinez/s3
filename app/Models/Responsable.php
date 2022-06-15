<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Responsable extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'linea_baja',
        'celular',
        'email',
        'empresa_id'
    ];

    public function empresa(){
        return $this->belongsTo('App\Models\Empresa');
    }
}
